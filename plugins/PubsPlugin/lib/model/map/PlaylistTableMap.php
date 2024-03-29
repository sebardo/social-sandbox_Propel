<?php


/**
 * This class defines the structure of the 'Playlist' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sat Aug 13 13:02:01 2011
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.PubsPlugin.lib.model.map
 */
class PlaylistTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.PubsPlugin.lib.model.map.PlaylistTableMap';

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
		$this->setName('Playlist');
		$this->setPhpName('Playlist');
		$this->setClassname('Playlist');
		$this->setPackage('plugins.PubsPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('ID', 'Id', 'INTEGER', true, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
		$this->addForeignKey('USER_ID', 'UserId', 'INTEGER', 'sf_guard_user', 'ID', false, null, null);
		$this->addColumn('DESCRIPTION', 'Description', 'VARCHAR', false, 1024, null);
		$this->addColumn('IMAGE', 'Image', 'VARCHAR', false, 255, null);
		$this->addColumn('IS_ACTIVE', 'IsActive', 'BOOLEAN', false, null, null);
		$this->addColumn('PLAYS', 'Plays', 'INTEGER', false, null, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('sfGuardUser', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('AudioHasPlaylist', 'AudioHasPlaylist', RelationMap::ONE_TO_MANY, array('id' => 'pl_id', ), 'CASCADE', null);
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

} // PlaylistTableMap
