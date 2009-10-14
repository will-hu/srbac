<?php if($deleted) :?>
<script language="javascript">
  <?php echo CHtml::ajax(array(
  'type'=>'POST',
  'url'=>array('authitem/manage'),
  'update'=>'#list',
  )); ?>
</script>
<?php else : ?>
<h2><?php echo $model->name; ?></h2>

<table class="dataGrid">
  <tr>
    <th class="label"><?php echo CHtml::encode($model->getAttributeLabel('type')); ?></th>
    <td><?php echo CHtml::encode(AuthItem::$TYPES[$model->type]); ?></td>
  </tr>
  <tr>
    <th class="label"><?php echo CHtml::encode($model->getAttributeLabel('description')); ?></th>
    <td><?php echo CHtml::encode($model->description); ?></td>
  </tr>
  <tr>
    <th class="label"><?php echo CHtml::encode($model->getAttributeLabel('bizrule')); ?></th>
    <td><?php echo CHtml::encode($model->bizrule); ?></td>
  </tr>
  <tr>
    <th class="label"><?php echo CHtml::encode($model->getAttributeLabel('data')); ?></th>
    <td><?php echo CHtml::encode($model->data); ?></td>
  </tr>
</table>
<div class="simple">
    <?php if($delete) :?>
    <?php echo $this->module->tr->translate('srbac','Really delete')?> <?php echo $model->name; ?> ?
      <?php echo CHtml::ajaxButton($this->module->tr->translate('srbac','Yes'),
      array('authitem/delete','id'=>$model->name),
      array(
      'type'=>'POST',
      'update'=>'#preview'
      ), array('id'=>'deleteButton')) ?>
    <?php endif ?>
</div>
<?php endif ?>