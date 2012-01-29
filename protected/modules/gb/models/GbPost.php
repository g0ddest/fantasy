<?php
class GbPost extends CActiveRecord
{
	public static function model($className=__CLASS__) { return parent::model($className); }
	public function tableName() { return '{{gb_post}}'; }

	public function rules()
	{
		return array(
			array('nickname, email', 'length', 'max'=>255),
			array('message', 'safe'),
		);
	}

	public function relations()
	{
		return array(
			'gbAnswer' => array(self::HAS_ONE, 'GbAnswer', 'gb_post_id'),
		);
	}

	public function attributeLabels()
	{
      $fields = array('id','nickname','create_date','message','email',);
      $labels = array();
      foreach($fields as $field) $labels[$field] = $field;
      return $labels;
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('create_date',$this->create_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
?>
