<?php $error = false; $disabled = array(); ?>
<h3><?php echo Helper::translate('srbac','Install Srbac')?></h3>
<div class="srbac">
  <?php echo CHtml::beginForm(); ?>
  <div>
    <?php $this->renderPartial(Yii::app()->findLocalizedFile('install/installText'))?>
  </div>
  <div>
    <?php echo Helper::translate('srbac','Your Database, AuthManager and srbac settings:'); ?>
    <table class="srbacDataGrid" width="'100%">
      <?php if(Yii::app()->authManager instanceof CDbAuthManager){ ?>
      <?php try { ?>
      <tr>
        <th colspan="2"><?php echo Helper::translate('srbac','Database');?></th>
      <tr>
        <td><?php echo Helper::translate('srbac','Driver');?></td>
        <td><?php echo Yii::app()->getDb()->getDriverName()?></td>
      </tr>
      <tr>
        <td><?php echo Helper::translate('srbac','Connection');?></td>
        <td><?php echo Yii::app()->getDb()->connectionString?></td>
      </tr>
      <?php  } catch(CException $e) { ?>
      <tr><td colspan="2">
          <div class="error">
              <?php echo Helper::translate('srbac','Database is not Configured');?>
          </div>
        </td></tr>
        <?php $error =true; ?>
      <?php  }?>
      

      <?php try { ?>
      <tr>
        <th colspan="2"><?php echo Helper::translate('srbac','AuthManager');?></th>
      <tr>
        <td><?php echo Helper::translate('srbac','Item Table');?></td>
        <td><?php echo Yii::app()->authManager->itemTable?></td>
      </tr>
      <tr>
        <td><?php echo Helper::translate('srbac','Assignment Table');?></td>
        <td><?php echo Yii::app()->authManager->assignmentTable?></td>
      </tr>
      <tr>
        <td><?php echo Helper::translate('srbac','Item child table');?></td>
        <td><?php echo Yii::app()->authManager->itemChildTable?></td>
      </tr>
      <?php  } catch(CException $e) { ?>
      <tr>
        <td colspan="2">
          <div class="error">
              <?php echo Helper::translate('srbac','AuthManager is not Configured');?>
          </div>
        </td></tr>
        <?php $error =true; ?>
      <?php  }?>
       <?php  }?>
      <?php try { ?>
      <tr>
        <th colspan="2"><?php echo Helper::translate('srbac','srbac');?></th>
      <tr>
        <td><?php echo Helper::translate('srbac','User id');?></td>
        <td><?php echo Helper::findModule('srbac')->userid?></td>
      </tr>
      <tr>
        <td><?php echo Helper::translate('srbac','User name');?></td>
        <td><?php echo Helper::findModule('srbac')->username?></td>
      </tr>
      <tr>
        <td><?php echo Helper::translate('srbac','User class');?></td>
        <td><?php echo Helper::findModule('srbac')->userclass?></td>
      </tr>
      <?php  } catch(CException $e ) { ?>
      <tr>
        <td colspan="2">
          <div class="error">
              <?php echo Helper::translate('srbac','srbac is not Configured');?>
          </div>
        </td></tr>
        <?php $error =true;?>
      <?php  }?>
    </table>
  </div>
  <div>
    <?php if($error) { ?>
    <div>
        <?php echo Helper::translate('srbac','There\'s an error in your config') ?>
        <?php $disabled = array('disabled'=>true)?>
    </div>
    <?php } ?>
    <?php echo CHtml::hiddenField("action", "Install"); ?>
    <?php echo CHtml::checkBox("demo", true, $disabled);
    echo Helper::translate('srbac','Create demo authItems?')
    ?><br />
    <?php echo CHtml::submitButton(Helper::translate('srbac','Install'),$disabled); ?>
  </div>

  <?php echo CHtml::endForm(); ?>
</div>
