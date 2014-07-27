<?php

$this->breadcrumbs=array(
	$this->module->id,
);
?>

<?php if(Yii::app()->user->role === 'admin'): ?>

<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<p>
Это админка
</p>

<?php else: ?>

<p>Прав нет</p>

<?php endif; ?>