<?php

/**
 * Table row class for the model of pollux.
 *
 * @author		zfmodel <zfmodel@sirfoomy.de>
 * @author		Sascha Schneider <foomy@sirfoomy.de>
 *
 * @category	model
 * @package		Model_Person
 */
class Model_Person extends Model_Table_Row_Abstract
{

	/**
	 * @return	string $username
	 */
	public function getUsername()
	{
		return $this->{Model_Person_Table::F_USERNAME};
	}

	/**
	 * @return	string $username
	 */
	public function setUsername($username)
	{
		$this->{Model_Person_Table::F_USERNAME} = $username;
	}

	/**
	 * @return	string $password
	 */
	public function getPassword()
	{
		return $this->{Model_Person_Table::F_PASSWORD};
	}

	/**
	 * @return	string $password
	 */
	public function setPassword($password)
	{
		$this->{Model_Person_Table::F_PASSWORD} = $password;
	}

	/**
	 * @return	int $canLogin
	 */
	public function canLogin()
	{
		return $this->{Model_Person_Table::F_CAN_LOGIN};
	}

	/**
	 * @param	int $canLogin
	 */
	public function setCanLogin($canLogin)
	{
		$this->{Model_Person_Table::F_CAN_LOGIN} = $canLogin;
	}
}
