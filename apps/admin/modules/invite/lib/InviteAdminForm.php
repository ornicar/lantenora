<?php

/**
 * invite admin form
 *
 * @package    blancerf2
 * @subpackage invite
 * @author     thibault d
 */
class InviteAdminForm extends BaseInviteForm
{
  public function configure()
  {
    parent::configure();
    
    // Unset automatic fields like 'created_at', 'updated_at', 'created_by', 'updated_by'
    $this->unsetAutoFields();
  }
}