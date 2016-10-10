<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "sites".
 *
 * @property integer $id
 * @property string $domain
 * @property string $api_key
 * @property string $created_at
 */
class Sites extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sites';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domain'], 'required'],
            [['api_key'], 'string'],
            [['created_at'], 'safe'],
            [['domain'], 'string', 'max' => 255],
        ];
    }

	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			if($insert == self::EVENT_BEFORE_INSERT)
			{
				$this->created_at = date("Y-m-d h:i:s");
				$this->api_key = md5($this->domain);
			}
			return true;
		}
		return false;
	}


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domain' => 'Domain',
            'api_key' => 'Api Key',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @inheritdoc
     * @return SitesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SitesQuery(get_called_class());
    }
}
