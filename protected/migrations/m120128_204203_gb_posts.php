<?php

class m120128_204203_gb_posts extends CDbMigration
{
	public function up()
	{
      $this->createTable("tbl_gb_post", array(
         'id' => 'pk',
         'nickname' => 'string',
         'create_date' => 'timestamp',
         'message' => 'text(500)',
         'email' => 'string',
      ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
      $this->createTable("tbl_gb_answer", array(
         'gb_post_id' => 'pk',
         'answer_date' => 'timestamp',
         'answer' => 'text(500)',
         'user_id' => 'integer',
      ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

      $this->addForeignKey('FK_gb_answer', 'tbl_gb_answer', 'gb_post_id', 'tbl_gb_post', 'id', 'cascade', 'cascade');
      $this->addForeignKey('FK_gb_user', 'tbl_gb_answer', 'user_id', 'tbl_user', 'id', 'cascade', 'cascade');
	}

	public function down()
	{
      $this->dropTable("tbl_gb_answer");
		$this->dropTable("tbl_gb_post");
		return true;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}
