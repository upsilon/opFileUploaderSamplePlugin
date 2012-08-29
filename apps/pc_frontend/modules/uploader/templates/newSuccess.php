<?php
op_include_form('upload_form', $form, array(
  'title' => 'アップロード',
  'url' => url_for(array('sf_route' => 'uploader_create')),
  'isMultipart' => true,
));
