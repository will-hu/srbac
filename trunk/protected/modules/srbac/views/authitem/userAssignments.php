<br />
<h1>Assignments of user : '<?php echo $username?>'</h1>
<table class="dataGrid" width="100%">
  <tr>
    <th class="roles"><?php echo $this->module->tr->translate('srbac','Roles')?></th>
    <th class="tasks"><?php echo $this->module->tr->translate('srbac','Tasks')?></th>
    <th class="operations"><?php echo $this->module->tr->translate('srbac','Operations')?></th>
  </tr>
  <tr>
    <td valign="top" colspan="3">
      <table class="roles">
        <?php foreach ($data as $i=>$roles) { ?>
        <tr>
          <td><b><?php echo $i ?></b>
              <?php foreach ($roles as $j=>$tasks) { ?>
            <table class="tasks">
              <tr>
                <td valign="top">
                      <?php echo $j; ?>
                  <table class="operations">
                    <tr>
                      <td valign="top">
                      <?php foreach ($tasks as $j=>$opers) { ?>
                              <?php echo $opers."<br />";  ?>
                              <? } ?>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
              <? }?>
          </td>
        </tr>
        <? } ?>
      </table>
    </td>
  </tr>
</table>