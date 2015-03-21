<?php
/**
 * @file     index.php
 *
 * @author   : kato
 * @since    : 24.01.14 17:52
 * @internal UTF-Chars: ÄÖÜäöüß∆
 */
use malkusch\autoloader\Autoloader;

/**
 * call pattern given by Path  Info
 *
 * @param string $name
 */
ini_set("display_errors", "1");
error_reporting(E_ALL);
require_once __DIR__ . '/autoloader/autoloader.php';
$autoloader = new Autoloader(__DIR__ . '/src');
