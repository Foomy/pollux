CREATE TABLE `publication` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`publication_type_id` int(10) NOT NULL DEFAULT '1',
	`created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `publication_type` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
	`typename` varchar(50) DEFAULT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `meta` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`metakey_id` int(11) NOT NULL DEFAULT '0',
	`publication_id` int(10) unsigned NOT NULL DEFAULT '0',
	`user_id` int(10) unsigned NOT NULL DEFAULT '0',
	`created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
	`value` text,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `metakey` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`publication_type_id` int(10) unsigned NOT NULL DEFAULT '0',
	`user_id` int(10) unsigned NOT NULL DEFAULT '0',
	`created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
	`keyname` varchar(50) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
	`username` varchar(50) DEFAULT NULL,
	`password` varchar(50) DEFAULT NULL,
	`can_login` tinyint(1) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `rental` (
	`person_id` int(10) unsigned NOT NULL,
	`publication_id` int(10) unsigned NOT NULL,
	`created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`last_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
	`since` date DEFAULT NULL,
	`due` date DEFAULT NULL,
	PRIMARY KEY (`person_id`,`publication_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;