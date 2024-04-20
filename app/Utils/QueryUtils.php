<?php

namespace App\Utils;

use Str;

/**
 * Utils for cross-compatibility between SQLite and MySQL.
 */
class QueryUtils
{
    public static function concat(...$args): string
    {
        $args = array_map(function ($arg) {
            if (trim($arg) === '') {
                return "'{$arg}'";
            }

            return $arg;
        }, $args);

        if (config('database.default') === 'sqlite') {
            return implode(' || ', $args);
        }

        return sprintf('CONCAT(%s)', implode(', ', $args));
    }

    public static function groupConcat(
        string $separator,
        string $toConcat,
        bool $distinct = false,
        ?string $distinctIdentifier = null
    ): string {
        if (config('database.default') !== 'sqlite') {
            return sprintf("GROUP_CONCAT(%s%s SEPARATOR '%s')", $distinct ? 'DISTINCT ' : '', $toConcat, $separator);
        }

        if (! $distinct) {
            return sprintf("GROUP_CONCAT(%s, '%s')", $toConcat, $separator);
        }

        // This is really hacky...
        // SQLite doesn't allow you to GROUP_CONCAT with a custom separator - it requires it to be a comma.
        // To combat this, we will replace all commas in our data with a unique identifier, to represent commas,
        // replace all the commas between the concatenated data with our desired custom separator,
        // and then replace our comma placeholder unique identifiers back to commas.
        return sprintf(
            "REPLACE(REPLACE(GROUP_CONCAT(DISTINCT REPLACE(%s, ',', '%s')), ',', '%s'), '%s', ',')",
            $toConcat,
            $identifier = ($distinctIdentifier ?? Str::uuid()->toString()),
            $separator,
            $identifier,
        );
    }

    public static function jsonExtract(string $col, string $jsonKey): string
    {
        if (config('database.default') === 'sqlite') {
            return "JSON_EXTRACT({$col}, {$jsonKey})";
        }

        return "JSON_UNQUOTE(JSON_EXTRACT({$col}, {$jsonKey}))";
    }

    public static function jsonLength(string $col, ?string $path = null): string
    {
        $postColumnString = $path ? ", '{$path}'" : '';

        if (config('database.default') === 'sqlite') {
            return "JSON_ARRAY_LENGTH({$col}{$postColumnString})";
        }

        return "JSON_LENGTH({$col}{$postColumnString})";
    }

    public static function if(string $condition, string $ifTrue, string $ifFalse): string
    {
        if (config('database.default') === 'sqlite') {
            return "IIF({$condition}, '{$ifTrue}', '{$ifFalse}')";
        }

        return "IF({$condition}, '{$ifTrue}', '{$ifFalse}')";
    }
}
