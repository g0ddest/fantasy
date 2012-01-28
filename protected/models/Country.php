<?php
class Country extends CActiveRecord
{
   public static function model($className=__CLASS__) { return parent::model($className); }
   public function tableName() { return '{{country}}'; }
   public function rules()
   {
      return array(
         array('name', 'required'),
      );
   }
   public function __toString() {
      return $this->name;
   }
}
?>
