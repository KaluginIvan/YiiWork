<?php

class AdministratorModule extends CWebModule
{
	public function init()
	{
		$this->setImport(array(
			'administrator.models.*',
			'administrator.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			return true;
		}
		else
			return false;
	}
}
