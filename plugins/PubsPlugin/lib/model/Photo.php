<?php

/**
 * Skeleton subclass for representing a row from the 'Photo' table.
 *
 * 
 *
 * This class was autogenerated by Propel 1.4.2 on:
 *
 * Sat Aug 13 12:55:19 2011
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    plugins.PubsPlugin.lib.model
 */
class Photo extends BasePhoto {

    public function __toString() {
        return $this->getTitle();
    }

}

// Photo