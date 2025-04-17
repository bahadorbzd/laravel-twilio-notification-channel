<?php

namespace Bahadorbzd\TwilioNotificationChannel\Messages;

class TwilioSmsMessage
{
    public string  $content;
    public ?string $from = null;

    public function content(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function from(string $from): self
    {
        $this->from = $from;
        return $this;
    }
}