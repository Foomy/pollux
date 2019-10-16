<?php

/**
 * Entity class 'movie' of the pollux model. An instance
 * of this class unifies the data for a single movie in
 * one object.
 *
 * @author		Sascha Schneider <foomy.code@arcor.de>
 *
 * @category	model
 * @package		Model_Movie
 */
class Model_Movie
{
	/**
	 * Media primary id.
	 *
	 * @var	int
	 */
	private $primary = 0;

	/**
	 * Complete movie data.
	 *
	 * @var	array
	 */
	private $data = array();

	/**
	 * A copy of data, if the movie is loaded from the database.
	 *
	 * @var	array
	 */
	private $cleadData = array();

	/**
	 * The metakeys for this type of media.
	 *
	 * @var	array
	 */
	private $keys = array();

	public function __construct($id = 0)
	{
		$this->setPrimaryId($id);
	}

	public function setPrimaryId($id)
	{
		if ((int)$id > 0) {
			$this->primary = $id;
		}
	}

	public function __set($key, $value)
	{
		if ((! empty($key)) && (! empty($value))) {
			if ('primary' === $key) {
				$this->primary = $value;
			}
			else {
				$this->data[$key] = $value;
			}
		}
	}

	public function __get($key)
	{
		if (isset($this->data[$key])) {
			return $this->data[$key];
		}
	}

	/**
	 * Reads data from the DBMS an fills the object's properties.
	 *
	 * @throws Exception
	 */
	public function loadData()
	{
		if ((int) $this->primary <= 0) {
			throw new Exception('Invalid primary ID given.');
		}

		$mediaTable = $this->getMediaTable();
		if (null !== ($media = $mediaTable->findById($this->primary))) {
			$this->data[Model_Media_Table::F_TITLE] = $media->getTitle();
		}

		$metaTable = $this->getMetaTable();
		$metakeyTable = $this->getMetakeyTable();
		if (null !== ($meta = $metaTable->findByMediaId($media->getId()))) {
			foreach ($meta as $m) {
				$metakey = $metakeyTable->findById($m->getMetakeyId());
				$this->data[$metakey->getKeyname()] = $m->getValue();
				$this->keys[] = $metakey->getKeyname();
			}
		}

		$this->cleadData = $this->data;
	}

	/**
	 * Writes the movie data into the database.
	 */
	public function save()
	{
		if (! $this->hasChanges()) {
			return $this->primary;
		}

		if ((int)$this->primary > 0) {
			$this->update();
		}
		else {
			return $this->insert();
		}

		return $this->primary;
	}

	/**
	 * @param	Model_Media_Table $table
	 * @return	Model_Media_Table
	 */
	protected function getMediaTable(Model_Media_Table $table = null)
	{
		if (null === $table) {
			$table = Model_Media_Table::getInstance();
		}

		return $table;
	}

	/**
	 * @param	Model_Meta_Table $table
	 * @return	Model_Meta_Table
	 */
	protected function getMetaTable(Model_Meta_Table $table = null)
	{
		if (null === $table) {
			$table = Model_Meta_Table::getInstance();
		}

		return $table;
	}

	/**
	 * @param	Model_Metakey_Table $table
	 * @return	Model_Metakey_Table
	 */
	protected function getMetakeyTable(Model_Metakey_Table $table = null)
	{
		if (null === $table) {
			$table = Model_Metakey_Table::getInstance();
		}

		return $table;
	}

	/**
	 * @param	Model_Mediatype_Table $table
	 * @return	Model_Mediatype_Table
	 */
	protected function getMediatypeTable(Model_Mediatype_Table $table = null)
	{
		if (null === $table) {
			$table = Model_Mediatype_Table::getInstance();
		}

		return $table;
	}

	private function update()
	{
		// @todo Implement Model_Movie::update()
	}

	private function insert()
	{
		$mediaTable = $this->getMediaTable();
		$media = $mediaTable->createRow();

		$media->setTitle($this->data['title']);
		$mediaId = $media->save();

		$metaTable = $this->getMetaTable();
		$metakeyTable = $this->getMetakeyTable();

		$metaKeys = $metakeyTable->getAllByMediatype($this->getMediaTypeId());
		foreach ($metaKeys as $metaKey) {
			if (isset($this->data[$metaKey->getKeyname()])) {
				$meta = $metaTable->createRow();
				$meta->setMediaId($mediaId);
				$meta->setMetakeyId($metaKey->getId());
				$meta->setValue($this->data[$metaKey->getKeyname()]);
				$metaId = $this->save();
			}
		}

		$this->primary = $mediaId;
		return $this->primary;
	}

	private function getMediaTypeId()
	{
		$mediatypeTable = $this->getMediatypeTable();
		return $mediatypeTable->findByTypename(Model_Mediatype_Table::MTYPE_MOVIES);
	}

	/**
	 * Checks, whether the object properties has changes.
	 *
	 * @return boolean
	 */
	private function hasChanges()
	{
		if (empty($this->cleadData)) {
			return false;
		}

		$hasChanges = false;
		foreach ($this->cleanData as $key => $value) {
			if ($this->data[$key] !== $value) {
				$hasChanges = true;
			}
		}

		return $hasChanges;
	}
}
