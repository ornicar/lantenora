<?php

/**
 * rubrique module configuration.
 *
 * @package    lantenora
 * @subpackage rubrique
 * @author     thibault d
 * @version    SVN: $Id: form.php 12474 2008-10-31 10:41:27Z fabien $
 */
class RubriqueAdminForm extends BaseRubriqueForm
{
  protected
  $backgrounds;
  
  public function configure()
  {
    parent::configure();

    $this->widgetSchema['background_number'] = new sfWidgetFormSelectRadioBackground(array(
      'choices' => $this->getBackgroundOptions()
    ));
    $this->validatorSchema['background_number'] = new sfValidatorChoice(array(
      'choices' => $this->getBackgroundNumbers()
    ));

    // Unset automatic fields like 'created_at', 'updated_at', 'created_by', 'updated_by'
    $this->unsetAutoFields();
  }

  protected function getBackgroundOptions()
  {
    $options = array();

    foreach($this->getBackgroundNumbers() as $number)
    {
      $options[$number] = $this->getService('helper')
      ->media('/theme/images/background/'.$number.'.jpg')
      ->size(300, 200)
      ->getSrc();
    }

    return $options;
  }

  protected function getBackgroundNumbers()
  {
    if(empty($this->backgrounds))
    {
      $this->backgrounds = array();
      
      $files = sfFinder::type('file')->name('/^\d+\.jpg$/')->in(sfConfig::get('sf_web_dir').'/theme/images/background');
      
      foreach($files as $file)
      {
        $this->backgrounds[] = preg_replace('/^(\d+)\.jpg$/', '$1', basename($file));
      }

      natsort($this->backgrounds);
    }

    return $this->backgrounds;
  }
}