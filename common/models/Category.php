<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/6/27
 * Time: 21:21
 */

namespace common\models;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class Category extends ActiveRecord{

    public  static function  tableName(){
        return '{{%category}}';
    }

    public  function behaviors(){
        return [];
    }

    public function rules(){
        return [
            ['pid','integer','min'=>0,'tooSmall'=>'不能小于0的整数','message'=>'不能小于0的整数'],
            ['name','required','message' => '名称不能为空'],
            ['name','string','max'=>'30','tooLong'=>'不能大于30'],
            ['sort_order','integer','min'=>'0','tooSmall'=>'不能小于0的整数','message'=>'不能小于0的整数'],
            ['status','in','range'=>[0,1],'message'=>'非法操作'],
            ['pid','checkpid'],
        ];
    }

    public function checkpid($attr,$param){

        if(self::find()->where(['pid'=>$this->id])->count()  > 0){
            $this->addError($attr,'该类下有子类，需要先移除子类');
        }else if($this->id == $this->$attr){
            $this->addError($attr,'无法成为自身的子类');
        }

    }

    public function beforeSave($insert){
        if(parent::beforeSave($insert)){
            if($this->isNewRecord){
               $this->date = time();
            }
            return true;    //漏掉这一句，导致save()不成功！！
        }
        return false;
    }

    public static function getParent(){
        $data = self::find()->where(['pid' => '0'])->asArray()->all();
        return ArrayHelper::merge(['0' => '父类'],ArrayHelper::map($data,'id','name'));
    }

    public static function deleteIn($select){
        $select = array_map('intval' ,$select);
        return self::deleteAll(['id' => $select]);
    }

}
