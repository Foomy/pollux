<?php

class Form_Media_Factory
{
	/**
	 * @param	string $typename
	 * @return	Form_Media | null
	 */
	public static function create($typename)
	{
		$mediatypeTable = Model_Mediatype_Table::getInstance();
		$mediatype = $mediatypeTable->findByTypename($typename);

		if (! empty($mediatype)) {
			$options = array(
				Model_Media_Table::F_MEDIATYPE_ID => $mediatype->getId()
			);

			return new Form_Media($options);
		}

		return null;
	}
}
