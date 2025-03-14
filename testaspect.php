<?php
/**
 * Plugin Name: Test Aspect
 * Description: Test Aspect
 */

require_once __DIR__ . '/lib/vendor/scoper-autoload.php';

use TestAspect\Aspect\Type;

$applications = new Type('application');

$applications->addSupport('thumbnail')
	->setArgument('public', true);
