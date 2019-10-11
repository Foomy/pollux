<?php

/**
 * Table row class for the model of pollux.
 *
 * @author		Sascha Schneider <foomy@sirfoomy.de>
 *
 * @category	model
 * @package		Model_Metakey
 */
class Model_Metakey extends Model_Table_Row_Abstract
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
	 * @return	string
	 */
	public function getKeyname()
	{
		return $this->{Model_Metakey_Table::F_KEYNAME};
	}

	/**
	 * @param	string $keyname
	 */
	public function setKeyname($keyname)
	{
		$this->{Model_Metakey_Table::F_KEYNAME} = $keyname;
	}
}
