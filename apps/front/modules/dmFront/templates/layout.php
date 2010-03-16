<?php
/** @var dmFrontLayoutHelper */
$helper = $sf_context->get('layout_helper');

if($theme = $sf_user->getAttribute('theme'))
{
  $bodyAttributes = 'style="background: #000 url(/theme/images/bg'.$theme.'.png) top left no-repeat;"';
}
else
{
  $bodyAttributes = null;
}

echo 
$helper->renderDoctype(),
$helper->renderHtmlTag(),

  "\n<head>\n",
    $helper->renderHead(),
  "\n</head>\n",
  
  $helper->renderBodyTag($bodyAttributes),
  
    $sf_content,
    
    $helper->renderEditBars(),
    
    $helper->renderJavascriptConfig(),
    $helper->renderJavascripts(),
    $helper->renderGoogleAnalytics(),
  
  "\n</body>\n",

"\n</html>";