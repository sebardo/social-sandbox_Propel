<?php


/**
 * This class defines the structure of the 'sf_guard_user' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sat Aug 13 13:01:59 2011
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.sfGuardPlugin.lib.model.map
 */
class sfGuardUserTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.sfGuardPlugin.lib.model.map.sfGuardUserTableMap';

	/**
	 * Initialize the table attributes, columns and validators
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @return     void
	 * @throws     PropelException
	 */
	public function initialize()
	{
	  // attributes
		$this->setName('sf_guard_user');
		$this->setPhpName('sfGuardUser');
		$this->setClassname('sfGuardUser');
		$this->setPackage('plugins.sfGuardPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('FIRST_NAME', 'FirstName', 'VARCHAR', false, 128, null);
		$this->addColumn('LAST_NAME', 'LastName', 'VARCHAR', false, 128, null);
		$this->addColumn('EMAIL_ADDRESS', 'EmailAddress', 'VARCHAR', true, 128, null);
		$this->addColumn('USERNAME', 'Username', 'VARCHAR', true, 128, null);
		$this->addColumn('ALGORITHM', 'Algorithm', 'VARCHAR', true, 128, 'sha1');
		$this->addColumn('SALT', 'Salt', 'VARCHAR', true, 128, null);
		$this->addColumn('PASSWORD', 'Password', 'VARCHAR', true, 128, null);
		$this->addColumn('SEX', 'Sex', 'BOOLEAN', false, null, false);
		$this->addColumn('BIRTHDAY', 'Birthday', 'DATE', false, null, null);
		$this->addColumn('ABOUTME', 'Aboutme', 'VARCHAR', false, 1000, null);
		$this->addColumn('PROFESSION', 'Profession', 'VARCHAR', false, 1000, null);
		$this->addColumn('MUSIC', 'Music', 'VARCHAR', false, 1000, null);
		$this->addColumn('BOOKS', 'Books', 'VARCHAR', false, 1000, null);
		$this->addColumn('FILMS', 'Films', 'VARCHAR', false, 1000, null);
		$this->addColumn('TELEVISION', 'Television', 'VARCHAR', false, 1000, null);
		$this->addColumn('GAMES', 'Games', 'VARCHAR', false, 1000, null);
		$this->addColumn('MARITAL_STATUS', 'MaritalStatus', 'INTEGER', false, null, null);
		$this->addColumn('MEETING_SEX', 'MeetingSex', 'INTEGER', false, null, null);
		$this->addColumn('HOMETOWN', 'Hometown', 'VARCHAR', false, 128, null);
		$this->addColumn('BORNTOWN', 'Borntown', 'VARCHAR', false, 128, null);
		$this->addColumn('SMOKER', 'Smoker', 'INTEGER', false, null, null);
		$this->addColumn('DRINKER', 'Drinker', 'INTEGER', false, null, null);
		$this->addColumn('EDUCATION', 'Education', 'VARCHAR', false, 128, null);
		$this->addColumn('LANGUAGE', 'Language', 'VARCHAR', false, 128, null);
		$this->addColumn('RELIGION', 'Religion', 'VARCHAR', false, 128, null);
		$this->addColumn('POLITIC', 'Politic', 'VARCHAR', false, 128, null);
		$this->addColumn('COUNTRY', 'Country', 'VARCHAR', false, 128, null);
		$this->addColumn('CITY', 'City', 'VARCHAR', false, 128, null);
		$this->addColumn('CP', 'Cp', 'VARCHAR', false, 128, null);
		$this->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 1000, null);
		$this->addColumn('CONTACT', 'Contact', 'VARCHAR', false, 128, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		$this->addColumn('LAST_LOGIN', 'LastLogin', 'TIMESTAMP', false, null, null);
		$this->addColumn('IS_ACTIVE', 'IsActive', 'BOOLEAN', true, null, false);
		$this->addColumn('IS_SUPER_ADMIN', 'IsSuperAdmin', 'BOOLEAN', true, null, false);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('inboxRelatedByUserId', 'inbox', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('inboxRelatedByDestUserId', 'inbox', RelationMap::ONE_TO_MANY, array('id' => 'dest_user_id', ), 'CASCADE', null);
    $this->addRelation('sfGuardUserPermission', 'sfGuardUserPermission', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('sfGuardUserGroup', 'sfGuardUserGroup', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('sfGuardRememberKey', 'sfGuardRememberKey', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('Sfguardforgotpassword', 'Sfguardforgotpassword', RelationMap::ONE_TO_ONE, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('Location', 'Location', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('FavlikeRelatedByUserId', 'Favlike', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('FavlikeRelatedByDestUserId', 'Favlike', RelationMap::ONE_TO_MANY, array('id' => 'dest_user_id', ), 'CASCADE', null);
    $this->addRelation('CommentRelatedByUserId', 'Comment', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('CommentRelatedByDestUserId', 'Comment', RelationMap::ONE_TO_MANY, array('id' => 'dest_user_id', ), 'CASCADE', null);
    $this->addRelation('PubsRelatedByUserId', 'Pubs', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('PubsRelatedByDestUserId', 'Pubs', RelationMap::ONE_TO_MANY, array('id' => 'dest_user_id', ), 'CASCADE', null);
    $this->addRelation('AudioRelatedByUserId', 'Audio', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('AudioRelatedByDestUserId', 'Audio', RelationMap::ONE_TO_MANY, array('id' => 'dest_user_id', ), 'CASCADE', null);
    $this->addRelation('Playlist', 'Playlist', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('Text', 'Text', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('Link', 'Link', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('FollowRelatedByUserId', 'Follow', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('FollowRelatedByFollowId', 'Follow', RelationMap::ONE_TO_MANY, array('id' => 'follow_id', ), 'CASCADE', null);
    $this->addRelation('NotificationRelatedByUserId', 'Notification', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('NotificationRelatedByDestUserId', 'Notification', RelationMap::ONE_TO_MANY, array('id' => 'dest_user_id', ), 'CASCADE', null);
    $this->addRelation('SettingHasUser', 'SettingHasUser', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('Event', 'Event', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('AlbumPhoto', 'AlbumPhoto', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
    $this->addRelation('ProfilePhoto', 'ProfilePhoto', RelationMap::ONE_TO_MANY, array('id' => 'user_id', ), 'CASCADE', null);
	} // buildRelations()

	/**
	 * 
	 * Gets the list of behaviors registered for this table
	 * 
	 * @return array Associative array (name => parameters) of behaviors
	 */
	public function getBehaviors()
	{
		return array(
			'symfony' => array('form' => 'true', 'filter' => 'true', ),
			'symfony_behaviors' => array(),
			'symfony_timestampable' => array('create_column' => 'created_at', ),
		);
	} // getBehaviors()

} // sfGuardUserTableMap
