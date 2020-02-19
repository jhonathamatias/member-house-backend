<?php namespace Mhouse\Middlewares\ErrorHandler;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Server\MiddlewareInterface;

use Whoops\Handler\Handler;
use Whoops\Run;

class WhoopsRegister implements MiddlewareInterface
{
    protected $run;

    /**
     * @var \Whoops\Handler\PrettyPageHandler
     */
    protected $whoopsHandler;

    public function __construct(Run $run, Handler $whoopsHandler)
    {
        $this->run = $run;
        $this->whoopsHandler= $whoopsHandler;
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $this->run->pushHandler($this->whoopsHandler);
        $this->run->register();

        return $handler->handle($request);
    }
}