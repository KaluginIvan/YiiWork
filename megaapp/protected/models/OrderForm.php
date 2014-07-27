<?php

class OrderForm extends CFormModel
{
    public $phoneNumber;

    public function rules()
    {
        return array(
            array('phoneNumber','phoneValidation'),
        );
    }

    public function save()
    {
        $allComments = Yii::app()->session->get('comments');
        $allComments[] = $this->attributes;
        Yii::app()->session->add('comments', $allComments);
    }

    public function load()
    {
        $attrubutes = Yii::app()->session['comments'];

        $models = array();

        foreach($attrubutes as $i=>$attribute)
        {
            $models[$i] = new CommentForm();
            $models[$i]->attributes = $attribute;
        }

        return $models;
    }

    public function phoneValidation($attribute, $params)
    {
        $pattern = '/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/';

        if(!preg_match($pattern, $this->$attribute))
            $this->addError($attribute, 'not valid phone number');
    }
}