<?php

/*
 * Main : actions
 */
class mainActions extends dmFrontModuleActions
{

  public function executeRootPage()
  {
    $this->getUser()->setContext($this->getPage());
  }

  public function executeScreenSize(dmWebRequest $request)
  {
    $this->getUser()->setScreenWidth($request->getParameter('width'))->setScreenHeight($request->getParameter('height'));
    return $this->renderText('ok');
  }

}