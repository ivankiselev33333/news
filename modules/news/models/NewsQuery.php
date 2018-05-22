<?php

    namespace app\modules\news\models;

    use yii\db\ActiveQuery;

    /**
     * This is the ActiveQuery class for [[news]].
     *
     * @see news
     */
    class newsQuery extends ActiveQuery
    {


        /**
         * @inheritdoc
         * @return news[]|array
         */
        public function all($db = null)
        {
            return parent::all($db);
        }

        /**
         * @inheritdoc
         * @return news|array|null
         */
        public function one($db = null)
        {
            return parent::one($db);
        }
    }