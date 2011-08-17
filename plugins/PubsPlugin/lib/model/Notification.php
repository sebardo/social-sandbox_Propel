<?php


/**
 * Skeleton subclass for representing a row from the 'Notification' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Wed Aug 10 15:39:52 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    plugins.PubsPlugin.lib.model
 */
class Notification extends BaseNotification {

	/**
	 * Initializes internal state of Notification object.
	 * @see        parent::__construct()
	 */
	public function __construct()
	{
		// Make sure that parent constructor is always invoked, since that
		// is where any default values for this object are set.
		parent::__construct();
	}
        
        public function getUser($id=null) {

        return sfGuardUserPeer::retrieveByPk($this->user_id);
    }

} // Notification