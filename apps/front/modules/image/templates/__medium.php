<?php

echo
  £link($image)->text(
    £media($image->Media)
    ->size(160, 160)
    ->method('center').
    £('div.caption', $image->nom)
  );