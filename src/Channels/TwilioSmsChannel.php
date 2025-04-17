<?php

namespace Bahadorbzd\TwilioNotificationChannel\Channels;

use Illuminate\Notifications\Notification;
use Twilio\Rest\Client;

class TwilioSmsChannel
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client(
            config('twilio.sid'),
            config('twilio.token'),
        );
    }

    public function send($notifiable, Notification $notification)
    {
        if (!config('twilio.is_enabled')) {
            return;
        }
        $recipient = $notifiable->routeNotificationForTwilio($notification);
        $message = $notification->toTwilio($notifiable);

        if (!$recipient || !$message) {
            return;
        }

        $this->client->messages->create($recipient, [
            'from' => $message->from ?? config('twilio.from'),
            'body' => $message->content,
        ]);
    }
}
