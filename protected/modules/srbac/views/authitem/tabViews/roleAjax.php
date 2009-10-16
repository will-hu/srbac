<table>
  <tr>
    <th><?php echo $this->module->tr->translate('srbac','Assigned Tasks')?></th>
    <th>&nbsp;</th>
    <th><?php echo $this->module->tr->translate('srbac','Not Assigned Tasks')?></th>
  </tr>
  <tr><td>
      <?php echo CHtml::activeDropDownList($model,'name[revoke]',
      Chtml::listData(
      $data["roleAssignedTasks"], 'name', 'name'),
      array('size'=>$this->module->listBoxNumberOfLines,'multiple'=>'multiple','class'=>'dropdown')) ?>
    </td>
    <td>
      <?php
      $ajax =
          array(
          'type'=>'POST',
          'update'=>'#tasks',
        'beforeSend' => 'function(){
                      $("#loadMessRole").addClass("srbacLoading");
                  }',
        'complete' => 'function(){
                      $("#loadMessRole").removeClass("srbacLoading");
                  }',);
      echo  CHtml::ajaxSubmitButton('<<',array('assign','assignTasks'=>1),$ajax,$data['assign']); ?>
      <?php
      $ajax =
          array(
          'type'=>'POST',
          'update'=>'#tasks',
        'beforeSend' => 'function(){
                      $("#loadMessRole").addClass("srbacLoading");
                  }',
        'complete' => 'function(){
                      $("#loadMessRole").removeClass("srbacLoading");
                  }',);
      echo  CHtml::ajaxSubmitButton('>>',array('assign','revokeTasks'=>1),$ajax,$data['revoke']); ?>
    </td>
    <td>
      <?php echo CHtml::activeDropDownList($model,'name[assign]',
      Chtml::listData(
      $data["roleNotAssignedTasks"], 'name', 'name'),
      array('size'=>$this->module->listBoxNumberOfLines,'multiple'=>'multiple','class'=>'dropdown')); ?>
    </td></tr>
</table>
<div id="loadMessRole" class="message">
  <?php echo "&nbsp;".$message ?>
</div>
