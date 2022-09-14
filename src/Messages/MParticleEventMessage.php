<?php

	namespace BrokenTitan\MParticle\Messages;

	use Illuminate\Support\Str;

	class MParticleEventMessage {
		public array $data;
		public string $event_type = "custom_event";
		public array $userAttributes = [];

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
			$this->data = $data + [
				"event_name" => $event_name,
				"custom_event_type" => $custom_event_type,
				"source_message_id" => Str::uuid(),
				"timestamp_unixtime_ms" => $time ? $time->format("u") : now()->timestamp
			];
		}

		public static function create(string $event_name, string $custom_event_type, array $data = [], ?DateTimeInterface $time = null) : self {
	        return new static($event_name, $custom_event_type, $data, $time);
	    }

	    public function userAttributes(array $attributes) {
	    	$this->userAttributes = $attributes;

	    	return $this;
	    }
	}