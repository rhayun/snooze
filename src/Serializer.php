<?php

namespace Thomasjohnkane\Snooze;

use Illuminate\Notifications\Notification;
use Illuminate\Queue\SerializesAndRestoresModelIdentifiers;

class Serializer
{
    use SerializesAndRestoresModelIdentifiers;

    public static function create(): self
    {
        return new self();
    }

    public function serializeNotifiable($notifiable): string
    {
        return serialize(self::getSerializedPropertyValue(clone $notifiable));
    }

    public function serializeNotification(Notification $notification): string
    {
        return serialize(clone $notification);
    }

    public function unserializeNotifiable($serialized)
    {
        return $this->getRestoredPropertyValue(unserialize($serialized));
    }

    public function unserializeNotification($serialized)
    {
        return unserialize($serialized);
    }
}
