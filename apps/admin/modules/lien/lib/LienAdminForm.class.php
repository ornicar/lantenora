<?php

/**
 * lien module configuration.
 *
 * @package    blancerf2
 * @subpackage lien
 * @author     thibault d
 * @version    SVN: $Id: form.php 12474 2008-10-31 10:41:27Z fabien $
 */
class LienAdminForm extends BaseLienForm
{
  public function configure()
  {
    parent::configure();
    
    $this->unsetAutoFields();
  }
}