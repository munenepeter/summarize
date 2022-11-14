<?php

use Spatie\Ignition\Ignition;

//change TimeZone
date_default_timezone_set('Africa/Nairobi');

//production development
define('ENV','development');

//require all files here
require 'helpers.php';

require_once __DIR__.'/../vendor/autoload.php';

Ignition::make()->register();