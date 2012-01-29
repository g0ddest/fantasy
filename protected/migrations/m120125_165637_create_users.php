<?php

class m120125_165637_create_users extends CDbMigration
{
	public function up()
	{
      $this->createTable("tbl_user", array(
         'id'=>'pk',
         'username'=>'string not null unique',
         'name'=>'string',
         'email'=>'string not null unique',
         'password'=>'string not null',
      ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

      $this->createTable("tbl_user_profile", array(
         'user_id'=>'pk',
         'country'=>'string',
         'city'=>'string',
         'birthdate'=>'date default null',
         'register_date'=>'timestamp',
      ), 'ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');

      $this->addForeignKey('FK_user_profile', 'tbl_user_profile', 'user_id', 'tbl_user', 'id', 'cascade', 'cascade');

      $u = new User;
      $u->username = "humbug"; $u->name = "Роман"; $u->email="asd@asd.re"; $u->password = "7815696ecbf1c96e6894b779456d330e";
      $u->save();
	}

	public function down()
	{
      $this->dropTable("tbl_user_profile");
		$this->dropTable("tbl_user");
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
