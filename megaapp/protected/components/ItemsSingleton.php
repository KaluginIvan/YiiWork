<?php 
 
class ItemsSingleton extends CApplicationComponent
{
    private $_model=null;
 
 
    public function setModel($id)
    {
        $this->_model=Items::model()->findByPk($id);
    }
 
    public function getModel()
    {
        if (!$this->_model)
        {
            if (isset($_GET['items']))
                $this->_model=Items::model()->findByAttributes(array('url_name'=> $_GET['items']));
            else
                $this->_model=Items::model()->find();
        }
        return $this->_model;
    }
 
    public function getId()
    {
        return $this->model->id;
    }
 
    public function getName()
    {
        return $this->model->name;
    }
}