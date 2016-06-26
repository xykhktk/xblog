<?php
namespace common\models;

use yii\db\ActiveRecord;

class User extends  ActiveRecord{

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    
    public static function tableName(){
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

}