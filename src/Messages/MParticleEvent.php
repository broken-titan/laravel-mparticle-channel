<?php

	namespace BrokenTitan\MParticle\Messages;

	class MParticleEvent {
		public array $custom_attributes;
		public array $data;
		public array $device_current_state;
		public array $location;
		public int $timestamp_unixtime_ms;
		public string $event_name;
		public string $event_type = "custom_event";
		public string $session_uuid;
		public string $source_message_id;

		const ATTRIBUTION = "attribution";
		const LOCATION = "location";
		const MEDIA = "media";
		const NAVIGATION = "navigation";
		const SEARCH = "search";
		const SOCIAL = "social";
		const TRANSACTION = "transaction";
		const USER_CONTENT = "user_content";
		const USER_PREFERENCES = "user_preferences";
		const OTHER = "other";

		public function __construct(string $event_name, string $custom_event_type, array $data = [], ?DateTimeInterface $time = null) {
			$this->event_name = $event_name;
			$this->custom_event_type = $custom_event_type;
			$this->data = $data;
			$this->timestamp_unixtime_ms = $time ? $time->format("u") : now()->timestamp;
		}

		public static function create(string $event_name, string $custom_event_type, array $data = [], , ?DateTimeInterface $time = null) : self {
	        return new static($event_name, $custom_event_type, $data, $time);
	    }
	}