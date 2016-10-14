<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "department".
 *
 * @property string $department_id
 * @property string $department_name
 * @property string $organization_id
 *
 * @property Organization $organization
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['organization_id'], 'required'],
            [['organization_id'], 'integer'],
            [['department_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'department_id' => '部门编号',
            'department_name' => '部门',
            'organization_id' => '所属组织',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrganization()
    {
        return $this->hasOne(Organization::className(), ['organization_id' => 'organization_id']);
    }

    /**
     * @return MapArray
     */
    public function getDepartmentsList($organizationId){
        $model = Department::find()->where(['organization_id' => $organizationId])->asArray()->all();
        return ArrayHelper::map($model, 'department_id', 'department_name');
    }

}
