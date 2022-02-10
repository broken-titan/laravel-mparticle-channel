<?php

    namespace BrokenTitan\MParticle\Providers;

    use BrokenTitan\Channels\MParticleChannel;
    use Illuminate\Contracts\Support\DeferrableProvider;
    use Illuminate\Support\Facades\Http;
    use Illuminate\Support\ServiceProvider;

    class MParticleServiceProvider extends ServiceProvider implements DeferrableProvider {
        public function boot() {
            $this->publishes([__DIR__ . "/../../config/mparticle.php" => config_path("mparticle.php")], "config");

            $this->app->when(MParticleChannel::class)
                ->needs(Http::class)
                ->give(function() {
                    return new Http::withOptions(["base_url" => "https://s2s.{config('mparticle.pod')}.mparticle.com/v2"])
                        ->withBasicAuth(config("mparticle.username"), config("mparticle.password"))
                });
        }
    }
