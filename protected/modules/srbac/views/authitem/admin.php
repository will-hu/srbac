<h2><?php echo $this->module->tr->translate('srbac','Managing AuthItem')?></h2>

<div class="actionBar">
[<?php echo CHtml::link($this->module->tr->translate('srbac','AuthItem List'),array('list')); ?>]
[<?php echo CHtml::link($this->module->tr->translate('srbac','New AuthItem'),array('create')); ?>]
</div>

<table class="dataGrid">
  <tr>
    <th><?php echo $sort->link('name'); ?></th>
    <th><?php echo $sort->link('type'); ?></th>
	<th><?php echo $this->module->tr->translate('srbac','Actions') ?></th>
  </tr>
<?php foreach($models as $n=>$model): ?>
  <tr class="<?php echo $n%2?'even':'odd';?>">
    <td><?php echo CHtml::link($model->name,array('show','id'=>$model->name)); ?></td>
    <td><?php echo CHtml::encode(AuthItem::$TYPES[$model->type]); ?></td>
    <td>
      <?php echo CHtml::link($this->module->tr->translate('srbac','Update'),array('update','id'=>$model->name)); ?>
      <?php if ($model->name !=  Yii::app()->getModule('srbac')->superUser) { ?>
      <?php echo CHtml::linkButton($this->module->tr->translate('srbac','Delete'),array(
          'submit'=>'',
      	  'params'=>array('command'=>'delete','id'=>$model->name),
      	  'confirm'=>"Are you sure to delete #{$model->name}?")); ?>
      <?php } ?>
	</td>
  </tr>
<?php endforeach; ?>
</table>
<br/>
<?php $this->widget('CLinkPager',array('pages'=>$pages)); ?>