#!/usr/bin/php
<?php

require __DIR__ . '/vendor/autoload.php';

use DynoLib\Factory;

(new Factory())
    ->createApp()
    ->run($argv);