<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $preview
 * @property string $html
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'html'], 'required'],
            [['description', 'html'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['preview'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок страницы',
            'description' => 'Описание',
            'preview' => 'Превью',
            'html' => 'HTML-код',
        ];
    }

    public function uploadPreview()
    {
        if ($this->validate()) {
            $this->preview->saveAs(\Yii::$app->getBasePath().'/uploads/images/preview/' . $this->preview->baseName . '.' . $this->preview->extension);
            return true;
        } else {
            return false;
        }
    }

    public function getTitle()
    {
        return $this->title;
    }
}
