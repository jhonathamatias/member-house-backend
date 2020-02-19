<?php namespace Mhouse\Tools;

class Password
{
    public static function create(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}