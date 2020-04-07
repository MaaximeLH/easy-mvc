<?php

require "public" . DIRECTORY_SEPARATOR . "bootstrap.php";

use Doctrine\ORM\Tools\Console\ConsoleRunner;

return ConsoleRunner::createHelperSet($entityManager);