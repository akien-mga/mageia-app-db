<?php
class showAction extends sfActions
{
  public function execute($request)
  {
    $this->forward404Unless($request->hasParameter('id'), 'Package id is required');
    $id = $request->getParameter('id');
    $this->package = PackagePeer::retrieveByPk($id);
  }

}