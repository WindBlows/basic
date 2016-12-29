<?php
namespace app\modules\controllers;

use yii\web\Controller;
use app\models\Category;
use Yii;

class CategoryController extends Controller
{
	public function actionList()
	{
		$this->layout = 'layout1';
		return $this->render('cates');
	}

	public function actionAdd()
	{
		$this->layout = 'layout1';
		// $list = ['添加顶级分类'];
	    $model = new Category();
		// $cates = $model->getData();
		// $tree = $model->getTree($cates);
		// $tree = $model->setPrefix($tree);
		// print_r($tree);
		//$list[0] = '添加顶级分类';
		$list = $model->getOptions();
		if (Yii::$app->request->isPost) {
			$post = Yii::$app->request->post();
			if ($model->add($post)) {
				Yii::$app->session->setFlash('info', '添加成功');
			}
		}
		return $this->render('add', ['list' => $list, 'model' => $model]);
	}
}