<?php

namespace Batch\Sample\Action;

use Batch\Sample\Service\SampleService;

class SampleAction extends BatchBase
{

    public function getServiceName()
    {
        return SampleService::class;

    }
}