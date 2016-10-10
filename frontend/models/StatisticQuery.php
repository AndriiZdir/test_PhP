<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Statistic]].
 *
 * @see Statistic
 */
class StatisticQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Statistic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Statistic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
