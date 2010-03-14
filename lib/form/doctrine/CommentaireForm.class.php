<?php

/**
 * Commentaire form.
 *
 * @package    blancerf2
 * @subpackage form
 * @author     thibault d
 * @version    SVN: $Id$
 */
class CommentaireForm extends BaseCommentaireForm
{
  public function configure()
  {
    $this->useFields(array('auteur', 'texte', 'image_id'));
    $this->changeToHidden('image_id');
  }
}
