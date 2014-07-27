<?php

class Items extends CActiveRecord
{
	public function tableName()
	{
		return 'items';
	}

	public function rules()
	{
		return array(
			array('name, description, price, category', 'required'),
			array('price', 'numerical', 'integerOnly'=>true),
			array('name, description, category', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, price, category', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'price' => 'Price',
			'category' => 'Category',
		);
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
