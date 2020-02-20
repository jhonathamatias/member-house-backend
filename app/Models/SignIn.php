<?php namespace Mhouse\Models;

class SignIn
{
    protected $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function verify(string $email, string $password)
    {
        $user = $this->userModel->getUser(['email' => $email]);

        if (
            $user === null ||
            !password_verify($password, $user->getLogin()->getPassword())
        ) {
            return false;
        }

        return true;
    }
}