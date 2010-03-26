<?php

require_once dirname(__FILE__).'/../lib/imageGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/imageGeneratorHelper.class.php';

/**
 * image actions.
 *
 * @package    lantenora
 * @subpackage image
 * @author     thibault d
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class imageActions extends autoImageActions
{
  public function executeResort()
  {
    $images = dmDb::query('Image i')
    ->orderBy('i.created_at DESC')
    ->fetchRecords();

    foreach($images as $index => $image)
    {
      $image->set('position', $index);
    }

    $images->save();

    return $this->redirect('@image');
  }
}