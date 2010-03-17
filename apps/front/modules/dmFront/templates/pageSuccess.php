<?php

echo £o('div#dm_page'.($sf_user->getIsEditMode() ? '.edit' : ''));

echo $helper->renderAccessLinks();

  echo £('div.dm_layout',
  
    £('div.dm_layout_inner',
      £('div.dm_layout_inner_inner.clearfix',

        $helper->renderArea('left').
    
        £('div.dm_layout_center',
          $helper->renderArea('top', '.clearfix').
          $helper->renderArea('content', '.clearfix')
        )
      )
    ).

    $helper->renderArea('bottom', '.clearfix')

  );

echo £c('div');