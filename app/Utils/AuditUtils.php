<?php

namespace App\Utils;

use Carbon\Carbon;

class AuditUtils
{
    public static function parseAudits($audit): array
    {
        foreach ($audit as &$auditRecord) {
            $auditRecord['event'] = ucfirst($auditRecord['event']);
            $auditRecord['auditable_type'] = str_replace("App\Models\\", '', $auditRecord['auditable_type']);

            if ($auditRecord['user'] ?? false) {
                $auditRecord['user'] = $auditRecord['user']['person']['first_name']
                    .' '
                    .$auditRecord['user']['person']['last_name'];
            }

            $createdAt = Carbon::parse($auditRecord['created_at']);
            $auditRecord['created_at'] = $createdAt->format('d/m/Y H:i:s');

            foreach ($auditRecord['old_values'] as $field => $value) {
                $title = self::getReadableTitle($field);

                if (is_bool($value) || in_array($field, ['active', 'verified'])) {
                    $value = $value ? 'Yes' : 'No';
                }

                $auditRecord['old_values'][$title] = $value;
                unset($auditRecord['old_values'][$field]);
            }

            foreach ($auditRecord['new_values'] as $field => $value) {
                $title = self::getReadableTitle($field);

                if (is_bool($value) || in_array($field, ['active', 'verified'])) {
                    $value = $value ? 'Yes' : 'No';
                }

                $auditRecord['new_values'][$title] = $value;
                unset($auditRecord['new_values'][$field]);
            }
        }

        return $audit;
    }

    public static function getReadableTitle($title): string
    {
        return trim(preg_replace(
            '/\s+/', //strips extra space
            ' ',
            preg_replace(
                /**
                 * asserts position of words/numbers
                 * e.g. Test1To3Text Test 1 To 3 Text
                 */
                '/([A-Z][a-z]+)|([A-Z]+(?=[A-Z]))|(\d+)/',
                '$1 $2 $3 $4',
                ucwords(str_replace(['_id', '_'], ' ', $title))
            )
        ));
    }
}
