<?php

/**
 * Table class for the model of pollux.
 *
 * @author		zfmodel <zfmodel@sirfoomy.de>
 * @author		Sascha Schneider <foomy@sirfoomy.de>
 *
 * @category	model
 * @package		Model_Media_Table
 */
class Model_Mediatype_Table extends Model_Table_Abstract
{
	const T_NAME = 'mediatype';

	const F_TYPENAME = 'typename';

	const MTYPE_MOVIES = 'movie';
	const MTYPE_BOOKS = 'book';

	protected $_name		= self::T_NAME;
	protected $_primary		= self::F_ID;
	protected $_rowClass	= 'Model_Mediatype';
	protected $_sequence	= true;

	protected $_dependentTables = array(
		'Model_Media_Table',
		'Model_Metakey_Table'
	);

	protected static $instance = null;

	/**
	 * Returns an instance of the mediatype table.
	 *
	 * @return	Model_Mediatype_Table
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
	public function getAll()
	{
		$select = self::getInstance()->select();
		return self::getInstance()->fetchAll($select);
	}

	/**
	 * Returns a data record specified by its database id.
	 *
	 * @param	int $id
	 * @return	Model_Mediatype | null
	 */
	public function findById($id)
	{
		$select = $this->select();
		$select->where($this->quote(self::F_ID) . '=?', $id);
		return $this->fetchRow($select);
	}

	public function findByTypename($typename)
	{
		$select = $this->select();
		$select->where($this->quote(self::F_TYPENAME) . '=?', $typename);
		return $this->fetchRow($select);
	}
}
