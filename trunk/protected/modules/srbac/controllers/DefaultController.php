<?php
class DefaultController extends CController {
  /**
   * The default action if no route is specified
   */
	public function actionIndex() {
		//$this->render('index');
    $this->redirect(array('authitem/frontpage'));
	}
 }