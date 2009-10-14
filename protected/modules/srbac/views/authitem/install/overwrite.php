<h3><?php echo $this->module->tr->translate('srbac','Install Srbac')?></h3>
<div class="srbac">
  <?php echo CHtml::beginForm(); ?>
  <div>
    <?php echo $this->module->tr->translate('srbac','Srbac is already Installed.<br />Overwrite it?<br />'); ?>
  </div>
  <div>
    <?php echo CHtml::hiddenField("action", "Overwrite"); ?>
    <?php echo CHtml::hiddenField("demo", $demo); ?>
    <?php echo CHtml::submitButton($this->module->tr->translate('srbac','Overwrite')); ?>
  </div>
  <?php echo CHtml::endForm(); ?>
</div>
