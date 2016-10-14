<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organization".
 *
 * @property string $organization_id
 * @property string $organization_name
 *
 * @property Department[] $departments
 */
class Organization extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organization';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['organization_name', 'required'],
            [['organization_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'organization_id' => '组织编号',
            'organization_name' => '组织名称',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartments()
    {
        return $this->hasMany(Department::className(), ['organization_id' => 'organization_id']);
    }

    
}
