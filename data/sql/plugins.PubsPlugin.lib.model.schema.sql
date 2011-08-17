
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- Location
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Location`;


CREATE TABLE `Location`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`description` VARCHAR(255),
	`is_active` TINYINT default 0 NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`,`user_id`),
	INDEX `Location_FI_1` (`user_id`),
	CONSTRAINT `Location_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Favlike
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Favlike`;


CREATE TABLE `Favlike`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`record_model` VARCHAR(255),
	`record_id` INTEGER,
	`user_id` INTEGER  NOT NULL,
	`dest_user_id` INTEGER  NOT NULL,
	`is_active` TINYINT default 0 NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`,`user_id`,`dest_user_id`),
	INDEX `Favlike_FI_1` (`user_id`),
	CONSTRAINT `Favlike_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `Favlike_FI_2` (`dest_user_id`),
	CONSTRAINT `Favlike_FK_2`
		FOREIGN KEY (`dest_user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Comment
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Comment`;


CREATE TABLE `Comment`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`description` VARCHAR(1024),
	`record_model` VARCHAR(255),
	`record_id` INTEGER,
	`user_id` INTEGER  NOT NULL,
	`dest_user_id` INTEGER  NOT NULL,
	`is_active` TINYINT default 0 NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`,`user_id`,`dest_user_id`),
	INDEX `Comment_FI_1` (`user_id`),
	CONSTRAINT `Comment_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `Comment_FI_2` (`dest_user_id`),
	CONSTRAINT `Comment_FK_2`
		FOREIGN KEY (`dest_user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Pubs
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Pubs`;


CREATE TABLE `Pubs`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`record_model` VARCHAR(255),
	`record_id` INTEGER,
	`user_id` INTEGER  NOT NULL,
	`dest_user_id` INTEGER  NOT NULL,
	`is_active` TINYINT default 0 NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`,`user_id`,`dest_user_id`),
	INDEX `Pubs_FI_1` (`user_id`),
	CONSTRAINT `Pubs_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `Pubs_FI_2` (`dest_user_id`),
	CONSTRAINT `Pubs_FK_2`
		FOREIGN KEY (`dest_user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Audio
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Audio`;


CREATE TABLE `Audio`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`filename` VARCHAR(255),
	`description` VARCHAR(500),
	`plays` INTEGER,
	`record_model` VARCHAR(255),
	`record_id` INTEGER,
	`user_id` INTEGER  NOT NULL,
	`dest_user_id` INTEGER  NOT NULL,
	`is_active` TINYINT default 0 NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`,`user_id`,`dest_user_id`),
	INDEX `Audio_FI_1` (`user_id`),
	CONSTRAINT `Audio_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `Audio_FI_2` (`dest_user_id`),
	CONSTRAINT `Audio_FK_2`
		FOREIGN KEY (`dest_user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Audio_has_playlist
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Audio_has_playlist`;


CREATE TABLE `Audio_has_playlist`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`audio_id` INTEGER,
	`pl_id` INTEGER,
	`orden` INTEGER,
	PRIMARY KEY (`id`),
	INDEX `Audio_has_playlist_FI_1` (`audio_id`),
	CONSTRAINT `Audio_has_playlist_FK_1`
		FOREIGN KEY (`audio_id`)
		REFERENCES `Audio` (`id`)
		ON DELETE CASCADE,
	INDEX `Audio_has_playlist_FI_2` (`pl_id`),
	CONSTRAINT `Audio_has_playlist_FK_2`
		FOREIGN KEY (`pl_id`)
		REFERENCES `Playlist` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Playlist
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Playlist`;


CREATE TABLE `Playlist`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`user_id` INTEGER,
	`description` VARCHAR(1024),
	`image` VARCHAR(255),
	`is_active` TINYINT,
	`plays` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `Playlist_FI_1` (`user_id`),
	CONSTRAINT `Playlist_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Text
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Text`;


CREATE TABLE `Text`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER,
	`description` VARCHAR(1024),
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `Text_FI_1` (`user_id`),
	CONSTRAINT `Text_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Link
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Link`;


CREATE TABLE `Link`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER,
	`url` VARCHAR(1024),
	`image` VARCHAR(1024),
	`title` VARCHAR(255),
	`site_name` VARCHAR(255),
	`description` VARCHAR(1024),
	`created_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `Link_FI_1` (`user_id`),
	CONSTRAINT `Link_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Follow
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Follow`;


CREATE TABLE `Follow`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`follow_id` INTEGER  NOT NULL,
	`is_active` INTEGER default 2 NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`,`user_id`,`follow_id`),
	INDEX `Follow_FI_1` (`user_id`),
	CONSTRAINT `Follow_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `Follow_FI_2` (`follow_id`),
	CONSTRAINT `Follow_FK_2`
		FOREIGN KEY (`follow_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Setting
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Setting`;


CREATE TABLE `Setting`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255),
	`description` VARCHAR(1024),
	`is_active` TINYINT default 0 NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Notification
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Notification`;


CREATE TABLE `Notification`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`dest_user_id` INTEGER  NOT NULL,
	`record_model` VARCHAR(255),
	`record_id` INTEGER,
	`related_model` VARCHAR(255),
	`created_at` VARCHAR(255),
	`is_active` TINYINT default 0 NOT NULL,
	PRIMARY KEY (`id`,`user_id`,`dest_user_id`),
	INDEX `Notification_FI_1` (`user_id`),
	CONSTRAINT `Notification_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `Notification_FI_2` (`dest_user_id`),
	CONSTRAINT `Notification_FK_2`
		FOREIGN KEY (`dest_user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Setting_has_User
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Setting_has_User`;


CREATE TABLE `Setting_has_User`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`setting_id` INTEGER  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	`record_model` VARCHAR(255),
	`record_id` INTEGER,
	`is_active` TINYINT default 0 NOT NULL,
	`created_at` DATETIME,
	PRIMARY KEY (`id`,`setting_id`,`user_id`),
	INDEX `Setting_has_User_FI_1` (`setting_id`),
	CONSTRAINT `Setting_has_User_FK_1`
		FOREIGN KEY (`setting_id`)
		REFERENCES `Setting` (`id`)
		ON DELETE CASCADE,
	INDEX `Setting_has_User_FI_2` (`user_id`),
	CONSTRAINT `Setting_has_User_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Event
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Event`;


CREATE TABLE `Event`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`setting_id` INTEGER  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	`name` VARCHAR(255),
	`description` VARCHAR(25556),
	`date` DATE,
	`hour` TIME,
	`end_date` DATE,
	`end_hour` TIME,
	`is_active` TINYINT default 1 NOT NULL,
	`address` VARCHAR(255),
	`latitude` FLOAT(9,7),
	`longitude` FLOAT(9,7),
	`image` VARCHAR(255),
	`created_at` DATETIME,
	PRIMARY KEY (`id`,`setting_id`,`user_id`),
	INDEX `Event_FI_1` (`setting_id`),
	CONSTRAINT `Event_FK_1`
		FOREIGN KEY (`setting_id`)
		REFERENCES `Setting` (`id`)
		ON DELETE CASCADE,
	INDEX `Event_FI_2` (`user_id`),
	CONSTRAINT `Event_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Photo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Photo`;


CREATE TABLE `Photo`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`album_id` INTEGER  NOT NULL,
	`title` VARCHAR(255),
	`name` VARCHAR(255),
	`ord` INTEGER,
	`x1` INTEGER,
	`y1` INTEGER,
	`x2` INTEGER,
	`y2` INTEGER,
	`created_at` DATETIME,
	PRIMARY KEY (`id`,`album_id`),
	INDEX `I_referenced_Album_photo_FK_2_1` (`album_id`),
	CONSTRAINT `Photo_FK_1`
		FOREIGN KEY (`album_id`)
		REFERENCES `Album_photo` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Album_photo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Album_photo`;


CREATE TABLE `Album_photo`
(
	`id` INTEGER   AUTO_INCREMENT,
	`user_id` INTEGER  NOT NULL,
	`cover_id` INTEGER  NOT NULL,
	`ord` INTEGER,
	`name` VARCHAR(255),
	`created_at` DATETIME,
	PRIMARY KEY (`user_id`,`cover_id`),
	INDEX `I_referenced_Photo_FK_1_1` (`id`),
	CONSTRAINT `Album_photo_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE,
	INDEX `Album_photo_FI_2` (`cover_id`),
	CONSTRAINT `Album_photo_FK_2`
		FOREIGN KEY (`cover_id`)
		REFERENCES `Photo` (`album_id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Tags_photo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Tags_photo`;


CREATE TABLE `Tags_photo`
(
	`photo_id` INTEGER  NOT NULL,
	`x1` INTEGER,
	`y1` INTEGER,
	`x2` INTEGER,
	`y2` INTEGER,
	`name` VARCHAR(255),
	PRIMARY KEY (`photo_id`),
	CONSTRAINT `Tags_photo_FK_1`
		FOREIGN KEY (`photo_id`)
		REFERENCES `Photo` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- Profile_photo
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `Profile_photo`;


CREATE TABLE `Profile_photo`
(
	`photo_id` INTEGER  NOT NULL,
	`user_id` INTEGER  NOT NULL,
	PRIMARY KEY (`photo_id`,`user_id`),
	CONSTRAINT `Profile_photo_FK_1`
		FOREIGN KEY (`photo_id`)
		REFERENCES `Photo` (`id`)
		ON DELETE CASCADE,
	INDEX `Profile_photo_FI_2` (`user_id`),
	CONSTRAINT `Profile_photo_FK_2`
		FOREIGN KEY (`user_id`)
		REFERENCES `sf_guard_user` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
