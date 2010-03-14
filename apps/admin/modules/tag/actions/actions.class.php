<?php

require_once dirname(__FILE__).'/../lib/tagGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/tagGeneratorHelper.class.php';

/**
 * tag actions.
 *
 * @package    lantenora
 * @subpackage tag
 * @author     thibault d
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class tagActions extends autoTagActions
{
  
  public function executeResave()
  {
    foreach(dmDb::query('Tag t')->fetchRecords() as $tag)
    {
      $tag->save();
    }
  }
  
  public function executeJson()
  {
    $tags = dmDb::query('Tag t')->select('t.nom')->fetchPDO();
    foreach($tags as $index=>$tag)
    {
      $tags[$index] = $tag[0];
    }
    
    return $this->renderJson($tags);
  }
  
}
