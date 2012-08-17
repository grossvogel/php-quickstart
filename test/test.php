<?php

//	bootstrap the environment
chdir (dirname (__FILE__));
$root = realpath ('..');
include "$root/quickstart.php";
quickstart_init ($root);

/**
*	test that the autoloader is working
*/
function quickstart_test_autoload ()
{
	$class = new QuickstartTestClass ();
	assert ($class instanceof QuickstartTestClass);
}
quickstart_test_autoload ();



/**
*	this test only works, of course, if the database schema, user, table, and row are set up on the test machine
*/
function quickstart_test_model ()
{
	$config = new DataStoreConfig ('localhost','testing_pdo','abc123','testing_pdo');
	$data = new DataAccess ($config);
	$model = new TestModel ($data);
	$user = $model->getUser (1);	
	assert ($user->UserID == 1);

	$result = $model->getAllUsers ();
	$rowCount = $result->rowCount ();
	assert ($rowCount > 0);

	$i = 0;
	foreach ($result as $row)
	{
		$i++;
		assert ($row->UserID);
	}
	assert ($i == $rowCount);
}
quickstart_test_model ();


