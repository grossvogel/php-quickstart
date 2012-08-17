<?php

//	bootstrap the environment
chdir (dirname (__FILE__));
$root = realpath ('..');
include "$root/quickstart.php";
quickstart_init (dirname (__FILE__));


function quickstart_test_autoload ()
{
	$class = new QuickstartTestClass ();
	assert ($class instanceof QuickstartTestClass);
}


quickstart_test_autoload ();
