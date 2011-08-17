
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- inbox
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `inbox`;


CREATE TABLE `inbox`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER,
	`dest_user_id` INTEGER,
	`title` VARCHAR(255),
	`description` LONGTEXT,
	`is_active` TINYINT,
	`reply` TINYINT,
	`record_id` INTEGER,
	`featured` TINYINT,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `inbox_FI_1` (`user_id`),
	CONSTRAINT `inbox_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `inbox_FI_2` (`dest_user_id`),
	CONSTRAINT `inbox_FK_2`
		FOREIGN KEY (`dest_user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
