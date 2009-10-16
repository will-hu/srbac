<div class="simple">
  <?php if(!$id) { ?>
    <?php echo CHtml::beginForm(); ?>
    <?php echo CHtml::activeDropDownList($this->module->getUserModel(),$this->module->userid,
    Chtml::listData($this->module->getUserModel()->findAll(), $this->module->userid, $this->module->username),
    array('size'=>1,'class'=>'dropdown','ajax' => array(
    'type'=>'POST',
    'url'=>array('showAssignments'),
    'update'=>'#assignments',
    'beforeSend' => 'function(){
                      $("#assignments").addClass("srbacLoading");
                  }',
    'complete' => 'function(){
                      $("#assignments").removeClass("srbacLoading");
                  }'
    ),
    'prompt'=>'select user'
    )); ?>
    <?php echo CHTml::endForm(); ?>
  <?php } else { ?>
  <?php Yii::app()->clientScript->registerCssFile(Yii::app()->getModule('srbac')->css); ?>
    <?php   Yii::app()->clientScript->registerScript(
        "alert",
        "$.ajax({
            type: 'POST',
            url: 'index.php?r=srbac/authitem/showAssignments&id=$id',
            success: function(html){
               $('#assignments').html(html);
        }
          });
        ",
        CClientScript::POS_READY
    ); ?>
  <?php } ?>
</div>
<div id="assignments">

</div>
