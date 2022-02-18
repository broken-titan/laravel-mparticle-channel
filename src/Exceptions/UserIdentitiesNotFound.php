<?php

	namespace BrokenTitan\MParticle\Exceptions;

	use Exception;

	class UserIdentitiesNotFound extends Exception {
		protected $message = "User identities not found";
	}