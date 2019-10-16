<?php

/**
 * Table row class for the model of pollux.
 *
 * @author		zfmodel <zfmodel@sirfoomy.de>
 * @author		Sascha Schneider <foomy@sirfoomy.de>
 *
 * @category	model
 * @package		Model_Meta
 */
class Model_Meta extends Model_Table_Row_Abstract
{
	/**
	 * @return	int $mediaId
	 */
	public function getMediaId()
	{
		return (int)$this->{Model_Meta_Table::F_MEDIA_ID};
	}

	/**
	 * @param	int $mediaId
	 */
	public function setMediaId($mediaId)
	{
		$this->{Model_Meta_Table::F_MEDIA_ID} = (int)$mediaId;
	}

	/**
	 * @return	int $metakeyId
	 */
	public function getMetakeyId()
	{
		return $this->{Model_Meta_Table::F_METAKEY_ID};
	}

	/**
	 * @param	int $metakeyId
	 */
	public function setMetakeyId($metakeyId)
	{
		$this->{Model_Meta_Table::F_METAKEY_ID} = $metakeyId;
	}

	/**
	 * @return	int $personId
	 */
	public function getPersonId()
	{
		return (int)$this->{Model_Meta_Table::F_PERSON_ID};
	}

	/**
	 * @param	int $personId
	 */
	public function setPersonId($personId)
	{
		$this->{Model_Meta_Table::F_PERSON_ID} = (int)$personId;
	}

	/**
	 * @return	mixed $value
	 */
	public function getValue()
	{
		return $this->{Model_Meta_Table::F_VALUE};
	}

	/**
	 * @param	mixed $value
	 */
	public function setValue($value)
	{
		$this->{Model_Meta_Table::F_VALUE} = $value;
	}
}
