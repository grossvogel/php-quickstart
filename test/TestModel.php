<?php
/**
*	a class for testing the model infrastructure, and a good example of the simple usage
*/
class TestModel extends Model
{
	public function getUser ($userID)
	{
		$query = 'select * from User where UserID = :userid';
		$params = array (':userid' => $userID);
		return $this->getSingle ($this->execute ($query, $params));
	}

	public function getAllUsers ()
	{
		$query = 'select * from User;';
		return $this->execute ($query);
	}
}
