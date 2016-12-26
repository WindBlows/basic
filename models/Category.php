<?php

namespace app\models;

use yii\db\ActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

class Category extends ActiveRecord
{
	public static function getMenu()
    {
        $top = self::find()->where('parentid = :pid', [":pid" => 0])->limit(11)->orderby('createtime asc')->asArray()->all();
        $data = [];
        foreach((array)$top as $k=>$cate) {
            $cate['children'] = self::find()->where("parentid = :pid", [":pid" => $cate['cateid']])->limit(10)->asArray()->all();
            $data[$k] = $cate;
        }
        return $data;
    }

}