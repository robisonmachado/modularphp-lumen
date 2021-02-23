<?php

namespace ModularPHP\Core\Guards;

use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;

class SessionTokenGuard implements Guard
{
	use GuardHelpers;
	private $inputKey = '';
	private $sessionKey = '';
	private $request;

	public function __construct (UserProvider $provider, Request $request, $configuration) {

        //dd($provider);

		$this->provider = $provider;
		$this->request = $request;
		// key to check in request
		$this->inputKey = isset($configuration['input_key']) ? $configuration['input_key'] : 'access_token';
		// key to check in database
		$this->sessionKey = isset($configuration['session_key']) ? $configuration['session_key'] : 'access_token';
	}

	public function user () {
		if (!is_null($this->user)) {
			return $this->user;
		}

		$user = null;

		// retrieve via token
		$token = $this->getTokenForRequest();

        //dd(['SessionTokenGuard' => $token]);

		if (!empty($token)) {
			// the token was found, how you want to pass?
			$user = $this->provider->retrieveByToken($this->sessionKey, $token);
		}

		return $this->user = $user;
	}

	/**
	 * Get the token for the current request.
	 * @return string
	 */
	public function getTokenForRequest () {
		$token = $this->request->query($this->inputKey);

		if (empty($token)) {
			$token = $this->request->input($this->inputKey);
		}

		if (empty($token)) {
			$token = $this->request->bearerToken();
		}

        if (empty($token)) {
			$token = session($this->sessionKey);
		}

        //dd(['getTokenForRequest' => $token]);
		return $token;
	}

	/**
	 * Validate a user's credentials.
	 *
	 * @param  array $credentials
	 *
	 * @return bool
	 */
	public function validate (array $credentials = []) {
		if (empty($credentials[$this->inputKey])) {
			return false;
		}

		$credentials = [ $this->storageKey => $credentials[$this->inputKey] ];

		if ($this->provider->retrieveByCredentials($credentials)) {
			return true;
		}

		return false;
	}
}
