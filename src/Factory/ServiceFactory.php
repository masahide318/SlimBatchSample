<?php

namespace Batch\Sample\Factory;

use Batch\Sample\Model\Dao\UserDao;
use Batch\Sample\Service\SampleService;
use Psr\Container\ContainerInterface;

class ServiceFactory
{

    /** @var  ContainerInterface */
    private $container;

    /**
     * ServiceFactory constructor.
     * @param $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    public function create($serviceName)
    {
        if (!is_scalar($serviceName)) {
            throw new \InvalidArgumentException('ServiceName must be string');
        }

        if ($serviceName === SampleService::class) {
            return new SampleService(new UserDao($this->container['db']));
        }
        throw new \InvalidArgumentException($serviceName . ' is unknown service name');
    }
}
