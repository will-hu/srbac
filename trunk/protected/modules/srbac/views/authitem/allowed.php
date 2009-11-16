<?php
/**
 * allowed.php
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @link http://code.google.com/p/srbac/
 */

/**
 * The view for the editing of the alwaysAllowed list
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @package srbac.views.authitem
 * @since 1.1.0
 */
?>
<?

//CVarDumper::dump($controllers, 3, true);
foreach ($controllers as $n=>$controller) {
  $title = $controller["title"];
  $data = array();
  foreach ($controller["actions"] as $key=>$val) {
    $data[$val] = $val;
  }

  $select = $controller["allowed"];
  $cont[$n]["title"] = $title;
  $cont[$n]["content"] = CHtml::checkBoxList($title, $select, $data);
}

$tabs = $cont;
?>
<?php echo CHtml::form();?>
<div class="vertTab">
  <?
  $this->widget('system.web.widgets.CTabView',
      array('tabs'=>$tabs,
      'cssFile'=>$this->module->css,
  ));
  ?>
</div>
<div class="action">
  <?php echo CHtml::ajaxSubmitButton(Helper::translate("srbac", "Save"),
  array('saveAllowed'),
  array(
  'type'=>'POST',
  'update'=>'#wizard',
  'beforeSend' => 'function(){
    $("#wizard").addClass("srbacLoading");
    }',
  'complete' => 'function(){
    $("#wizard").removeClass("srbacLoading");
    }',
  ),
  array(
  'name'=>'buttonSave',
  )
  )
  ?>
</div>
<?php echo CHtml::endForm();?>
<!--Adjust tabview height--->
<script type="text/javascript">
  $(".view").height($(".tabs").height()-16);
</script>