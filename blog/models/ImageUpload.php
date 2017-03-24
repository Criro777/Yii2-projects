<?php

namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class ImageUpload extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png']
        ];
    }

    //загрузка изображения на сервер в папку uploads
    public function upload($currentImg = '')
    {

        if ($this->validate()) {
            $this->image->saveAs('uploads/' . $this->image->baseName . '.' . $this->image->extension);

            if ($currentImg != '' && $this->image != '' && file_exists(Yii::getAlias('@web') . '/uploads/' . $currentImg)) {
                unlink(Yii::getAlias('@web') . '/uploads/' . $currentImg);
            }
            return $this->image->name;
        } else {
            return false;
        }
    }

}