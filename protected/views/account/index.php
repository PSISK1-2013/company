<?php
/* @var $this AccountController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Konta',
);

$this->menu=array(
	array('label'=>'Stwórz konto', 'url'=>array('create')),
	array('label'=>'Zarządzaj kontami', 'url'=>array('admin')),
);
?>

<h1>Zarządzanie kontami</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
