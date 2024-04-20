<?php

namespace App\Services\Mail;

use App\Mail\BaseEmail;
use Illuminate\Mail\Attachment;
use Mail;

class MailService
{
    /**
     * @param  Attachment[]  $attachments
     */
    public function send(
        string $recipient,
        string $subject,
        string $view,
        array $params,
        array $attachments = [],
        bool $queue = true,
    ): void {
        $mailable = Mail::to($recipient);
        $email = new BaseEmail(compact('subject', 'view', 'params'));

        foreach ($attachments as $attachment) {
            $email->attach($attachment);
        }

        if ($queue) {
            $mailable->queue($email);

            return;
        }

        $mailable->send($email);
    }
}
