<table>
  <tr>
    <th><?php echo $this->module->tr->translate('srbac','Assigned Roles') ?></th>
    <th>&nbsp;</th>
    <th><?php echo $this->module->tr->translate('srbac','Not Assigned Roles') ?></th>
  </tr>
  <tr><td>
      <?php echo CHtml::activeDropDownList($model,'name[revoke]',
      Chtml::listData(
      $data['userAssignedRoles'], 'name', 'name'),
      array('size'=>$this->module->listBoxNumberOfLines,'multiple'=>'multiple','class'=>'dropdown')) ?>
    </td>
    <td>
      <?php
      $ajax =
          array(
          'type'=>'POST',
          'update'=>'#roles',
          'beforeSend' => 'function(){
                      $("#loadMess").addClass("srbacLoading");
                  }',
          'complete' => 'function(){
                      $("#loadMess").removeClass("srbacLoading");
                  }',);
      echo  CHtml::ajaxSubmitButton('<<',array('assign','assignRoles'=>1),$ajax,$data['assign']); ?>
      <?php
      $ajax =
          array(
          'type'=>'POST',
          'update'=>'#roles',
          'beforeSend' => 'function(){
                      $("#loadMess").addClass("srbacLoading");
                  }',
          'complete' => 'function(){
                      $("#loadMess").removeClass("srbacLoading");
                  }',);
      echo  CHtml::ajaxSubmitButton('>>',array('assign','revokeRoles'=>1),$ajax,$data['revoke']); ?>
    </td>
    <td>
      <?php echo CHtml::activeDropDownList($model,'name[assign]',
      Chtml::listData(
      $data['userNotAssignedRoles'], 'name', 'name'),
      array('size'=>$this->module->listBoxNumberOfLines,'multiple'=>'multiple','class'=>'dropdown')); ?>
    </td></tr>
</table>
<div class="message" id="loadMess">
  <?php echo "&nbsp;".$message ?>
</div>
