<?php

namespace App\Services\Mail;

use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use Psr\Log\LoggerInterface;

class ContactService
{
    private Mailer $infrastructureMailer;
    private LoggerInterface $logger;

    public function __construct(Mailer $infrastructureMailer, LoggerInterface $logger)
    {
        $this->infrastructureMailer = $infrastructureMailer;
        $this->logger = $logger;
    }

    public function send(array $data):void
    {
        $this->infrastructureMailer->send(
            'molecules.emailContact',
            [
                'email' => $data['email'],
                'name' => $data['name'],
                'messageText' => $data['message'],
                'subject' => $data['subject']

            ],
            function (Message $message) use ($data) {
                $message->subject('Message from ' . $data['email']);
                $message->to('contact@pizzaslice.org');
                $message->from('no-reply@pizzaslice.org', 'Pizza Slice mailer');
            }
        );
        $this->logger->info('Contact mail send to contact@pizzaslice.org. Subject: ' . $data['subject'] . '.');
    }
}
