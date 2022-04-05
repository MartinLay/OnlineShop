<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php

$name = [
	'name' => 'name',
	'id' => 'name',
	'value' => $items->name,
	'class' => 'form-control',
];

$price =[
	'name' => 'price',
	'id' => 'price',
	'value' => $items->price,
	'class' => 'form-control',
	'type' => 'number',
	'min' => 0,
];

$stock = [
	'name' => 'stock',
	'id' => 'stock',
	'value' => $items->stock,
	'class' => 'form-control',
	'type' => 'number',
	'min' => 0,
];

$image = [
	'name' => 'image',
	'id' => 'image',
	'value' => null,
	'class' => 'form-control',
]; 

$submit = [
	'name' => 'submit',
	'id' => 'submit',
	'value' => 'Submit',
	'class' => 'btn btn-success',
	'type' => 'submit',
];

?>
<h1>Add Product</h1>

<?= form_open_multipart('Items/update/'.$items->id) ?>
	<div class="form-group">
		<?= form_label("Name", "name") ?>
		<?= form_input($name) ?>
	</div>

	<div class="form-group">
		<?= form_label("Price", "price") ?>
		<?= form_input($price) ?>
	</div>

	<div class="form-group">
		<?= form_label("Stock", "stock") ?>
		<?= form_input($stock) ?>
	</div>

	<img class="img-fluid" alt="image" src="<?= base_url('uploads/'.$items->image) ?>" />

	<div class="form-group">
		<?= form_label("Image", "image") ?>
		<?= form_upload($image) ?>
	</div>

	<div class="text-right">
		<?= form_submit($submit) ?>
	</div>

<?= form_close() ?>
<?= $this->endSection() ?>