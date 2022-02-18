<?php

	namespace BrokenTitan\MParticle\Providers;

	use Illuminate\Support\ServiceProvider;

	class MParticleServiceProvider extends ServiceProvider {
		public function register() {
		    $this->mergeConfigFrom(__DIR__ . "/../../config/mparticle.php", "services.mparticle");
		}
	}