<?php
/**
 * Plugin Name: Test Aspect
 * Description: Test Aspect
 */

spl_autoload_register(function ($class) {
	$prefixes = [
		'TestAspect\Aspect\\' => __DIR__ . '/lib/kostyandrew/aspect-post/',
	];


	foreach ($prefixes as $prefix => $base_dir) {
		$len = strlen($prefix);
		if (strncmp($prefix, $class, $len) !== 0) {
			continue;
		}

		$relative_class = substr($class, $len);

		$file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

		if (file_exists($file)) {
			require $file;
		}
	}
});

use TestAspect\Aspect\Type;

$applications = new Type('application');

$applications->addSupport('thumbnail')
	->setArgument('public', true);
