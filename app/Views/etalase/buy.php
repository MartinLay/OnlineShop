<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php
	$iditems = [
		'name' => 'iditems',
		'id' => 'iditems',
		'value' => $model->id,
		'type' => 'hidden'
	];

	$idconsumen = [
		'name' => 'idconsumen',
		'id' => 'idconsumen',
		'value' => session()->get('id'),
		'type' => 'hidden'
	];
	$amount = [
		'name' => 'amount',
		'id' => 'amount',
		'value' => 1,
		'min' => 1,
		'class' => 'form-control',
		'type' => 'number',
		'max' => $model->stock,
	];
	$totalprice = [
		'name' => 'totalprice',
		'id' => 'totalprice',
		'value' => null,
		'class' => 'form-control',
		'readonly' => true,
	];
	$shipping = [
		'name' => 'shipping',
		'id' => 'shipping',
		'value' => null,
		'class' => 'form-control',
		'readonly' => true,
	];
	$address = [
		'name' => 'address',
		'id' => 'address',
		'class' => 'form-control',
		'value' => null,
	];

	$submit = [
		'name' => 'submit',
		'id' => 'submit',
		'type' => 'submit',
		'value' => 'Buy',
		'class' => 'btn btn-success',
	];
?>

<div class="container">
	<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-body">
					<img class="img-fluid" src="<?= base_url('uploads/'.$model->image) ?>" />
					<h1 class="text-success"><?= $model->name ?></h1>
					<h4> Price : <?= "Rp".number_format($model->price,2,',','.') ?></h4>
					<h4> Stock : <?= $model->stock ?></h4>
				</div>
			</div>
		</div>
		<div class="col-6">
		<h4>Shipping</h4>
			<div class="form-group">
				<label for="provinsi">Select Province</label>
				<select class="form-control" id="provinsi">
					<option>Select Province</option>
					<?php foreach($provinsi as $p): ?>
						<option value="<?= $p->province_id ?>"><?= $p->province ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<div class="form-group">
				<label for="kabupaten">Select District/City</label>
				<select class="form-control" id="kabupaten">
					<option>Select District/City</option>
				</select>
			</div>
			<div class="form-group">
				<label for="service">Select Service</label>
				<select class="form-control" id="service">
					<option>Select Service</option>
				</select>
			</div>

			<strong>Estimasi : <span id="estimasi"></span></strong>
			<hr>
			<?= form_open('Etalase/buy') ?>
				<?= form_input($iditems) ?>
				<?= form_input($idconsumen) ?>
				<div class="form-group">
					<?= form_label('Total amount', 'amount') ?>
					<?= form_input($amount) ?>
				</div>
				<div class="form-group">
					<?= form_label('Shipping', 'shipping') ?>
					<?= form_input($shipping) ?>
				</div>
				<div class="form-group">
					<?= form_label('Total Price', 'totalprice') ?>
					<?= form_input($totalprice) ?>	
				</div>
				<div class="form-group">
					<?= form_label('Address', 'address') ?>
					<?= form_input($address) ?>
				</div>
				<div class="text-right">
					<?= form_submit($submit) ?>
				</div>
			<?= form_close() ?>
		</div>
	</div>
</div>

<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script>
	$('document').ready(function(){
		var quantity_purchase = 1;
		var price = <?= $model->price ?>;
		var shipping = 0;
		$("#provinsi").on('change', function(){
			$("#kabupaten").empty();
			var id_province = $(this).val();
			$.ajax({
				url : "<?= site_url('etalase/getcity') ?>",
				type : 'GET',
				data : {
					'id_province': id_province,
				},
				dataType : 'json',
				success : function(data){
					console.log(data);
					var results = data["rajaongkir"]["results"];
					for(var i=0; i<results.length; i++)
					{
						$("#kabupaten").append($('<option>',{
							value : results[i]["city_id"],
							text : results[i]['city_name']
						}));
					}
				},
				
			});
		});

		$("#kabupaten").on('change', function(){
			var id_city = $(this).val();
			$.ajax({
				url : "<?= site_url('etalase/getcost') ?>",
				type : 'GET',
				data : {
					'origin': 154,
					'destination' : id_city,
					'weight' : 1000,
					'courier' : 'jne'
				},
				dataType : 'json',
				success : function(data){
					console.log(data);
					var results = data["rajaongkir"]["results"][0]["costs"];
					for(var i = 0; i<results.length; i++)
					{
						var text = results[i]["description"]+"("+results[i]["service"]+")";
						$("#service").append($('<option>',{
							value : results[i]["cost"][0]["value"],
							text : text,
							etd : results[i]["cost"][0]["etd"]
						}));
					}
				},
				
			});
		});

		$("#service").on('change', function(){
			var estimasi = $('option:selected', this).attr('etd');
			shipping = parseInt($(this).val());
			$("#shipping").val(shipping);
			$("#estimasi").html(estimasi +" Hari");
			var totalprice = (quantity_purchase*price)+shipping;
			$("#totalprice").val(totalprice);
		});

		$("#amount").on("change", function(){
			quantity_purchase = $("#amount").val();
			var totalprice = (quantity_purchase*price)+shipping;
			$("#totalprice").val(totalprice);
		});
	});
</script>

<?= $this->endSection() ?>