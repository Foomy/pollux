SELECT 
    p.`id`, pt.`typename`, mk.`keyname`, m.`value`
FROM
    metakey mk
INNER JOIN publication_type pt ON (mk.publication_type_id = pt.id)
INNER JOIN publication p ON (pt.id = p.publication_type_id)
INNER JOIN meta m ON (m.metakey_id = mk.id AND m.publication_id = p.id)
WHERE
    p.id = 1;