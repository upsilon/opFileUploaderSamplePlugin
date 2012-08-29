<?php

/**
 * opFileUploaderSamplePlugin
 *
 * This source file is subject to the Apache License version 2.0
 * that is bundled with this package in the file LICENSE.
 *
 * @copyright 2012 Kimura Youichi <kim.upsilon@bucyou.net>
 * @license Apache License 2.0
 */

/**
 * PluginMemberFile form.
 *
 * @package    opFileUploaderSamplePlugin
 * @subpackage form
 * @author     Kimura Youichi <kim.upsilon@bucyou.net>
 */
abstract class PluginMemberFileForm extends BaseMemberFileForm
{
  protected function setupInheritance()
  {
    $this->setWidget('file', new sfWidgetFormInputFile());
    $this->setValidator('file', new sfValidatorFile(array('required' => true)));

    $this->setValidator('description', new opValidatorString(array('required' => false, 'trim' => true)));

    $this->useFields(array('file', 'description'));
  }

  protected function doUpdateObject($values)
  {
    parent::doUpdateObject($values);

    $file = new File();
    $file->setFromValidatedFile($values['file']);
    $file->setName('uploader_'.$this->getObject()->getId().'_'.$file->getName());

    $this->getObject()->File = $file;
  }
}
