<?php
/**
 * assignments.php
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @link http://code.google.com/p/srbac/
 */

/**
 * The view of the users assignments
 * If no user id is passed a drop down with all users is shown
 * Else the user's assignments are shown.
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @package srbac.views.authitem
 * @since 1.0.1
 */
?>


<?php if(!$id) {
  if($this->module->getShowHeader()) {
    $this->renderPartial($this->module->header);  }
  ?>
<div class="simple">
    <?php
    $this->renderPartial("frontpage");
    ?>
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
</div>
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
<div id="assignments">

</div>
<?php if(!$id) {?>
<?php if($this->module->getShowFooter()) {
  $this->renderPartial($this->module->footer);
}?>
<?php }?>