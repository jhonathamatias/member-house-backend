<?php 

namespace Mhouse\Services;



class JWTservice 
{
    const SECRET_KEY = '$2y$10$WXP0XUcixQSXsJn./7GFr.1u5CM1mDhs48RizZTwxnhVl9Ar4ufQm';

    protected $parser;
    protected $key;
    protected $signer;
    protected $builder;
    protected $token;
    
    public function __construct()
    {
        
    }

    public function validate(string $scheme): bool
    {
        
    }

    public function generateToken(string $expire, $data): Token
    {
        
    }
}