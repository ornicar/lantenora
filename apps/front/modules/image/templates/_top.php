<?php
/*
 * Action for Image : Show top
 * Vars : $image
 */

echo £link($image)
->text(£media($image->Media)->width(860)->overlay(£media('overlay/logo.png'), 'bottom-right'))
->title($image->nom)
;