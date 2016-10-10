<?php

use yii\db\Migration;
	use yii\db\Schema;

	class m161007_105518_statistic extends Migration
{
    public function up()
    {
		$this->createTable ('statistic', array(
			'id'         => Schema::TYPE_PK,
			'domain_id'      => Schema::TYPE_INTEGER . ' NOT NULL',
			'ip'    => Schema::TYPE_TEXT,
			'browser'    => Schema::TYPE_TEXT,
			'get'    => Schema::TYPE_TEXT,
			'created_at' => Schema::TYPE_DATETIME,
		));
		// add foreign key for table `sites`
		$this->addForeignKey(
			'fk-post-domain_id',
			'statistic',
			'domain_id',
			'sites',
			'id',
			'CASCADE'
		);
    }


    public function down()
    {
        echo "m161007_105518_statistic cannot be reverted.\n";
		$this->dropTable('statistic');
        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
