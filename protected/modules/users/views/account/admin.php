<?php
/* @var $this AccountController */
/* @var $model Account */

$this->breadcrumbs = array(
    'Konta' => array('index'),
    'Zarządzaj',
);

$this->menu = array(
    array('label' => 'Lista kont', 'url' => array('index')),
    array('label' => 'Utwórz konto', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#account-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Zarządzaj kontami</h1>

<p>
    Możesz opcjonalnie podać operator porównania (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    lub <b>=</b>) na początku każdej wartości do wyszukania zdefiniuj jak powinno wyglądać porównanie.
</p>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'account-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'account_id',
        array(
            'name' => 'account_type.name',
            'filter' => CHtml::listData(AccountType::model()->findAll(), 'account_type_id', 'name'),
            'value' => '$data->account_type->name'),
        'login',
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
