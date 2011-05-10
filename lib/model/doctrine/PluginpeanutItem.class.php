<?php

/**
 * peanutItem
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    peanutCorporatePlugin
 * @subpackage model
 * @author     Alexandre "pocky" Balmes <albalmes@gmail.com> <albalmes@gmail.com>
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
abstract class PluginpeanutItem extends BasepeanutItem
{
  
  public function changeStatus()
  {

    if('draft' == $this->getStatus())
    {
      $this->setStatus('publish');
    }
    elseif('publish' == $this->getStatus())
    {
      $this->setStatus('draft');
    }
    
    $this->save();
  }
}
