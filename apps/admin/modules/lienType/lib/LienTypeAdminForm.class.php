<?php

/**
 * lienType module configuration.
 *
 * @package    blancerf2
 * @subpackage lienType
 * @author     thibault d
 * @version    SVN: $Id: form.php 12474 2008-10-31 10:41:27Z fabien $
 */
class LienTypeAdminForm extends BaseLienTypeForm
{
  public function configure()
  {
    parent::configure();
    
    $this->unsetAutoFields();
  }
}