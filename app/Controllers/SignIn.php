<?php namespace Mhouse\Controllers;

use PSR\Http\Message\ResponseInterface as Response;
use PSR\Http\Message\ServerRequestInterface as Request;

use Mhouse\Models\SignIn as SignInModel;
use Mhouse\Services\JWTservice;

class SignIn
{
    protected $signInModel;

    protected $jwt;

    public function __construct(SignInModel $signInModel,JWTservice $jwt)
    {
        $this->signInModel = $signInModel;
        $this->jwt = $jwt;
    }

    public function verify(Request $request, Response $response)
    {
        $post = (object)$request->getParsedBody();

        // var_dump($this->signInModel->userExists($post->email, $post->password)); exit;

        if ($this->signInModel->verify($post->email, $post->password) === false) {
            return $response->withStatus(401, 'Email or password incorrects');
        }
        
        $token = $this->jwt->generateToken('+1 hour', ['user_id' => 1]);

        $token = json_encode(['access_token' => $token->getPayload()]);

        $response->getBody()->write($token);

        return $response
            ->withHeader('Content-type', 'application/json');
    }
}