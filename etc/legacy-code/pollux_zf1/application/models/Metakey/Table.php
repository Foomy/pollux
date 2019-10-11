<?php

/**
 * Table class for the model of pollux.
 *
 * @author		Sascha Schneider <foomy@sirfoomy.de>
 *
 * @category	model
 * @package		Model_Metakey_Table
 */
class Model_Metakey_Table extends Model_Table_Abstract
{
	const T_NAME = 'metakey';

	const F_MEDIATYPE_ID	= 'mediatype_id';
	const F_KEYNAME			= 'keyname';

	protected $_name		= self::T_NAME;
	protected $_primary		= self::F_ID;
	protected $_rowClass	= 'Model_Metakey';
	protected $_sequence	= true;

	protected $_dependentTables = array(
		'Model_Meta_Table',
	);

	private static $instance;

	/**
	 * Returns an instance of the client table.
	 *
	 * @return	Model_Metakey_Table
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
	 * Returns a rowset with all metakeys for the
	 * given mediatype ID.
	 *
	 * @param	int $mediatype
	 * @return	Zend_Db_Table_Rowset_Abstract
	 */
	public function getAllByMediatype($mediatypeId)
	{
		$select = $this->select();
		$select->where($this->quote(self::F_MEDIATYPE_ID) . '=?', $mediatypeId);
		return $this->fetchAll($select);
	}

	/**
	 * Returns a data record specified by its database id.
	 *
	 * @param	int $id
	 * @return	Model_Metakey | null
	 */
	public function findById($id)
	{
		$select = $this->select();
		$select->where($this->quote(self::F_ID) . '=?', $id);
		return $this->fetchRow($select);
	}

	/**
	 * Returns a data record specified by the keyname.
	 *
	 * @param $keyname
	 * @return null|Zend_Db_Table_Row_Abstract
	 */
	public function findByName($keyname)
	{
		$select = $this->select();
		$select->where($this->quote(self::F_KEYNAME) . '=?', $keyname);
		return $this->fetchRow($select);
	}

	/**
	 * Returns all metakeys for the given media type.
	 *
	 * @param	int $mediatypeId
	 * @return	Zend_Db_Table_Rowset_Abstract
	 */
	public function getByMediatype($mediatypeId)
	{
		$select = $this->select();
		$select->where($this->quote(self::F_MEDIATYPE_ID) . '=?', $mediatypeId);
		return $this->fetchAll($select);
	}
}
