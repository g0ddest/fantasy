<?php

class m120127_025413_countries extends CDbMigration
{
	public function up()
	{
      $this->createTable("tbl_country", array(
         'name' => 'string primary key',
      ), 'ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
      $cs = array("Российская Федерация", "Украина", "США", "Россия");
      foreach($cs as $c) {
         $country = new Country;
         $country->name=$c;
         $country->save();
      }
      
	}

	public function down()
	{
      $this->dropTable("tbl_country");
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
