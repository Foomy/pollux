<?php

/**
 * Table row class for the model of pollux.
 *
 * @author		zfmodel <zfmodel@sirfoomy.de>
 * @author		Sascha Schneider <foomy@sirfoomy.de>
 *
 * @category	model
 * @package		Model_Media
 */
class Model_Media extends Model_Table_Row_Abstract
{
	/**
	 * @return	int $mediatypeId
	 */
	public function getMediatypeId()
	{
		return $this->{Model_Media_Table::F_MEDIATYPE_ID};
	}

	/**
	 * @param	int $mediatypeId
	 */
	public function setMediatypeId($mediatypeId)
	{
		$this->{Model_Media_Table::F_MEDIATYPE_ID} = $mediatypeId;
	}

	/**
	 * @return	string $title
	 */
	public function getTitle()
	{
		return $this->{Model_Media_Table::F_TITLE};
	}

	/**
	 * @return	string $title
	 */
	public function setTitle($title)
	{
		$this->{Model_Media_Table::F_TITLE} = $title;
	}

	/**
	 * @return	string $mediatype
	 */
	public function getMediatype()
	{
		$mediaType = $this->findDependentRowset('Model_Mediatype_Table');
		if (! empty($mediaType)) {
			return $mediaType->getTypename();
		}

		return '';
	}

	/**
	 * Returns a rowset containing all meta information
	 * objects for the medium.
	 *
	 * @return Zend_Db_Table_Rowset_Abstract
	 */
	public function getMetaInformation()
	{
		$metaTable = $this->getTable()->getTableFromString('Model_Meta_Table');
		return $metaTable->getMetaInformationByMediaId($this->getId());
	}
}
