<?php
namespace Batch\Sample\Handler;

use Slim\Http\Request;
use Slim\Http\Response;

class NotFoundHandler
{
    /**
     * @param Request $request
     * @param Response $response
     * @return Response
     */
    public function __invoke(Request $request, Response $response)
    {
        return $response->write("command not found\n");
    }
}
