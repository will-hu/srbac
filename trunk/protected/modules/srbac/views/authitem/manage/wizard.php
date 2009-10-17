<div id="wizardMain" style="margin:10px">
  <table width="100%">
    <tr valign="top">
      <td width="40%">
        <table class="srbacDataGrid" width="40%" align="left">
          <tr>
            <th width="15%"><?php echo $this->module->tr->translate('srbac','Controller')?></th>
            <th width="15%"><?php echo $this->module->tr->translate('srbac','Actions')?></th>
          </tr>
          <?php foreach ($controllers as $n=>$controller) { ?>
          <tr>
            <td><?php echo $controller ?></td>
            <td>
                <?php
                echo CHtml::ajaxLink(
                CHtml::image($images['wizard'],
                "Autocreate Auth Items for controller ".$controller,
                array('border'=>0,'title'=>
                $this->module->tr->translate('srbac',
                    'Scanning for Auth Items for controller').' '.$controller))  ,
                array('scan','controller'=>$controller),
                array(
                'type'=>'POST',
                'update'=>'#controllerActions',
                'beforeSend' => 'function(){
                      $("#controllerActions").addClass("srbacLoading");
                  }',
                'complete' => 'function(){
                      $("#controllerActions").removeClass("srbacLoading");
                  }',
                ),array('name'=>'buttonScan_'.$n))
                ?>
                 <?php
                echo CHtml::ajaxLink(
                CHtml::image($images['delete'],
                "Delete All Auth Items of controller ".$controller,
                array('border'=>0,'title'=>
                $this->module->tr->translate('srbac',
                    'Delete All Auth Items of controller').' '.$controller))  ,
                array('scan','controller'=>$controller,'delete'=>true),
                array(
                'type'=>'POST',
                'update'=>'#controllerActions',
                'beforeSend' => 'function(){
                      $("#controllerActions").addClass("srbacLoading");
                  }',
                'complete' => 'function(){
                      $("#controllerActions").removeClass("srbacLoading");
                  }',
                ),array('name'=>'buttonDelete_'.$n))
                ?>
            </td>
          </tr>
          <?php } ?>
        </table>
      </td>
      <td width="60%">
        <table class="srbacDataGrid" width="50%" style="float:left">
          <tr>
            <th width="70%"><?php echo $this->module->tr->translate('srbac','Auth items')?></th>
          </tr>
          <tr>
            <td valign="top">
              <div id="controllerActions"></div>
            </td>
          </tr>
        </table>
      </td>
  </table>
</div>