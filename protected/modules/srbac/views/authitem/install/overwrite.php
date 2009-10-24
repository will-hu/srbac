<h3><?php echo Helper::translate('srbac','Install Srbac')?></h3>
<div class="srbac">
  <?php echo CHtml::beginForm(); ?>
  <div>
    <?php echo Helper::translate('srbac','Srbac is already Installed.<br />Overwrite it?<br />'); ?>
  </div>
  <div>
    <?php echo CHtml::hiddenField("action", "Overwrite"); ?>
    <?php echo CHtml::hiddenField("demo", $demo); ?>
    <?php echo CHtml::submitButton(Helper::translate('srbac','Overwrite')); ?>
  </div>
  <?php echo CHtml::endForm(); ?>
</div>
