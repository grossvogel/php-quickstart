<?php
/**
*	a DataStoreConfig is a collection of database configuration options
*/
class DataStoreConfig
{
	const DRIVER_MYSQL = 'mysql';

	private $host;
	private $user;
	private $password;
	private $schema;
	private $driver;

	/**
	*	create a new data store config object
	*/
	public function __construct ($host, $user, $password, $schema, $driver = null)
	{
		$this->host = $host;
		$this->user = $user;
		$this->password = $password;
		$this->schema = $schema;
		$this->driver = $driver ? $driver : self::DRIVER_MYSQL;
	}

	/**
	*	get the DSN for connecting to this data store
	*/
	public function getDSN ()
	{
		switch ($this->driver)
		{
			case self::DRIVER_MYSQL:
				return sprintf (
					'mysql:host=%s;dbname=%s',
					$this->host,
					$this->schema
				);
				break;
			default;
				throw new Exception ("Error: Unsupported data store driver");
				break;
		}
	}

	public function getUser ()
	{
		return $this->user;
	}

	public function getPassword ()
	{
		return $this->password;
	}
}
