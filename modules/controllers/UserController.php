<?php
namespace app\modules\controllers;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\User;
use app\models\Profile;
use Yii;
use app\modules\controllers\CommonController;

class UserController extends Controller
{
	public $enableCsrfValidation = false;

	public function actionUsers()
	{

	}

	public function actionReg()
    {
        $this->layout = "layout1";
        $model = new User;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if ($model->reg($post)) {
                Yii::$app->session->setFlash('info', '添加成功');
            }
        }
        $model->userpass = '';
        $model->repass = '';
        return $this->render("reg", ['model' => $model]);
    }
}