<?php


class DmCommentTable extends PluginDmCommentTable
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('DmComment');
    }
}