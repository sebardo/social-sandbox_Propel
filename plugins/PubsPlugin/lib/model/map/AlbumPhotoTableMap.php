<?php


/**
 * This class defines the structure of the 'Album_photo' table.
 *
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sat Aug 13 13:02:02 2011
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    plugins.PubsPlugin.lib.model.map
 */
class AlbumPhotoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.PubsPlugin.lib.model.map.AlbumPhotoTableMap';

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
		$this->setName('Album_photo');
		$this->setPhpName('AlbumPhoto');
		$this->setClassname('AlbumPhoto');
		$this->setPackage('plugins.PubsPlugin.lib.model');
		$this->setUseIdGenerator(true);
		// columns
		$this->addColumn('ID', 'Id', 'INTEGER', false, null, null);
		$this->addForeignPrimaryKey('USER_ID', 'UserId', 'INTEGER' , 'sf_guard_user', 'ID', true, null, null);
		$this->addForeignPrimaryKey('COVER_ID', 'CoverId', 'INTEGER' , 'Photo', 'ALBUM_ID', true, null, null);
		$this->addColumn('ORD', 'Ord', 'INTEGER', false, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
		$this->addColumn('CREATED_AT', 'CreatedAt', 'TIMESTAMP', false, null, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('sfGuardUser', 'sfGuardUser', RelationMap::MANY_TO_ONE, array('user_id' => 'id', ), 'CASCADE', null);
    $this->addRelation('Photo', 'Photo', RelationMap::MANY_TO_ONE, array('cover_id' => 'album_id', ), 'CASCADE', null);
    $this->addRelation('Photo', 'Photo', RelationMap::ONE_TO_MANY, array('id' => 'album_id', ), 'CASCADE', null);
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

} // AlbumPhotoTableMap
