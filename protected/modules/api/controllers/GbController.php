<?php
class GbController extends Controller
{
   public function actionView($id)
   {
      $model = GbPost::model()->with('gbAnswer', 'gbAnswer.user')->findByPk($id);
      if(!$model) {
         header('HTTP/1.1 404 Not Found');
      } else {
         header('HTTP/1.1 200 OK');
         header('Content-type: application/json');
         echo CJSON::encode($model);
      }
      Yii::app()->end();
   }
   public function actionDelete($id)
   {
      $model = GbPost::model()->findByPk($id);
      if(!$model) {
         header('HTTP/1.1 404 Not Found');
      } else {
         $model->delete();
         header('HTTP/1.1 202 Accepted');
      }
      Yii::app()->end();
   }
   public function actionCreate()
   {
      if(isset($_POST['GbPost'])) {
         $gb = new GbPost;
         $gb->attributes = $_POST['GbPost'];
         if(!$gb->validate()) {
            header('HTTP/1.1 409 Conflict');
			   echo CActiveForm::validate($gb);
         } else {
            $gb->save(false);
            header('HTTP/1.1 201 Created');
         }
      } else {
         header('HTTP/1.1 400 Bad Request');
      }
	   Yii::app()->end();
   }
   public function actionUpdate($id)
   {
      if(isset($_POST['GbPost'])) {
         $model = GbPost::model()->findByPk($id);
         if(!$model) {
            header('HTTP/1.1 404 Not Found');
         } else {
            $model->attributes = $_POST['GbPost'];
            if(!$model->validate()) {
               header('HTTP/1.1 409 Conflict');
			      echo CActiveForm::validate($model);
            } else {
               $gb->save(false);
               header('HTTP/1.1 201 Created');
            }
         }
      } else {
         header('HTTP/1.1 400 Bad Request');
      }
	   Yii::app()->end();
   }
}
?>
