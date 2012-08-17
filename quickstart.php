<?php
/**
*	get all of the includes required
*/
$cwd = getcwd ();
chdir (dirname (__FILE__));

require_once 'lib/autoloader/application/AutoLoader.php';
require_once 'lib/nicedog/NiceDog.php';

chdir ($cwd);


function quickstart_init ($autoLoadDir)
{
	$dir = realpath ($autoLoadDir) . '/';
	AutoLoader::instance ($dir);
}
