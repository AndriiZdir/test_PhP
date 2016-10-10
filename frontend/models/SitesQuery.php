<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Sites]].
 *
 * @see Sites
 */
class SitesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Sites[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Sites|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
