<?php

class SuggestController extends Controller
{
   public function filters() {
      return array( 'ajaxOnly' );
   }
   public function actionCountry($q)
   {
      if($q)
      {
         $criteria = new CDbCriteria;
         $criteria->addSearchCondition('name', $q);
         $criteria->limit=5;
         $countries = Country::model()->findAll($criteria);

         echo join("\n", $countries);
      }
      Yii::app()->end();
   }
}

?>
