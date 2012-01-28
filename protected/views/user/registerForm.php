<?php
return array(
   'activeForm'=>array(
      'class'=>'CActiveForm',
      'id' => 'register-form',
      'enableAjaxValidation'=>true,
   ),
   'elements'=>array(
      'user'=>array(
         'type'=>'form',
         'title'=>'Обязательные данные',
         'elements'=>array(
            'username'=>array( 'type'=>'text', 'maxlength'=>32, ),
            'password'=>array( 'type'=>'password', 'maxlength'=>32, ),
            'name'=>array( 'type'=>'text', 'maxlength'=>32, ),
            'email'=>array( 'type'=>'text', 'maxlength'=>32, 'hint' => 'На E-mail будет выслан код подтверждения', ),
         ),
      ),
      'profile'=>array(
         'type'=>'form',
         'title'=>'Добавить по вкусу',
         'elements'=>array(
            'birthdate'=>array(
               'type'=>'zii.widgets.jui.CJuiDatePicker', 'language'=>'ru',
               'options'=>array(
                  'dateFormat'=>'dd.mm.yy',
                  'changeYear'=>true,
                  'changeMonth'=>true,
                  'yearRange'=>'1930:2012',
                  'minDate'=>'-100Y',
                  'maxDate'=>2012,
                  'defaultDate'=>'+1',
               ),
            ),
            'country'=>array( 'type'=>'CAutoComplete', 'url'=>array('suggest/country'),  'minChars'=>2, ),
            'city'=>array( 'type'=>'text', 'maxlength'=>32, ),
         ),
      ),
   ),
 
   'buttons'=>array(
      'register'=>array(
         'type'=>'submit',
         'label'=>'Зарегистрироваться',
      ),
   ),
);
?>
