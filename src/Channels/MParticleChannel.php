<?php

    namespace BrokenTitan\MParticle\Channels;

    use BrokenTitan\MParticle\Exceptions\UserIdentitiesNotFound;
    use Illuminate\Notifications\Notification;
    use Illuminate\Support\Facades\Http;

    class MParticleChannel {
        public function send($notifiable, Notification $notification) {
            if (!$userIdentites = $notifiable->routeNotificationFor("MParticle", $notification)) {
                throw new UserIdentitiesNotFound;
            }

            $message = $notification->toMParticle($notifiable);
            $environment = app()->environment("production") ? "production" : "development";

            $payload = [
                "events" => [
                    [
                        "data" => $message->data,
                        "event_type" => $message->event_type
                    ]
                ],
                "environment" => $environment,
                "user_identities" => $userIdentites
            ];
            
            $pod = config("services.mparticle.pod");
            $request = Http::baseUrl("https://s2s.{$pod}.mparticle.com/v2/")
                ->withBasicAuth(config("services.mparticle.username"), config("services.mparticle.password"))
                ->post("events", $payload)
                ->throw();
        }
    }
