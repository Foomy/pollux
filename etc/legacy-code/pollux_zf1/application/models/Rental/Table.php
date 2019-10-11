<?php

/**
 * Table class for the model of pollux.
 *
 * @author		zfmodel <zfmodel@sirfoomy.de>
 * @author		Sascha Schneider <foomy@sirfoomy.de>
 *
 * @category	model
 * @package		Model_Rental_Table
 */
class Model_Rental_Table extends Model_Table_Abstract
{
	const T_NAME = 'rental';

	const F_PERSON_ID	= 'person_id';
	const F_MEDIA_ID	= 'media_id';
	const F_SINCE		= 'since';
	const F_DUE			= 'due';

	protected $_name		= self::T_NAME;
	protected $_primary		= self::F_ID;
	protected $_rowClass	= 'Model_Rental';
	protected $_sequence	= true;

	protected $_referenceMap = array();
	protected $_dependentTables = array();

	protected static $instance = null;

	/**
	 * Returns an instance of the client table.
	 *
	 * @return	Model_Rental_Table
	 */
	public static function getInstance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Returns a rowset with all entries stored in the table.
	 *
	 * @return	Zend_Db_Table_Rowset_Abstract
	 */
	public static function getAll()
	{
		$select = self::getInstance()->select();
		return self::getInstance()->fetchAll($select);
	}

	/**
	 * Returns a data record specified by its database id.
	 *
	 * @param	int $id
	 * @return	Model_Rental | null
	 */
	public static function findById($id)
	{
		$select = self::getInstance()->select();
		$select->where(self::F_ID . '=?', $id);
		return self::getInstance()->fetchRow($select);
	}
}
