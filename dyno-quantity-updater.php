#!/usr/bin/php
<?php

require __DIR__ . '/vendor/autoload.php';

use DynoLib\App;

$app = new App();
$result = $app->run();
echo $result->getMessage();
exit($result->getStatusCode());