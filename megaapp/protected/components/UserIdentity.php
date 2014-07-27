<?php

class UserIdentity extends CUserIdentity
{
    protected $_id;

	public function authenticate()
	{
        $user = Users::model()->findByAttributes(array('login'=>$this->username));

		if($user === NULL)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($user->password !== $this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
        {
            $this->_id = $user->id;
            $this->username = $user->login;
			$this->errorCode=self::ERROR_NONE;
        }
		return !$this->errorCode;
	}

    public function getId(){
        return $this->_id;
    }
}