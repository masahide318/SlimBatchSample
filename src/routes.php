<?php

use Batch\Sample\Action\SampleAction;

$app->get("/sample_command", SampleAction::class);
