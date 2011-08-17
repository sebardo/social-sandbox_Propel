<?php

/**
 * PubsPlugin routing.
 *
 * @package    PubsPlugin
 * @author     Sebas-Sastus SEBARDO <dsastu@gmail.com>
 */
class pubsRouting {
    ////////////////////////////////Home///////////////////////////////////
    static public function addRouteForHome(sfEvent $event) {
        $event->getSubject()->prependRoute('home', new sfPropelRouteCollection(array(
                    'name' => 'home',
                    'model' => 'Pubs',
                    'module' => 'home',
                    'prefix_path' => 'home',
                    'with_wildcard_routes' => true,
                    'requirements' => array(),
                )));
    }

    ////////////////////////////////Pubs///////////////////////////////////
    static public function addRouteForPubs(sfEvent $event) {
        $event->getSubject()->prependRoute('pubs', new sfPropelRouteCollection(array(
                    'name' => 'pubs',
                    'model' => 'Pubs',
                    'module' => 'pubs',
                    'prefix_path' => 'pubs',
                    'with_wildcard_routes' => true,
                    'requirements' => array(),
                )));
    }

    static public function addRouteForAdminPubs(sfEvent $event) {
        $event->getSubject()->prependRoute('pubsAdmin', new sfPropelRouteCollection(array(
                    'name' => 'pubsAdmin',
                    'model' => 'Pubs',
                    'module' => 'pubsAdmin',
                    'prefix_path' => 'admin-for-pubs',
                    'with_wildcard_routes' => true,
                    'requirements' => array(),
                )));
    }

    ////////////////////////////////Favlikess///////////////////////////////////
    static public function addRouteForFavlikes(sfEvent $event) {
        $event->getSubject()->prependRoute('favlikes', new sfPropelRouteCollection(array(
                    'name' => 'favlike',
                    'model' => 'Favlike',
                    'module' => 'favlike',
                    'prefix_path' => 'favlikes',
                    'with_wildcard_routes' => true,
                    'requirements' => array(),
                )));
    }

    static public function addRouteForAdminFavlikes(sfEvent $event) {
        $event->getSubject()->prependRoute('favlikeAdmin', new sfPropelRouteCollection(array(
                    'name' => 'favlikeAdmin',
                    'model' => 'Favlike',
                    'module' => 'favlikeAdmin',
                    'prefix_path' => 'admin-for-favlike',
                    'with_wildcard_routes' => true,
                    'requirements' => array(),
                )));
    }

    ////////////////////////////////Audio///////////////////////////////////
    static public function addRouteForAudios(sfEvent $event) {
        $event->getSubject()->prependRoute('audio', new sfPropelRouteCollection(array(
                    'name' => 'audio',
                    'model' => 'Audio',
                    'module' => 'audio',
                    'prefix_path' => 'audio',
                    'with_wildcard_routes' => true,
                    'requirements' => array(),
                )));
    }

    static public function addRouteForAdminAudios(sfEvent $event) {
        $event->getSubject()->prependRoute('audioAdmin', new sfPropelRouteCollection(array(
                    'name' => 'audioAdmin',
                    'model' => 'Audio',
                    'module' => 'audioAdmin',
                    'prefix_path' => 'admin-for-audios',
                    'with_wildcard_routes' => true,
                    'requirements' => array(),
                )));
    }

////////////////////////////////SETTINGS///////////////////////////////////
    static public function addRouteForSettings(sfEvent $event) {
        $event->getSubject()->prependRoute('settings', new sfPropelRouteCollection(array(
                    'name' => 'settings',
                    'model' => 'Wall',
                    'module' => 'settings',
                    'prefix_path' => 'settings',
                    'with_wildcard_routes' => true,
                )));
    }

    static public function addRouteForSettingsCheckPass(sfEvent $event) {
        $r = $event->getSubject();
        $r->prependRoute('setting_checkpassword', new sfRoute('/settings/checkpassword', array('module' => 'settings', 'action' => 'checkPassword')));
    }

    ////////////////////////////////FOLLOWS///////////////////////////////////
    static public function addRouteForFollows(sfEvent $event) {
        $event->getSubject()->prependRoute('follow', new sfPropelRouteCollection(array(
                    'name' => 'follow',
                    'model' => 'Wall',
                    'module' => 'follow',
                    'prefix_path' => 'followings',
                    'with_wildcard_routes' => true,
                    'requirements' => array('user' => '\d+'),
                )));
    }

    static public function addRouteForAdminFollows(sfEvent $event) {
        $event->getSubject()->prependRoute('followAdmin', new sfPropelRouteCollection(array(
                    'name' => 'followAdmin',
                    'model' => 'Follow',
                    'module' => 'followAdmin',
                    'prefix_path' => 'admin-for-follows',
                    'with_wildcard_routes' => true,
                    'requirements' => array(),
                )));
    }

    static public function addRouteForNewFollows(sfEvent $event) {
        $r = $event->getSubject();
        $r->prependRoute('newFollows', new sfRoute('/newFollows', array('module' => 'follow', 'action' => 'newFollows'), array('user' => '\d+')));
    }
    
    ////////////////////////////////Comments///////////////////////////////////
    static public function addRouteForAdminComments(sfEvent $event) {
        $event->getSubject()->prependRoute('commentAdmin', new sfPropelRouteCollection(array(
                    'name' => 'commentAdmin',
                    'model' => 'Comment',
                    'module' => 'commentAdmin',
                    'prefix_path' => 'admin-for-comments',
                    'with_wildcard_routes' => true,
                    'requirements' => array(),
                )));
    }
    
     ////////////////////////////////Events///////////////////////////////////
    /**
   * Adds an sfDoctrineRouteCollection collection to manage comments.
   *
   * @param sfEvent $event
   * @static
   */
  static public function addRouteForEvents(sfEvent $event)
  {
    $event->getSubject()->prependRoute('event', new sfPropelRouteCollection(array(
      'name'                => 'event',
      'model'               => 'Event',
      'module'              => 'event',
      'prefix_path'         => 'event',
      'with_wildcard_routes' => true,
      'column'               => 'id',
      'requirements'        => array(),
    )));
  }
   static public function addRouteForAdminEvents(sfEvent $event)
  {
    $event->getSubject()->prependRoute('eventAdmin', new sfPropelRouteCollection(array(
      'name'                => 'eventAdmin',
      'model'               => 'Event',
      'module'              => 'eventAdmin',
      'prefix_path'         => 'admin-for-events',
      'with_wildcard_routes' => true,
      'column'               => 'id',
      'requirements'        => array(),
    )));
  }
  
  /**
   * Adds an sfDoctrineRouteCollection collection to manage comments.
   *
   * @param sfEvent $event
   * @static
   */
  static public function addRouteForPhotos(sfEvent $event)
  {
    $event->getSubject()->prependRoute('photo', new sfPropelRouteCollection(array(
      'name'                => 'photo',
      'model'               => 'Photo',
      'module'              => 'photo',
      'prefix_path'         => 'photo',
      'with_wildcard_routes' => true,
      'column'               => 'id',
      'requirements'        => array(),
    )));
  }
   static public function addRouteForAdminPhotos(sfEvent $event)
  {
    $event->getSubject()->prependRoute('photoAdmin', new sfPropelRouteCollection(array(
      'name'                => 'photoAdmin',
      'model'               => 'Photo',
      'module'              => 'photoAdmin',
      'prefix_path'         => 'admin-for-photos',
      'with_wildcard_routes' => true,
      'column'               => 'id',
      'requirements'        => array(),
    )));
  }
  static public function addRouteForAlbums(sfEvent $event)
  {
    $event->getSubject()->prependRoute('album', new sfPropelRouteCollection(array(
      'name'                => 'album',
      'model'               => 'Album_photo',
      'module'              => 'album',
      'prefix_path'         => 'album',
      'with_wildcard_routes' => true,
      'column'               => 'id',
      'requirements'        => array(),
    )));
  }
   static public function addRouteForAdminAlbums(sfEvent $event)
  {
    $event->getSubject()->prependRoute('albumAdmin', new sfPropelRouteCollection(array(
      'name'                => 'albumAdmin',
      'model'               => 'Album_photo',
      'module'              => 'albumAdmin',
      'prefix_path'         => 'admin-for-albums',
      'with_wildcard_routes' => true,
      'column'               => 'id',
      'requirements'        => array(),
    )));
  }
}