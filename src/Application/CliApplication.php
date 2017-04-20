<?php

namespace Batch\Sample\Application;

class CliApplication
{
    public function run()
    {
        $settings = require __DIR__ . '/../../src/settings.php';

        array_shift($GLOBALS['argv']);
        $commandName = $GLOBALS['argv'][0];

        $settings['environment'] = \Slim\Http\Environment::mock(
            [
                'REQUEST_URI' => '/' . $commandName,
            ]
        );
        $app = new \Slim\App($settings);

        require __DIR__ . '/../../src/dependencies.php';

        require __DIR__ . '/../../src/middleware.php';

        require __DIR__ . '/../../src/routes.php';

        $app->run();
    }
}
