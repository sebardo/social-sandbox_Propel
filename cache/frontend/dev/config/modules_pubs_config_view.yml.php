<?php
// auto-generated by sfViewConfigHandler
// date: 2011/08/17 16:37:54
$response = $this->context->getResponse();

if ($this->actionName.$this->viewName == 'sharebyMailSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else if ($this->actionName.$this->viewName == 'publishingSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else if ($this->actionName.$this->viewName == 'sharePubSuccess')
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}
else
{
  $templateName = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_template', $this->actionName);
  $this->setTemplate($templateName.$this->viewName.$this->getExtension());
}

if ($templateName.$this->viewName == 'sharebyMailSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else
  {
    $this->setDecoratorTemplate('' == '' ? false : ''.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('/PubsPlugin/css/main.css', '', array ());
  $response->addStylesheet('/PubsPlugin/css/facebox.css', '', array ());
  $response->addJavascript('/sfGuardPlugin/js/jquery-1.6.1.js', '', array ());
  $response->addJavascript('/PubsPlugin/js/facebox.js', '', array ());
  $response->addJavascript('/PubsPlugin/js/ui.core.js', '', array ());
  $response->addJavascript('/PubsPlugin/js/ui.draggable.js', '', array ());
}
else if ($templateName.$this->viewName == 'publishingSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else
  {
    $this->setDecoratorTemplate('' == '' ? false : ''.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('/PubsPlugin/css/main.css', '', array ());
  $response->addStylesheet('/PubsPlugin/css/facebox.css', '', array ());
  $response->addJavascript('/sfGuardPlugin/js/jquery-1.6.1.js', '', array ());
  $response->addJavascript('/PubsPlugin/js/facebox.js', '', array ());
  $response->addJavascript('/PubsPlugin/js/ui.core.js', '', array ());
  $response->addJavascript('/PubsPlugin/js/ui.draggable.js', '', array ());
}
else if ($templateName.$this->viewName == 'sharePubSuccess')
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('/PubsPlugin/css/main.css', '', array ());
  $response->addStylesheet('/PubsPlugin/css/facebox.css', '', array ());
  $response->addJavascript('/sfGuardPlugin/js/jquery-1.6.1.js', '', array ());
  $response->addJavascript('/PubsPlugin/js/facebox.js', '', array ());
  $response->addJavascript('/PubsPlugin/js/ui.core.js', '', array ());
  $response->addJavascript('/PubsPlugin/js/ui.draggable.js', '', array ());
  $response->addJavascript('/sfGuardPlugin/js/livevalidation_standalone.compressed.js', '', array ());
}
else
{
  if (null !== $layout = sfConfig::get('symfony.view.'.$this->moduleName.'_'.$this->actionName.'_layout'))
  {
    $this->setDecoratorTemplate(false === $layout ? false : $layout.$this->getExtension());
  }
  else if (null === $this->getDecoratorTemplate() && !$this->context->getRequest()->isXmlHttpRequest())
  {
    $this->setDecoratorTemplate('' == 'layout' ? false : 'layout'.$this->getExtension());
  }
  $response->addHttpMeta('content-type', 'text/html', false);

  $response->addStylesheet('/PubsPlugin/css/main.css', '', array ());
  $response->addStylesheet('/PubsPlugin/css/facebox.css', '', array ());
  $response->addJavascript('/sfGuardPlugin/js/jquery-1.6.1.js', '', array ());
  $response->addJavascript('/PubsPlugin/js/facebox.js', '', array ());
  $response->addJavascript('/PubsPlugin/js/ui.core.js', '', array ());
  $response->addJavascript('/PubsPlugin/js/ui.draggable.js', '', array ());
}

