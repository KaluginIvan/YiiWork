<?php

class SiteController extends Controller
{
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionIndex()
    {
		$this->render('index');
	}

	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionLogin()
	{
		$model=new LoginForm;

		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		$this->render('login',array('model'=>$model));
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

    public function actionItems()
    {
        $items = Items::model()->findAll();

        $categories = Category::model()->findAll();

        $this->render('items',array('items'=>$items,'categories'=>$categories));
    }

    public function actionAddItem($id)
    {
        $count = Yii::app()->session->get('count');
        $count++;
        Yii::app()->session->add('count', $count);

        $allItems = Yii::app()->session->get('allItems');
        $allItems[] = $id;
        Yii::app()->session->add('allItems', $allItems);

        $number = Yii::app()->session->get('number');
        if(isset($number[$id]))
            $number[$id]++;
        else
            $number[$id] = 1;
        Yii::app()->session->add('number', $number);

        $this->redirect(array('site/items'));
    }

    public function actionBucket()
    {
        $allItems = Yii::app()->session->get('allItems');
        $items = Items::model()->findAllByAttributes(array('id'=>$allItems));

        $session = Yii::app()->session;
        $session->open();

        $number = $session['number'];

        $this->render('bucket',array('items'=>$items,'number'=>$number));
    }

    public function actionOrder()
    {
        $phoneForm = new OrderForm();

        if(Yii::app()->request->getParam('OrderForm'))
        {
            $phoneForm->attributes = Yii::app()->request->getParam('OrderForm');

            if($phoneForm->validate()){
                Yii::app()->session->add('count', 0);
                Yii::app()->session->remove('allItems');
                $this->redirect(array('site/sucsess'));
            }
        }

        $this->render('order',array('phone'=>$phoneForm));
    }

    public function actionShowCategory($category)
    {
        $items = Items::model()->findAllByAttributes(array('category'=>$category));

        $categories = Category::model()->findAll();

        $this->render('items',array('items'=>$items,'categories'=>$categories));
    }

    public function actionSucsess()
    {
        $this->render('sucsess');
    }
}