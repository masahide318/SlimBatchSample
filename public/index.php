<?php

date_default_timezone_set('Asia/Tokyo');
require __DIR__ . '/../vendor/autoload.php';

use Batch\Sample\Application\CliApplication;
use Batch\Sample\Application\WebApplication;


if(PHP_SAPI == "cli"){
    (new CliApplication())->run();
}else{
    (new WebApplication())->run();
}
