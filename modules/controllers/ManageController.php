<?php
namespace app\modules\controllers;

use yii\web\Controller;

use Yii;

use app\modules\models\Admin;

class ManageController extends Controller
{
	public function actionMailchangepass()
	{
		$this->layout = false;
		$time = Yii::$app->request->get("timestamp");
		$adminuser = Yii::$app->request->get("adminuser");
		$token = Yii::$app->request->get("token");
		$model = new Admin;
		$myToken = $model->createToken($adminuser, $time);
		if ($token != $myToken) {
			$this->redirect(['public/login']);
			Yii::$app->end();
		}
		if (time() - $time > 300) {
			$this->redirect(['public/login']);
			Yii::$app->end();
		}
		$model->adminuser = $adminuser;
		return $this->render("mailchangepass", ['model' => $model]);
	}
}