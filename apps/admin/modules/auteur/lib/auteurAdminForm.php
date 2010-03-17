<?php

require_once(dmOs::join(dm::getDir(), 'dmUserPlugin/modules/dmUser/lib/base/BaseDmUserAdminForm.php'));

class auteurAdminForm extends BaseDmUserAdminForm
{
  public function configure()
  {
    parent::configure();
    
    $this->useFields(array('username', 'nom', 'email', 'password', 'password_again', 'media_id_form', 'description'));
  }
}