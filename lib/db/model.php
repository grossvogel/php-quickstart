<?php
/**
*	an abstract class offering some basic functionality for models.
*	extend this class by adding the required methods
*/
abstract class Model
{
	protected $data; //	the db connection
	
	/**
	*	create a model by providing the data store connection
	*/
	public function __construct (DataAccess $data)
	{
		$this->data = $data;
	}

	/**
	*	to execute a simple statement, just pass the query and parameters
	*	ex: 	$query = "select * from User where UserID = :userid;"
	*			$params = array (':userid'=>123)
	*	@return PDOStatement
	*/
	public function execute ($query, $params = array ())
	{
		$stmt = $this->data->prepare ($query);
		foreach ($params as $key => $value)
		{
			$stmt->bindValue ($key, $value);
		}
		$stmt->execute ();
		return $stmt;
	}
	
	/**
	*	if the supplied statement has a row, return it as an object,
	*	otherwise return null
	*/
	public function getSingle (PDOStatement $stmt)
	{
		return $stmt->rowCount () > 0
			? $stmt->fetchObject ()
			: null;
	}
}
