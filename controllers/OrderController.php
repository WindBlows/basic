<?php
namespace app\controllers;
use app\controllers\CommonController;
use app\models\Order;
use app\models\Cart;
use app\models\OrderDetail;
use app\models\Product;
use app\models\User;
use app\models\Address;
use Yii;

class OrderController extends CommonController
{
	public $layout = false;

	public function actionCheck()
	{
		if (Yii::$app->session['isLogin'] != 1) {
			return $this->redirect(['member/auth']);
		}
		$orderid = Yii::$app->request->get('orderid');
		$status = Order::find()->where('orderid = :oid', [':oid' => $orderid])->one()->status;
		if ($status != Order::CREATEORDER && $status != Order::CHECKORDER) {
			return $this->redirect(['order/index']);
		}
		$userid = User::find()->where('username = :name or useremail = :email', [':name' => Yii::$app->session['loginname'], ':email' => Yii::$app->session['loginname']])->one()->userid;
		$addresses = Address::find()->where('userid = :uid', [':uid' => $userid])->asArray()->all();
		$details = OrderDetail::find()->where('orderid = :oid', [':oid' => $orderid])->asArray()->all();
		$data = [];
		foreach ($details as $detail) {
			$model = Product::find()->where('productid = :pid', [':pid' => $detail['productid']])->one();
			$detail['title'] = $model->title;
			$detail['cover'] = $model->cover;
			$data[] = $detail;
		}
		$express = Yii::$app->params['express'];
		$expressPrice = Yii::$app->params['expressPrice'];
		$this->layout = "layout1";
		return $this->render("check", ['express' => $express, 'expressPrice' => $expressPrice, 'addresses' => $addresses, 'products' => $data]);
	}

	public function actionIndex()
	{
		$this->layout = "layout2";
		return $this->render("index");
	}

	public function actionAdd()
    {
        if (Yii::$app->session['isLogin'] != 1) {
            return $this->redirect(['member/auth']);
        }
        $transaction = Yii::$app->db->beginTransaction();
        try {
            if (Yii::$app->request->isPost) {
                $post = Yii::$app->request->post();
                $ordermodel = new Order;
                $ordermodel->scenario = 'add';
                $usermodel = User::find()->where('username = :name or useremail = :email', [':name' => Yii::$app->session['loginname'], ':email' => Yii::$app->session['loginname']])->one();
                if (!$usermodel) {
                    throw new \Exception();
                }
                $userid = $usermodel->userid;
                $ordermodel->userid = $userid;
                $ordermodel->status = Order::CREATEORDER;
                $ordermodel->createtime = time();
                if (!$ordermodel->save()) {
                    throw new \Exception();
                }
                $orderid = $ordermodel->getPrimaryKey();
                foreach ($post['OrderDetail'] as $product) {
                    $model = new OrderDetail;
                    $product['orderid'] = $orderid;
                    $product['createtime'] = time();
                    $data['OrderDetail'] = $product;
                    if (!$model->add($data)) {
                        throw new \Exception();
                    }
                    Cart::deleteAll('productid = :pid' , [':pid' => $product['productid']]);
                    Product::updateAllCounters(['num' => -$product['productnum']], 'productid = :pid', [':pid' => $product['productid']]);
                }
            }
            $transaction->commit();
        } catch (\Exception $e) {
            $transaction->rollback();
            return $this->redirect(['cart/index']);
        }
        return $this->redirect(['order/check', 'orderid' => $orderid]);
    }


}