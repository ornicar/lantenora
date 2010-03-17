<?php

/*
 * This file is part of the symfony package.
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * sfWidgetFormSelectRadio represents radio HTML tags.
 *
 * @package    symfony
 * @subpackage widget
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfWidgetFormSelectRadio.class.php 27738 2010-02-08 15:07:33Z Kris.Wallsmith $
 */
class sfWidgetFormSelectRadioBackground extends sfWidgetFormSelectRadio
{
  
  protected function formatChoices($name, $value, $choices, $attributes)
  {
    $inputs = array();
    foreach ($choices as $key => $option)
    {
      $baseAttributes = array(
        'name'  => substr($name, 0, -2),
        'type'  => 'radio',
        'value' => self::escapeOnce($key),
        'id'    => $id = $this->generateId($name, self::escapeOnce($key)),
        'style' => 'margin-right:-20px;margin-top:5px;'
      );

      if (strval($key) == strval($value === false ? 0 : $value))
      {
        $baseAttributes['checked'] = 'checked';
      }

      $inputs[$id] = array(
        'input' => $this->renderTag('input', array_merge($baseAttributes, $attributes)),
        'label' => $this->renderContentTag('label', $key, array(
          'for' => $id,
          'style' => 'cursor: pointer; background: url('.$option.') top left no-repeat; width: 300px; height: 200px; display: block; float: right;'
        )),
      );
    }

    return call_user_func($this->getOption('formatter'), $this, $inputs);
  }

  public function formatter($widget, $inputs)
  {
    $rows = array();
    foreach ($inputs as $input)
    {
      $rows[] = $this->renderContentTag('li', $input['input'].$this->getOption('label_separator').$input['label'], array(
        'class' => 'mt10 fleft',
        'style' => 'position: relative;'
      ));
    }

    return !$rows ? '' : $this->renderContentTag('ul', implode($this->getOption('separator'), $rows), array(
      'class' => 'clearfix',
      'style' => 'margin-left: 10em'
    ));
  }
}
