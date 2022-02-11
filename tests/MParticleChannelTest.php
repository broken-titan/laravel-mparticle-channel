<?php

    namespace Tests;

    use BrokenTitan\MParticle\Channels\MParticleChannel;
    use Mockery;
    use PHPUnit\Framework\TestCase;

    class MParticleChannelTest extends TestCase {
        protected $channel;

        public function setUp(): void {
            parent::setUp();
            
            
        }

        public function testSendEvent() {
            $this->assertTrue(true);
        }
    }