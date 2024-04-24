<?php

namespace Shipmate\Responses;

class AccessTokenResponse {
    
    protected $token;
    protected $user;

    // setters

    /**
	* Set the Token
	*
	* @param string $token The secret token which handles authentication with the Shipmate API
	*
	* @return void
	**/

    public function setToken($token) {
        $this->token = $token;
    }

    /**
	* Set the User
	*
	* @param \Shipmate\User $user User representation 
	*
	* @return void
	**/
    
    public function setUser($user) {
        $this->user = $user;
    }

    // getters

    /**
	* Get the Token
	*
	* @return string Secret token which handles authentication with the Shipmate API
	**/

    public function token() {
        return $this->token;
    }

    /**
	* Get the User
	*
	* @return \Shipmate\User User representation
	**/

    public function user() {
        return $this->user;
    }    
}
