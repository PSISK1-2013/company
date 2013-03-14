<?php
/* @var $this AccountController */
/* @var $model Account */

$this->breadcrumbs=array(
	'Konta'=>array('index'),
	'Utwórz',
);

$this->menu=array(
	array('label'=>'Lista kont', 'url'=>array('index')),
	array('label'=>'Zarządzaj kontami', 'url'=>array('admin')),
);
?>

<h1>Create Account</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>