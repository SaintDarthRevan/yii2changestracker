<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "changes".
 *
 * @property int $id
 * @property int $page_id
 * @property int $user_id
 * @property string $time
 * @property string $changes
 * @property string $fields
 */
class Change extends \yii\db\ActiveRecord
{

    public function __construct($config = [])
    {
        parent::__construct($config);

        $this->page_id = $model->id;
        $this->user_id = \Yii::$app->user->id;
        $this->time = date('y-m-d h:i:s');
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'changes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['page_id', 'user_id', 'changes'], 'required'],
            [['page_id', 'user_id'], 'integer'],
            [['changes'], 'string'],
            [['fields'], 'string', 'max' => 255],
            [['page_title', 'username'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'changes' => 'Описание изменений',
            'fields' => 'Поля',
            'time' => 'Время изменения'
        ];
    }

    public function getPage()
    {
        return $this->hasOne(Page::className(), ['id' => 'page_id']);
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
