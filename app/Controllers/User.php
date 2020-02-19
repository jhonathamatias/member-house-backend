<?php namespace Mhouse\Controllers;

use PSR\Http\Message\ResponseInterface as Response;
use PSR\Http\Message\ServerRequestInterface as Request;

use Mhouse\Models\User as UserModel;

class User
{
    protected $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function create(Request $request, Response $response)
    {
        $post = (object)$request->getParsedBody();

        $result = $this->userModel->create($post);

        if ($result === false) {
            return $response->withStatus(500, 'User already exists');
        }

        $data = ['user_id' => $result];

        $payload = json_encode($data);

        $response->getBody()->write($payload);

        return $response->withHeader('Content-type', 'application/json');
    }

    public function all(Request $request, Response $response)
    {
        $data = ['users' => $this->userModel->getAll()];

        $payload = json_encode($data);

        $response->getBody()->write($payload);

        return $response->withHeader('Content-type', 'application/json');
    }

    public function auth(Request $request, Response $response)
    {
        $data = ['token' => uniqid('TKN'), 'user' => uniqid(('USR'))];

        $payload = json_encode($data);

        $response->getBody()->write($payload);

        return $response
            ->withHeader('Content-type', 'application/json');
    }
}