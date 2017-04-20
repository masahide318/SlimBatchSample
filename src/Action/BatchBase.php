<?php

namespace Batch\Sample\Action;

use Batch\Sample\Exception\RunDuplicatedException;
use Batch\Sample\Lock\FileLockController;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

abstract class BatchBase
{

    protected $container;
    private $fileLockController;

    public function __construct(ContainerInterface $container, FileLockController $lockController = null)
    {
        $this->container = $container;
        if (!$lockController) {
            $this->fileLockController = new FileLockController(get_class($this));
        } else {
            $this->fileLockController = $lockController;
        }
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $commandClassName = get_class($this);
        if ($this->fileLockController->isLocking()) {
            throw new RunDuplicatedException($commandClassName);
        }
        try {
            $this->fileLockController->lock();
            $startTime = time();
            $this->getLogger()->info("start : $commandClassName");
            $runResult = $this->container['serviceFactory']->create($this->getServiceName())->run();
            $response->write($runResult ? "success" : "error");
            $processTime = (time() - $startTime);
            $this->getLogger()->info("end : $commandClassName, time : $processTime sec");
        } catch (\Exception $e) {
            throw $e;
        } finally {
            $this->fileLockController->unLock();
        }

        return $response;
    }

    /**
     * @return Logger
     */
    protected function getLogger()
    {
        return $this->container['logger'];
    }

    abstract public function getServiceName();
}