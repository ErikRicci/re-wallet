<?php

const APP_VERSION = '0.1.0';

require './vendor/autoload.php';

// The start of everything. This is the initial file
// and shall remain that way until God knows when

use Wallet\Application\Main;

ini_set("display_errors", true);

Main::__init()->enter();
