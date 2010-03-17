<?php
/** @var dmFrontLayoutHelper */
$helper = $sf_context->get('layout_helper');

echo 
$helper->renderDoctype(),
$helper->renderHtmlTag(),

  "\n<head>\n",
    $helper->renderHead(),
    sprintf(
      '<style type="text/css">body {background: #000 url(/theme/images/bg%d.png) top left no-repeat;}</style>',
      $helper->getOption('background_number', 1)
    ),
  "\n</head>\n",
  
  $helper->renderBodyTag(),
  
    $sf_content,
    
    $helper->renderEditBars(),
    
    $helper->renderJavascriptConfig(),
    $helper->renderJavascripts(),
    $helper->renderGoogleAnalytics(),
  
  "\n</body>\n",

"\n</html>";