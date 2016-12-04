<?php
namespace app\modules\controllers;

use yii\web\Controller;
use Yii;
use app\modules\models\Admin;
use yii\data\Pagination;

class ManageController extends Controller
{
	public $enableCsrfValidation = false;
	
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
		if (time() - $time > 3000) {
			$this->redirect(['public/login']);
			Yii::$app->end();
		}
		if (Yii::$app->request->isPost) {
          //  print_r('ok');die();
			$post = Yii::$app->request->post();
			if ($model->changePass($post)) {
				Yii::$app->session->setFlash('info', '修改成功');
			}
		}
		$model->adminuser = $adminuser;
		return $this->render("mailchangepass", ['model' => $model]);
	}

	public function actionManagers()
	{
		$this->layout = 'layout1';
		$model = Admin::find();
		$count = $model->count();
		$pageSize = Yii::$app->params['pageSize']['manage'];
		$pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
		$managers = $model->offset($pager->offset)->limit($pager->limit)->all();
		return $this->render('managers', ['managers' => $managers, 'pager' => $pager]);

	}
}