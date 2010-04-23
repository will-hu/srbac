<?php
/**
 * clearObsolete.php
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @link http://code.google.com/p/srbac/
 */

/**
 * A view for deleting authItems of controllers that no longer exist
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @package srbac.views.authitem.manage
 * @since 1.1.1
 */
 ?>
<div style="margin:10px">
  <?php echo Helper::translate("srbac","The following items doesn't seem to belong to a controller"); ?>
  <?php foreach ($items as $item) {?>
  <?php echo $item; ?>
  <?php }?>
</div>
