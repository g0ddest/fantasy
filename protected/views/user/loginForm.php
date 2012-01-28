<?php
return array(
   'activeForm'=>array(
      'id'=>'login-form',
      'class'=>'CActiveForm',
      'enableAjaxValidation'=>true,
   ),
   'elements'=>array(
      'username'=>array( 'type'=>'text', 'maxlength'=>32, ),
      'password'=>array( 'type'=>'password', 'maxlength'=>32, 'class'=>'row', ),
   ),
 
   'buttons'=>array(
      'login'=>array(
         'type'=>'submit',
         'label'=>'Войти',
      ),
   ),
);
?>
