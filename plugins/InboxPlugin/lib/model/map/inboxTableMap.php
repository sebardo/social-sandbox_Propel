<?php


/**
 * This class defines the structure of the 'inbox' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sat Aug 13 13:01:58 2011
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.InboxPlugin.lib.model.map
 */
class inboxTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.InboxPlugin.lib.model.map.inboxTableMap';

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
		$this->setName('inbox');
		$this->setPhpName('inbox');
		$this->setClassname('inbox');
		$this->setPackage('plugins.InboxPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
		$this->addForeignKey('DEST_USER_ID', 'DestUserId', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
		$this->addColumn('TITLE', 'Title', 'VARCHAR', false, 255, null);
		$this->addColumn('DESCRIPTION', 'Description', 'CLOB', false, null, null);
		$this->addColumn('IS_ACTIVE', 'IsActive', 'BOOLEAN', false, null, null);
		$this->addColumn('REPLY', 'Reply', 'BOOLEAN', false, null, null);
		$this->addColumn('RECORD_ID', 'RecordId', 'INTEGER', false, null, null);
		$this->addColumn('FEATURED', 'Featured', 'BOOLEAN', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('sfGuardUserRelatedByUserId', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('sfGuardUserRelatedByDestUserId', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('dest_user_id' => 'id', ), 'CASCADE', null);
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

} // inboxTableMap
