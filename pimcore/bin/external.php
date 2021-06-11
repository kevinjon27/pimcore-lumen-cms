<?php
ob_get_clean();

if (file_exists($a = getcwd() . '/vendor/autoload.php')) {
    include $a;
} elseif (file_exists($a = __DIR__ . '/../../../../vendor/autoload.php')) {
    include $a;
} elseif (file_exists($a = __DIR__ . '/../vendor/autoload.php')) {
    include $a;
} else {
    fwrite(STDERR, 'Cannot locate autoloader; please run "composer install"' . PHP_EOL);
    exit(1);
}

\Pimcore\Bootstrap::setProjectRoot();

define('PIMCORE_CONSOLE', true);

/** @var \Pimcore\Kernel $kernel */
$kernel = \Pimcore\Bootstrap::startupCli();
