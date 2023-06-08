<?php
require_once('./utils/helpObjects.php');
require_once('./BladeOne-4.9/config.php');

echo $blade->run("aboutUs", array("facilities" => $facilities, "counters" => $counters));
