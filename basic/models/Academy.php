<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "academy".
 *
 * @property string $academy_id
 * @property string $academy_name
 */
class Academy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'academy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['academy_name', 'required', 'message' => '学院名称不能为空'],
            [['academy_name'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'academy_id' => '学院编号',
            'academy_name' => '学院名称',
        ];
    }
}
