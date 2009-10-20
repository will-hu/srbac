<?php


$script = "jQuery('#cb_createTasks').click(function(){
$('#userTask').toggle('fast');
$('#adminTask').toggle('fast');
});";

Yii::app()->clientScript->registerScript("cb",$script,CClientScript::POS_READY);
?>
<div class="srbacForm">
  <?php echo CHtml::form() ?>
  <div class="action">
  <?php echo "<b>".$controller."</b>" ?>
  </div>
  <?php if (count($actions)>0) { ?>
  <div>
    <?php echo Chtml::checkBoxList("actions", "", $actions,
    array("checkAll"=>$this->module->tr->translate('srbac','Check All'))); ?>
  </div>
  <?php } ?>
  <div class="simple">
    <hr>
    <?php $cb_title = $delete ? "Delete Tasks" : "Create tasks"; ?>
    <?php $button_title = $delete ? "Delete" : "Create"; ?>
    <?php $button_action = $delete ? "autoDeleteItems" : "autoCreateItems"; ?>
    <?php if(!$taskViewingExists || !$taskAdministratingExists || $delete){ ?>
    <?php echo $this->module->tr->translate('srbac',$cb_title) ?>
    <?php echo CHtml::checkBox("createTasks", true, array("id"=>"cb_createTasks")); ?>
    <?php } ?>
  </div>
  <?php if(($taskViewingExists && $delete) || (!$taskViewingExists && !$delete)){ ?>
  <div class="simple">
    <?php echo CHtml::textField("tasks[user]", $task."Viewing",array("id"=>"userTask","readonly"=>true)); ?>
  </div>
  <?php } ?>
  <?php if(($taskAdministratingExists && $delete)|| (!$taskAdministratingExists && !$delete)) {?>
  <div class="simple">
    <?php echo CHtml::textField("tasks[admin]", $task."Administrating",array("id"=>"adminTask","readonly"=>true)); ?>
  </div>
  <?php } ?>
  <div class="simple">
    <?php echo CHtml::hiddenField("controller", $controller) ?>
  </div>
  <div class="action">
    <?php echo CHtml::ajaxButton($this->module->tr->translate('srbac',$button_title),
    array($button_action),
    array(
    'type'=>'POST',
    'update'=>'#controllerActions',
    'beforeSend' => 'function(){
                      $("#controllerActions").addClass("srbacLoading");
                  }',
    'complete' => 'function(){
                      $("#controllerActions").removeClass("srbacLoading");
                  }',
    )); ?>
  </div>
  <?php echo Chtml::endForm()?>
</div>
