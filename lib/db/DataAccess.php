<?php
/**
*	DataAccess gives a way to access a data store
*/
class DataAccess
{
	private $config = null;
	private $pdo = null;

	/**
	*	create a new db connection
	*/
	public function __construct (DataStoreConfig $config, $options = array ())
	{
		$this->config = $config;
		$this->pdo = new PDO (
			$config->getDSN (), 
			$config->getUser (), 
			$config->getPassword (), 
			array_merge (self::$default_options, $options)
		);
		$this->pdo->setAttribute (PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		$this->pdo->setAttribute (PDO::ATTR_EMULATE_PREPARES, 1);
	}

	/**
	*	pass method calls straight through to the PDO
	*/
	public function __call ($func, $args)
	{
		return call_user_func_array (array ($this->pdo,$func), $args);
	}
	
	/**
	*	add default options here
	*/
	private static $default_options = array (
	);
}
