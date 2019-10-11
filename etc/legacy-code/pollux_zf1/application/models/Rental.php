<?php

/**
 * Table row class for the model of pollux.
 *
 * @author		zfmodel <zfmodel@sirfoomy.de>
 * @author		Sascha Schneider <foomy@sirfoomy.de>
 *
 * @category	model
 * @package		Model_Rental
 */
class Model_Rental extends Model_Table_Row_Abstract
{

	/**
	 * @return	int $personId
	 */
	public function getPersonId()
	{
		return (int)$this->{Model_Rental_Table::F_PERSON_ID};
	}

	/**
	 * @param	int $personId
	 */
	public function setPersonId($personId)
	{
		$this->{Model_Rental_Table::F_PERSON_ID} = (int)$personId;
	}

	/**
	 * @return	int $mediaId
	 */
	public function getMediaId()
	{
		return (int)$this->{Model_Rental_Table::F_MEDIA_ID};
	}

	/**
	 * @param	int $mediaId
	 */
	public function setMediaId($mediaId)
	{
		$this->{Model_Rental_Table::F_MEDIA_ID} = (int)$mediaId;
	}

	/**
	 * @return	string $date
	 */
	public function getSince()
	{
		return $this->{Model_Rental_Table::F_SINCE};
	}

	/**
	 * @param	string $since
	 */
	public function setSince($since)
	{
		$this->{Model_Rental_Table::F_SINCE} = $since;
	}

	/**
	 * @return	string $due
	 */
	public function getDue()
	{
		return $this->{Model_Rental_Table::F_DUE};
	}

	/**
	 * @param	string $due
	 */
	public function setDueDate($due)
	{
		$this->{Model_Rental_Table::F_DUE} = $due;
	}
}
