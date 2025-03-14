<?php

use Isolated\Symfony\Component\Finder\Finder;

return [
	'prefix' => 'TestAspect',
	'finders' => [
		Finder::create()
			->files()
			->ignoreVCS(true)
			->name('*.php')
			->notName('/LICENSE|.*\\.md|.*\\.dist|Makefile|composer\\.json|composer\\.lock/')
			->in('vendor/kostyandrew')
			->append( [ 'vendor/kostyandrew/aspect-post/composer.json' ] ),
		Finder::create()
			->append( [ 'composer.json' ] ),
	]
];
