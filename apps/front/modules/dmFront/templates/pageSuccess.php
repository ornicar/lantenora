<?php

echo _open('div#dm_page'.($sf_user->getIsEditMode() ? '.edit' : ''));

echo $helper->renderAccessLinks();

  echo _tag('div.dm_layout',
  
    _tag('div.dm_layout_inner',
      _tag('div.dm_layout_inner_inner.clearfix',

        $helper->renderArea('layout.left').
    
        _tag('div.dm_layout_center',
          $helper->renderArea('layout.top', '.clearfix').
          $helper->renderArea('page.content', '.clearfix')
        )
      )
    ).

    $helper->renderArea('layout.bottom', '.clearfix')

  );

echo _close('div');