<?php

echo _open('div#dm_page'.($sf_user->getIsEditMode() ? '.edit' : ''));

echo $helper->renderAccessLinks();

  echo _tag('div.dm_layout',
  
    _tag('div.dm_layout_inner',
      _tag('div.dm_layout_inner_inner.clearfix',

        $helper->renderArea('left').
    
        _tag('div.dm_layout_center',
          $helper->renderArea('top', '.clearfix').
          $helper->renderArea('content', '.clearfix')
        )
      )
    ).

    $helper->renderArea('bottom', '.clearfix')

  );

echo _close('div');