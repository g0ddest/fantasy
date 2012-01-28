<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $nick
 * @property string $name
 * @property string $password
 *
 * The followings are the available model relations:
 * @property UserProfile $userProfile
 */
class User extends CActiveRecord
{
	public static function model($className=__CLASS__) { return parent::model($className); }
	public function tableName() { return '{{user}}'; }
	public function rules()
	{
		return array(
			array('username, name, password, email', 'required'),
         array('username, email', 'unique'),
         array('email', 'email'),
			array('username, name', 'length', 'max'=>255),
			array('username, name', 'safe', 'on'=>'search'),
		);
	}
	public function relations()
	{
		return array( 'userProfile' => array(self::HAS_ONE, 'UserProfile', 'user_id'), );
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Ник',
			'name' => 'Имя',
         'password' => 'Пароль',
         'email' => 'E-mail',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('id',$this->id);
		$criteria->compare('username',$this->username,true);

		return new CActiveDataProvider($this, array( 'criteria'=>$criteria ));
	}
   public function hashPassword($password) { return md5($password); }
   public function validatePassword($password) {
      return $this->hashPassword($password)===$this->password;
   }
}
