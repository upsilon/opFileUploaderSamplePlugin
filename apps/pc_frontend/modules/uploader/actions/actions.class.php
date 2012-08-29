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
 * uploader actions.
 *
 * @package    opFileUploaderSamplePlugin
 * @subpackage actions
 * @author     Kimura Youichi <kim.upsilon@bucyou.net>
 */
class uploaderActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $pager = new sfDoctrinePager('MemberFile', 20);
    $pager->setPage($request->getParameter('page'));
    $pager->init();

    $this->pager = $pager;
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MemberFileForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $object = new MemberFile();
    $object->member_id = $this->getUser()->getMemberId();

    $this->form = new MemberFileForm($object);
    if ($this->form->bindAndSave($request->getParameter('member_file'), $request->getFiles('member_file')))
    {
      $this->redirect(array('sf_route' => 'uploader_list'));
    }

    $this->setTemplate('new');
  }

  public function executeShow(sfWebRequest $request)
  {
    $memberFile = $this->getRoute()->getObject();
    $file = $memberFile->File;

    $this->getResponse()->setHttpHeader('Content-Type', $file->type);
    $this->getResponse()->setHttpHeader('Content-Disposition', 'inline; filename="'.$file->original_filename.'"');

    return $this->renderText($file->FileBin->bin);
  }
}
