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
 * PluginMemberFileTable
 *
 * @package    opFileUploaderSamplePlugin
 * @subpackage model
 * @author     Kimura Youichi <kim.upsilon@bucyou.net>
 */
class PluginMemberFileTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object MemberFileTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('MemberFile');
  }
}
