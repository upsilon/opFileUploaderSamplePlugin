<?php slot('pager'); ?>
<?php op_include_pager_navigation($pager, '@uploader_list?page=%d'); ?>
<?php end_slot() ?>

<div class="dparts recentList"><div class="parts">
<div class="partsHeading">
<h3>ファイル一覧</h3>
</div>
<?php echo link_to('アップロード', array('sf_route' => 'uploader_new')) ?>
<?php include_slot('pager') ?>
<dl>
<?php foreach ($pager->getResults() as $item): ?>
<dt><?php echo op_format_date($item->getUpdatedAt(), 'f') ?></dt>
<dd>
  <?php echo link_to($item->File->original_filename, array('sf_route' => 'uploader_show', 'sf_subject' => $item)) ?>
</dd>
<?php endforeach ?>
</dl>
<?php include_slot('pager') ?>
</div>
</div>
