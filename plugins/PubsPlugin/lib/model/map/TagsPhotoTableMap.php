<?php


/**
 * This class defines the structure of the 'Tags_photo' table.
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
class TagsPhotoTableMap extends TableMap {

	/**
	 * The (dot-path) name of this class
	 */
	const CLASS_NAME = 'plugins.PubsPlugin.lib.model.map.TagsPhotoTableMap';

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
		$this->setName('Tags_photo');
		$this->setPhpName('TagsPhoto');
		$this->setClassname('TagsPhoto');
		$this->setPackage('plugins.PubsPlugin.lib.model');
		$this->setUseIdGenerator(false);
		// columns
		$this->addForeignPrimaryKey('PHOTO_ID', 'PhotoId', 'INTEGER' , 'Photo', 'ID', true, null, null);
		$this->addColumn('X1', 'X1', 'INTEGER', false, null, null);
		$this->addColumn('Y1', 'Y1', 'INTEGER', false, null, null);
		$this->addColumn('X2', 'X2', 'INTEGER', false, null, null);
		$this->addColumn('Y2', 'Y2', 'INTEGER', false, null, null);
		$this->addColumn('NAME', 'Name', 'VARCHAR', false, 255, null);
		// validators
	} // initialize()

	/**
	 * Build the RelationMap objects for this table relationships
	 */
	public function buildRelations()
	{
    $this->addRelation('Photo', 'Photo', RelationMap::MANY_TO_ONE, array('photo_id' => 'id', ), 'CASCADE', null);
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
		);
	} // getBehaviors()

} // TagsPhotoTableMap