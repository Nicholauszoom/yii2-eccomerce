<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Contract]].
 *
 * @see \common\models\Contract
 */
class ContractQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Contract[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Contract|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
