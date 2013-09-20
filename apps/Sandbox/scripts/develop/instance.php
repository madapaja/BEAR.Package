<?php
/**
 * Return application instance with development setup
 *
 * @global $mode
 *
 * @return BEAR\Sunday\Extension\Application\AppInterface
 */

use BEAR\Package\Dev\Dev;

umask(0);
ini_set('xdebug.max_nesting_level', 200);
ini_set('display_errors', 0);
ob_start();

// set application root as current directory
chdir(dirname(dirname(__DIR__)));

require 'scripts/load.php';

// development configuration
$app = (new Dev)
    ->iniSet()
    ->loadDevFunctions()
    ->registerFatalErrorHandler()
    ->registerExceptionHandler('/var/log')
    ->registerSyntaxErrorEdit()
    ->getDevApplication($mode);

return $app;
