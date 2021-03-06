<?php

class Users extends CActiveRecord
{
    const ROLE_ADMIN = 'administrator';
    const ROLE_MODER = 'moderator';
    const ROLE_USER = 'user';
    const ROLE_BANNED = 'banned';

	public function tableName()
	{
		return 'users';
	}

	public function rules()
	{
		return array(
			array('login, password, role', 'required'),
			array('login, password', 'length', 'max'=>255),
			array('role', 'length', 'max'=>64),
			array('id, login, password, role', 'safe', 'on'=>'search'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login' => 'Login',
			'password' => 'Password',
			'role' => 'Role',
		);
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
