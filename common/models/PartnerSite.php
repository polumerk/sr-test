<?php

namespace common\models;

use Yii;
use arogachev\sortable\behaviors\numerical\ContinuousNumericalSortableBehavior;

/**
 * This is the model class for table "partner_site".
 *
 * @property integer $id
 * @property string $icon_site
 * @property string $name_site
 * @property string $url_site
 * @property integer $sort
 */
class PartnerSite extends \yii\db\ActiveRecord
{
    public $icon_file;
    public $icon_site_hidden;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner_site';
    }

    public function scenarios()
    {
        return [
            'insert' => ['icon_site', 'name_site','url_site'],
            'update' => ['icon_site', 'name_site','url_site','icon_site_hidden'],
        ];
    }  

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
            'class' => ContinuousNumericalSortableBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['icon_site', 'name_site', 'url_site'], 'required','on'=>'insert'],
            [['name_site', 'url_site'], 'required','on'=>'update'],
            [['icon_site', 'name_site', 'url_site','icon_site_hidden'], 'string'],            
            ['url_site','url', 'defaultScheme' => 'http'],
            [['icon_file'], 'image',  'extensions' => ['jpg', 'jpeg', 'png', 'gif'],'mimeTypes' => ['image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'],'skipOnEmpty' => false,'minWidth' => 100, 'minHeight' => 100],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'Уникальный номер записи'),
            'icon_site' => Yii::t('app', 'Иконка сайта'),
            'name_site' => Yii::t('app', 'Имя сайта'),
            'url_site' => Yii::t('app', 'Ссылка на сайт'),
            'sort' => Yii::t('app', 'Позиция'),
        ];
    }

    public function afterSave()
    {
        //saving original
        if($this->icon_file)
        {
            $path = Yii::getAlias('@frontend/web/img/partner/') . $this->icon_file->baseName . '.' . $this->icon_file->extension;
            $this->icon_file->saveAs($path);
            $this->removeImages();   
            $this->attachImage($path);
        }
    }

}
