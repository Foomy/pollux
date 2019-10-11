<?php

/**
 * Table class for the model of pollux.
 *
 * @author		zfmodel <zfmodel@sirfoomy.de>
 * @author		Sascha Schneider <foomy@sirfoomy.de>
 *
 * @category	model
 * @package		Model_Meta_Table
 */
class Model_Meta_Table extends Model_Table_Abstract
{
	const T_NAME = 'meta';

	const F_MEDIA_ID	= 'media_id';
	const F_METAKEY_ID	= 'metakey_id';
	const F_PERSON_ID	= 'person_id';
	const F_VALUE		= 'value';

	protected $_name		= self::T_NAME;
	protected $_primary		= self::F_ID;
	protected $_rowClass	= 'Model_Meta';
	protected $_sequence	= true;

	protected $_referenceMap    = array(
		'Media' => array(
			'columns'		=> array(self::F_MEDIA_ID),
			'refTableClass'	=> 'Model_Media_Table',
			'refColumns'	=> array(Model_Media_Table::F_ID),
			'onDelete'		=> self::CASCADE,
			'onUpdate'		=> self::CASCADE
		),
		'Metakey' => array(
			'columns'		=> array(self::F_METAKEY_ID),
			'refTableClass'	=> 'Model_Metakey_Table',
			'refColumns'	=> array(Model_Metakey_Table::F_ID),
			'onDelete'		=> self::CASCADE,
			'onUpdate'		=> self::CASCADE
		)
	);

	protected static $instance = null;

	/**
	 * Returns an instance of the client table.
	 *
	 * @return	Model_Meta_Table
	 */
	public static function getInstance()
	{
		if (null === self::$instance) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * @param  array $data OPTIONAL data to populate in the new row.
	 * @param  string $defaultSource OPTIONAL flag to force default values into new row
	 * @return	Model_Meta
	 */
	public function createRow(array $data = array(), $defaultSource = null)
	{
		return parent::createRow($data, $defaultSource);
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
	 * Returns a data record specified by its database id.
	 *
	 * @param	int $id
	 * @return	Model_Meta | null
	 */
	public function findById($id)
	{
		$select = $this->select();
		$select->where($this->quote(self::F_ID) . '=?', $id);
		return $this->fetchRow($select);
	}

	/**
	 * Returns all entries for the given media id.
	 *
	 * @param	int $mediaId
	 * @return	Zend_Db_Table_Rowset_Abstract
	 */
	public function findByMediaId($mediaId)
	{
		$select = $this->select();
		$select->where($this->quote(self::F_MEDIA_ID) . '=?', $mediaId);
		return $this->fetchAll($select);
	}

	public function getMetaInformationByMediaId($mediaId)
	{
		$sql = "
			SELECT mk.`keyname`, m.`value`
			  FROM `" . self::T_NAME . "` AS m
			LEFT JOIN `" . Model_Metakey_Table::T_NAME . "` AS mk ON (m." . self::F_METAKEY_ID . "= mk." . Model_Metakey_Table::F_ID . ")
			 WHERE m.`" . self::F_MEDIA_ID . "` = $mediaId
		";

		$dba = $this->getAdapter();
		$metas = $dba->fetchAll($sql);

		$metaInformation = array();
		foreach ($metas as $meta) {
			$metaInformation[$meta['keyname']] = $meta['value'];
		}

		return $metaInformation;
	}
}
