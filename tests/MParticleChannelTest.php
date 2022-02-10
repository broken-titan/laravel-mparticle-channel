<?php

    namespace Tests;

    use BrokenTitan\Klaviyo\Channels\MParticleChannel;
    use PHPUnit\Framework\TestCase;

    class MParticleChannelTest extends TestCase {
        protected $channel;

        public function setUp(): void {
            $this->channel = new MParticleChannel;
            $this->notifiable = new TestNotifiable;
        }

        public function testSendTrackMessage() {
            $message = ($notification = new TestEventNotification)->toKlaviyo($this->notifiable);
            $this->klaviyo->shouldReceive("track")->once()->andReturn(true);
            $this->channel->send($this->notifiable, $notification);
        }

        public function testSendIdentifykMessage() {
            $message = ($notification = new TestIdentifyNotification)->toKlaviyo($this->notifiable);
            $this->klaviyo->shouldReceive("identify")->once()->andReturn(true);
            $this->channel->send($this->notifiable, $notification);
        }
    }