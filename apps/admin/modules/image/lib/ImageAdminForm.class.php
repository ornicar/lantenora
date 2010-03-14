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
    
    unset($this['tags_list']);

    $this->widgetSchema['tags_text'] = new sfWidgetFormTextarea();

    $this->validatorSchema['tags_text'] = new sfValidatorString(array('required' => false));
    
    $this->setDefault('tags_text', $this->object->getTagsText());
    
    if ($this->object->isNew())
    {
      $this->setDefault('user_id', dm::getUser()->getUserId());
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