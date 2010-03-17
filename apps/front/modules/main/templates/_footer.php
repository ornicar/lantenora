<?php

echo £('div.footer_parts.clearfix',

  £('div.footer_part.licence', dmConfig::get('licence')).

  £('div.footer_part.liens',
    £link('http://diem-project.org')->text('powered by Diem, an Open Source PHP5 CMF / CMS for Symfony & jQuery')
  )

);