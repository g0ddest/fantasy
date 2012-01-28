<?php
class GbAnswer extends CActiveRecord
{
	public static function model($className=__CLASS__) { return parent::model($className); }
	public function tableName() { return '{{gb_answer}}'; }

	public function rules()
	{
		return array(
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('answer', 'safe'),
		);
	}

	public function relations()
	{
		return array(
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'gbPost' => array(self::BELONGS_TO, 'GbPost', 'gb_post_id'),
		);
	}

	public function attributeLabels()
	{
      $fields = array('gb_post_id','answer_date','answer','user_id',);
      $labels = array();
      foreach($fields as $field) $labels[$field] = $field;
      return $labels;
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('gb_post_id',$this->gb_post_id);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
