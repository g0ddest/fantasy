<?php

/**
 * This is the model class for table "{{user_profile}}".
 *
 * The followings are the available columns in table '{{user_profile}}':
 * @property integer $user_id
 * @property string $country
 * @property string $city
 * @property string $email
 * @property string $registered
 *
 * The followings are the available model relations:
 * @property User $user
 */
class UserProfile extends CActiveRecord
{
	public static function model($className=__CLASS__) { return parent::model($className); }
	public function tableName() { return '{{user_profile}}'; }
	public function rules()
	{
		return array(
			array('country, city', 'length', 'max'=>255),
         array('birthdate', 'date', 'format'=>'d.M.yyyy'),
			array('user_id, country, city, register_date', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'user_id' => 'UserID',
			'country' => 'Страна',
			'city' => 'Город',
			'birthdate' => 'Дата рождения',
			'register_date' => 'Дата регистрации',
		);
	}

	public function search()
	{

		$criteria=new CDbCriteria;

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('register_date',$this->registered,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
