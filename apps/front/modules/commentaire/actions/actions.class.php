<?php

/*
 * Commentaire : actions
 */
class commentaireActions extends dmFrontModuleActions
{
  
  public function executeFormWidget(dmWebRequest $request)
  {
    $this->forms['commentaire'] = new CommentaireForm();
    
    if ($request->isMethod('post') && $this->forms['commentaire']->bindAndValid($request))
    {
      $this->forms['commentaire']->save();
      $this->redirectBack();
    }
    
    $this->forms['commentaire']->setDefault('image_id', $this->getPage()->recordId);
  }
  
}