<?php

/**
 * Abstract class for db table rows.
 *
 * @author      Sascha Schneider <foomy.code@arcor.de>
 *
 * @category	model
 * @package		Model_Table_Row_Abstract
 */
class Model_Table_Row_Abstract extends Zend_Db_Table_Row_Abstract
{
	protected $_primary = Model_Table_Abstract::F_ID;

	protected $_id;
	protected $_created;
	protected $_modified;

	public function init() {
		parent::init();

		$this->_id			= Model_Table_Abstract::F_ID;
		$this->_created		= Model_Table_Abstract::F_CREATED;
		$this->_modified	= Model_Table_Abstract::F_MODIFIED;
	}

	public function save()
	{
		$this->setJustModified();
		parent::save();
	}

	/**
	 * Returns the database id.
	 *
	 * @return	int $id
	 */
	public function getId()
	{
		return $this->{$this->_id};
	}

	/**
	 * Returns the creation datetime of the data record.
	 *
	 * @return	string $creationDate
	 */
	public function wasCreatedOn()
	{
		return $this->{$this->_created};
	}

	/**
	 * Returns the datetime of the last modification.
	 *
	 * @return	string $modificationDate
	 */
	public function wasLastModifiedOn()
	{
		return $this->{$this->_modified};
	}

	/**
	 * Sets the modified field to the given datetime.
	 *
	 * @param	string $datetime
	 */
	public function setLastModified($datetime)
	{
		$this->{$this->_modified} = $datetime;
	}

	/**
	 * Sets the modification datetime to the actual now.
	 */
	public function setJustModified()
	{
		$datetime = date('Y-m-d h:i:s');
		$this->setLastModified($datetime);
	}

	/**
	 * Checks, if a string contains a valid date.
	 *
	 * @param	Zend_Validate_Date $validatorTABOptional!
	 * @return	Zend_Validate_Date
	 */
	protected function isDateValid($date, $format = 'YYYY-MM-DD', Zend_Validate_Date $validator = null)
	{
		if (null === $validator) {
			$validator = new Zend_Validate_Date();
			$validator->setFormat($format);
		}

		return $validator->isValid($date);
	}

	/**
	 * Lazy initilization of an bootstrap instance
	 */
	protected function getBootstrap(Zend_Application_Bootstrap_Bootstrap $bootstrap = null)
	{
		if (null === $bootstrap) {
			$bootstrap = Zend_Controller_Front::getInstance()->getParam('bootstrap');
		}

		return $bootstrap;
	}

	/**
	 * Lazy initilization of the logger.
	 *
	 * @param	Zend_Log $loggerTABOptional!
	 * @return	Zend_Log
	 */
	protected function getLogger(Zend_Log $logger = null)
	{
		if (null === $logger) {
			$logger = $this->getBootstrap()->getResource('log');
		}

		return $logger;
	}

	/**
	 * Print variables like var_dump() to logger.
	 *
	 * @param	mixed $var1, $var
	 * @param	mixed $var2
	 */
	protected function debug($var1, $var2 = null)
	{
		$logger = $this->getLogger();

		$argsCount = func_num_args();
		if ($argsCount > 1) {
			$args = func_get_args();

			for ($i = 0; $i < $argsCount; $i++) {
				$logger->log($args[$i], Zend_Log::DEBUG);
			}
		}
		else {
			$logger->log($var1, Zend_Log::DEBUG);
		}
	}
}
