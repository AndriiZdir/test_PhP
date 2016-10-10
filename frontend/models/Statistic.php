<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "statistic".
 *
 * @property integer $id
 * @property integer $domain_id
 * @property string $ip
 * @property string $browser
 * @property string $get
 * @property string $created_at
 *
 * @property Sites $domain
 */
class Statistic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statistic';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['domain_id'], 'required'],
            [['domain_id'], 'integer'],
            [['ip', 'browser', 'get'], 'string'],
            [['created_at'], 'safe'],
            [['domain_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sites::className(), 'targetAttribute' => ['domain_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'domain_id' => 'Domain ID',
            'ip' => 'Ip',
            'browser' => 'Browser',
            'get' => 'Get',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDomain()
    {
        return $this->hasOne(Sites::className(), ['id' => 'domain_id']);
    }

    /**
     * @inheritdoc
     * @return StatisticQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StatisticQuery(get_called_class());
    }
}
