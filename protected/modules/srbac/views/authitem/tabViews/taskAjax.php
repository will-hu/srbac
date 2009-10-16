<table>
  <tr>
    <th><?php echo $this->module->tr->translate('srbac','Assigned Operations') ?></th>
    <th>&nbsp;</th>
    <th><?php echo $this->module->tr->translate('srbac','Not Assigned Operations')?></th>
  </tr>
  <tr><td>
      <?php echo CHtml::activeDropDownList($model,'name[revoke]',
      Chtml::listData(
      $data['taskAssignedOpers'], 'name', 'name'),
      array('size'=>$this->module->listBoxNumberOfLines,'multiple'=>'multiple','class'=>'dropdown')) ?>
    </td>
    <td>
      <?php
      $ajax =
          array(
          'type'=>'POST',
          'update'=>'#operations',
          'beforeSend' => 'function(){
                      $("#loadMessTask").addClass("srbacLoading");
                  }',
          'complete' => 'function(){
                      $("#loadMessTask").removeClass("srbacLoading");
                  }',);
      echo  CHtml::ajaxSubmitButton('<<',array('authitem/assign','assignOpers'=>1),$ajax,$data['assign']); ?>
      <?php
      $ajax =
          array(
          'type'=>'POST',
          'update'=>'#operations',
          'beforeSend' => 'function(){
                      $("#loadMessTask").addClass("srbacLoading");
                  }',
          'complete' => 'function(){
                      $("#loadMessTask").removeClass("srbacLoading");
                  }',);
      echo  CHtml::ajaxSubmitButton('>>',array('authitem/assign','revokeOpers'=>1),$ajax,$data['revoke']); ?>
    </td>
    <td>
      <?php echo CHtml::activeDropDownList($model,'name[assign]',
      Chtml::listData(
      $data['taskNotAssignedOpers'], 'name', 'name'),
      array('size'=>$this->module->listBoxNumberOfLines,'multiple'=>'multiple','class'=>'dropdown')); ?>
    </td></tr>
</table>
<div id="loadMessTask" class="message">
  <?php echo "&nbsp;".$message ?>
</div>