<?php

use Study\Di\Index1Controller;

include "Controller/Index1Controller.php";

$rs = (new Index1Controller())->index();
var_dump($rs);