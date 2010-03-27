<?php

/**
 * image module configuration.
 *
 * @package    lantenora
 * @subpackage image
 * @author     thibault d
 * @version    SVN: $Id: form.php 12474 2008-10-31 10:41:27Z fabien $
 */
class ImageAdminForm extends BaseImageForm
{
  public function configure()
  {
    parent::configure();
    
    if ($this->object->isNew())
    {
      $this->setDefault('user_id', $this->getService('user')->getUserId());
    }
    
    $this->unsetAutoFields();
  }
  
  /*
   * Create Media form for media_id
   */
  protected function createMediaFormForMediaId()
  {
    $form = parent::createMediaFormForMediaId();
    
    unset($form['author'], $form['license'], $form['legend']);
    
    return $form;
  }
}