<?php

/**
 * tag module configuration.
 *
 * @package    lantenora
 * @subpackage tag
 * @author     thibault d
 * @version    SVN: $Id: form.php 12474 2008-10-31 10:41:27Z fabien $
 */
class TagAdminForm extends BaseTagForm
{
  public function configure()
  {
    parent::configure();

    // Unset automatic fields like 'created_at', 'updated_at', 'created_by', 'updated_by'
    $this->unsetAutoFields();
    $this->unsetAutoFields('strip');
  }
}