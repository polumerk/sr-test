<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "holidays".
 *
 * @property integer $id
 * @property string $slug
 * @property string $name_holiday
 * @property string $text_holiday
 * @property string $date_holiday
 * @property string $logo_holiday
 * @property string $status_holiday
 * @property string $created_at
 * @property string $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $logo_holiday_update
 */
class Holidays extends \yii\db\ActiveRecord
{   
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;

    public $logo_holiday_update;
    public $logo_holiday_file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'holidays';
    }


    public function scenarios()
    {
        return [
            'insert' => ['name_holiday', 'text_holiday', 'date_holiday', 'logo_holiday','logo_holiday_file', 'status_holiday'],
            'update' => ['name_holiday', 'text_holiday', 'date_holiday','logo_holiday_update', 'status_holiday'],
        ];
    }   

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'slug' => [
            'class' => 'Zelenin\yii\behaviors\Slug',
            'slugAttribute' => 'slug',
            'attribute' => 'name_holiday',
            // optional params
            'ensureUnique' => true,
            'replacement' => '-',
            'lowercase' => true,
            'immutable' => false,
            // If intl extension is enabled, see http://userguide.icu-project.org/transforms/general. 
            'transliterateOptions' => 'Russian-Latin/BGN; Any-Latin; Latin-ASCII; NFD; [:Nonspacing Mark:] Remove; NFC;',
            ],
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_holiday', 'text_holiday', 'date_holiday', 'status_holiday'], 'required' ],
            [['logo_holiday'], 'required', 'on' => 'insert'],
            [['name_holiday', 'text_holiday', 'status_holiday'], 'string'],
            [['slug','date_holiday','created_at', 'updated_at','userc','useru'], 'safe'],
            [['created_by', 'updated_by'], 'integer'],
            [['slug', 'logo_holiday','logo_holiday_update'], 'string', 'max' => 255],
            [['logo_holiday_file'], 'image',  'extensions' => ['jpg', 'jpeg', 'png', 'gif'],'mimeTypes' => ['image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'],'skipOnEmpty' => false,'minWidth' => 100, 'minHeight' => 100],
        ];
    }


    public function getUserc()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getUseru()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }

    public function getMaxdate()
    {
        return Holidays::find()->where(['status_holiday' => Holidays::STATUS_ACTIVE])->max('date_holiday');
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'slug' => Yii::t('app', 'Slug'),
            'name_holiday' => Yii::t('app', 'Name Holiday'),
            'text_holiday' => Yii::t('app', 'Text Holiday'),
            'date_holiday' => Yii::t('app', 'Date Holiday'),
            'logo_holiday' => Yii::t('app', 'Logo Holiday'),
            'status_holiday' => Yii::t('app', 'Status Holiday'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'logo_holiday_file' => Yii::t('app', 'Logo Holiday'),
            'logo_holiday_update' => Yii::t('app', 'Logo Holiday Update'),
            'userc.username' => Yii::t('app', 'Created By'),
            'useru.username' => Yii::t('app', 'Updated By'),
        ];
    }

    public function afterSave()
    {   
        //saving original
        if($this->logo_holiday_file)
        {
            $path = Yii::getAlias('@frontend/web/img/'.$this->tableName().'/') . $this->logo_holiday_file->baseName . '.' . $this->logo_holiday_file->extension;
            $this->logo_holiday_file->saveAs($path);
            if ($this->scenario==='update') {
                
                $this->removeImages();   
            }
            $this->attachImage($path);
        }
    } 

}
