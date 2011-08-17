<?php

if (sfConfig::get('app_sf_guard_plugin_routes_register', true) && in_array('sfGuardAuth', sfConfig::get('sf_enabled_modules', array())))
{
  $this->dispatcher->connect('routing.load_configuration', array('sfGuardRouting', 'listenToRoutingLoadConfigurationEvent'));
}

foreach (array('sfGuardUser', 'sfGuardGroup', 'sfGuardPermission', 'sfGuardRegister', 'sfGuardForgotPassword') as $module)
    {
      if (in_array($module, sfConfig::get('sf_enabled_modules', array())))
      {
        $this->dispatcher->connect('routing.load_configuration', array('sfGuardRouting', 'addRouteFor'.str_replace('sfGuard', '', $module)));
      }
    }
