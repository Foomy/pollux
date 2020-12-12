<?php

namespace App\DataObjects;

final class CreateUserData
{
    public $username;
    public $canLogin = false;
    public $password;
    public $repeatPassword;
}