<?php

    namespace BrokenTitan\MParticle\Channels;

    use Illuminate\Notifications\Notification;
    use Illuminate\Support\Facades\Http;

    class MParticleChannel {
        private Http $client;

        public function __construct(Http $client) {
            $this->client = $client;
        }

        public function send($notifiable, Notification $notification) {
            $message = $notification->toMParticle($notifiable);
            $this->client->post("events", $message)->throw();
        }
    }
