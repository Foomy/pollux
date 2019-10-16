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
class Model_Media_Table extends Model_Table_Abstract
{
	const T_NAME = 'media';

	const F_MEDIATYPE_ID	= 'mediatype_id';
	const F_TITLE			= 'title';

	const MTYPE_MOVIES_ID	= 1;
	const MTYPE_BOOKS_ID	= 2;

	protected $_name		= self::T_NAME;
	protected $_primary		= self::F_ID;
	protected $_rowClass	= 'Model_Media';
	protected $_sequence	= true;

	protected $_referenceMap    = array(
		'Mediatype' => array(
			'columns'		=> array(self::F_MEDIATYPE_ID),
			'refTableClass'	=> 'Model_Mediatype_Table',
			'refColumns'	=> array(Model_Mediatype_Table::F_ID),
			'onDelete'		=> self::CASCADE,
			'onUpdate'		=> self::CASCADE
		),
	);

	protected $_dependentTables = array(
		'Model_Meta_Table',
		'Model_Rental_Table'
	);

	protected static $instance = null;

	/**
	 * Returns an instance of the client table.
	 *
	 * @return	Model_Media_Table
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
		$select = $this->select();
		return $this->fetchAll($select);
	}

	/**
	 * Returns a rowset containg all entries with
	 * mediatype 'movie'.
	 *
	 * @return Zend_Db_Table_Rowset_Abstract
	 */
	public function getAllMovies()
	{
		$select = $this->select();
		$select->where($this->quote(self::F_MEDIATYPE_ID) . '=?', self::MTYPE_MOVIES_ID);
		return $this->fetchAll($select);
	}

	/**
	 * Returns a rowset containg all entries with
	 * mediatype 'book'.
	 *
	 * @return Zend_Db_Table_Rowset_Abstract
	 */
	public function getAllBooks()
	{
		$select = $this->select();
		$select->where($this->quote(self::F_MEDIATYPE_ID) . '=?', self::MTYPE_BOOKS_ID);
		return $this->fetchAll($select);
	}

	/**
	 * Returns a data record specified by its database id.
	 *
	 * @param	int $id
	 * @return	Model_Media | null
	 */
	public function findById($id)
	{
		$select = self::getInstance()->select();
		$select->where(self::F_ID . '=?', $id);
		return self::getInstance()->fetchRow($select);
	}
}
