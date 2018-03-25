<?php

namespace Engine\Core\Auth;

use Engine\Core\Cookie;

class Auth implements AuthInterface
{
    /**
     * @var bool
     */
    protected $authorized = false;
    protected $user;

    /**
     * Generates a new random password salt
     * @return string
     */
    public static function salt()
    {
        return (string)rand(10000000, 99999999);
    }

    public static function encryptPassword($password, $salt = '')
    {
        return hash('sha256', $password . $salt);
    }

    /**
     * @return bool
     */
    public function authorized()
    {
        return $this->authorized;
    }

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->user;
    }

    /**
     * User authorization
     * @param $user
     */
    public function authorize($user)
    {
        Cookie::set('auth.authorized', true);
        Cookie::set('auth.user', $user);

        $this->authorized = true;
        $this->user = $user;
    }

    /**
     * User unauthorization
     * @return void
     */
    public function unAuthorize()
    {
        Cookie::delete('auth.authorized', true);
        Cookie::delete('auth.user', $user);

        $this->authorized = false;
        $this->user = null;
    }

}