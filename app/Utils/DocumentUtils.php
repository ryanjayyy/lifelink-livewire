<?php

namespace App\Utils;

use App\Models\Document;
use App\Models\DocumentFieldname;
use Event;
use OwenIt\Auditing\Events\AuditCustom;

class DocumentUtils
{
    public static function uploadFile(object $file, string $path, ?string $fieldName, object $associate, int|object $documentType)
    {
        /*
         * TODO: change path/url when S3 is available
         */
        $uploadedFile = $file->store($path);

        if (! empty($fieldName)) {
            $docFieldName = new DocumentFieldname;
            $docFieldName->document_fieldname = $fieldName;
            $docFieldName->save();
        }

        // 'attachment_encoding',
        // 'attachment_bucket',
        // 'attachment_key',
        // 'attachment_acl',
        // 'attachment_content_type',
        // 'attachment_storage_class',
        // 'attachment_location',
        // 'attachment_etag',
        $doc = new Document;
        $doc->documentable()->associate($associate);
        $doc->type()->associate($documentType);
        $doc->uploadedBy()->associate(auth()->user());
        $doc->attachment_originalname = $file->getClientOriginalName();
        $doc->attachment_size = $file->getSize();
        $doc->attachment_mimetype = $file->getMimeType();
        $doc->attachment_location = $uploadedFile;
        if (! empty($fieldName)) {
            $doc->fieldname()->associate($docFieldName);
        }
        $doc->save();
    }

    public static function download($id)
    {
        $doc = Document::find($id);
        $doc->auditEvent = 'download';
        $doc->isCustomEvent = true;
        $doc->auditCustomNew = [
            'file' => $doc->attachment_originalname,
        ];
        Event::dispatch(AuditCustom::class, [$doc]);

        /*
         * TODO: change path/url when S3 is available
         */
        return response()->download(
            storage_path('app').'/'.$doc->attachment_location, $doc->attachment_originalname
        );
    }
}
