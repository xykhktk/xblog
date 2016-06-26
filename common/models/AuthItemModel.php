<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "auth_item".
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $rule_name
 * @property string $data
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property AuthAssignment[] $authAssignments
 * @property AuthRule $ruleName
 * @property AuthItemChild[] $authItemChildren
 * @property AuthItemChild[] $authItemChildren0
 */
class AuthItemModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'auth_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'created_at', 'updated_at'], 'integer'],
            [['description', 'data'], 'string'],
            [['name', 'rule_name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Name',
            'type' => 'Type',
            'description' => 'Description',
            'rule_name' => 'Rule Name',
            'data' => 'Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthAssignments()
    {
        return $this->hasMany(AuthAssignment::className(), ['item_name' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuleName()
    {
        return $this->hasOne(AuthRule::className(), ['name' => 'rule_name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItemChildren()
    {
        return $this->hasMany(AuthItemChild::className(), ['parent' => 'name']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthItemChildren0()
    {
        return $this->hasMany(AuthItemChild::className(), ['child' => 'name']);
    }

    /**
     * 获取列表（分页）
     * @param unknown $query
     * @param number $curPage
     * @param number $pageSize
     * @param string $search
     * @return multitype:number multitype: |unknown
     */
    public function getPages($query,$curPage = 1,$pageSize = 10 ,$search = null)
    {
        if($search)
            $query = $query->andFilterWhere($search);

        $data['count'] = $query->count();
        if(!$data['count'])
            return ['count'=>0,'curPage'=>$curPage,'pageSize'=>$pageSize,'start'=>0,'end'=>0,'data'=>[]];

        $curPage = (ceil($data['count']/$pageSize)<$curPage)?ceil($data['count']/$pageSize):$curPage;

        $data['curPage'] = $curPage;
        //每页显示条数
        $data['pageSize'] = $pageSize;
        //起始页
        $data['start'] = ($curPage-1)*$pageSize+1;
        //末页
        $data['end'] = (ceil($data['count']/$pageSize) == $curPage)?$data['count']:($curPage-1)*$pageSize+$pageSize;
        //数据
        $data['data'] = $query->offset(($curPage-1)*$pageSize)->limit($pageSize)->asArray()->all();

        return $data;

    }
}
