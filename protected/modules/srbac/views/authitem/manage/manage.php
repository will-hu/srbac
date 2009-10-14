<?php if(!$full){ ?>
<div id="wizardButton" style="text-align:left">
  <?php echo CHtml::ajaxLink(
  CHtml::image($images['admin'],
  $this->module->tr->translate('srbac','Manage AuthItem'),
  array('border'=>0,'title'=>$this->module->tr->translate('srbac','Manage AuthItem')))  ,
  array('manage','full'=>true),
  array(
  'type'=>'POST',
  'update'=>'#wizard',
  'beforeSend' => 'function(){
                      $("#wizard").addClass("srbacLoading");
                  }',
  'complete' => 'function(){
                      $("#wizard").removeClass("srbacLoading");
                  }',
  ),array('name'=>'buttonManage'))
  ?>
  <?php echo CHtml::ajaxLink(
  CHtml::image($images['wizard'],
  $this->module->tr->translate('srbac','Autocreate Auth Items'),
  array('border'=>0,'title'=>$this->module->tr->translate('srbac','Autocreate Auth Items')))  ,
  array('auto'),
  array(
  'type'=>'POST',
  'update'=>'#wizard',
  'beforeSend' => 'function(){
                      $("#wizard").addClass("srbacLoading");
                  }',
  'complete' => 'function(){
                      $("#wizard").removeClass("srbacLoading");
                  }',
  ),array('name'=>'buttonAuto'))
  ?>
</div>
<?php } ?>
<div id="wizard">
  <br />
  <table class="dataGrid" width="100%">
    <tr>
      <th width="50%"><?php echo $this->module->tr->translate('srbac','Auth items')?></th>
      <th width="50%"><?php echo $this->module->tr->translate('srbac','Actions')?></th>
    </tr>
    <tr>
      <td valign="top" align="center">
        <div id="list" class="list">
          <?php echo $this->renderPartial('manage/list', array(
          'models'=>$models,
          'pages'=>$pages,
          'sort'=>$sort,
          'images'=>$images
          )); ?>
        </div>
      </td>
      <td valign="top">
        <div id="preview">

        </div>

      </td>
    </tr>
  </table>
</div>