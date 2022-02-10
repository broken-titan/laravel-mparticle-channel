<?php

    namespace Tests;

    use BrokenTitan\MParticle\Channels\MParticleChannel;
    use Illuminate\Support\Facades\Http;
    use Mockery;
    use PHPUnit\Framework\TestCase;

    class MParticleChannelTest extends TestCase {
        protected $channel;

        public function setUp(): void {
            parent::setUp();
            $http = Mockery::mock(Http::class);
            $this->channel = new MParticlChannel($http);
        }

        public function testSendEvent() {
            $this->assertTrue(true);
        }
    }