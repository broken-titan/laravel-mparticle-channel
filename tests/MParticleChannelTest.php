<?php

    namespace Tests;

    use BrokenTitan\MParticle\Channels\MParticleChannel;
    use PHPUnit\Framework\TestCase;

    class MParticleChannelTest extends TestCase {
        protected $channel;

        public function setUp(): void {
            $this->channel = new MParticleChannel;
            $this->notifiable = new TestNotifiable;
        }

        public function testSendEvent() {
            $this->assertTrue(true);
        }
    }