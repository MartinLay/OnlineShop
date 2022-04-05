<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="container">
	<div class="row">
		<?php foreach($model as $m): ?>
			<div class="col-4">
				<div class="card text-center">
					<div class="card-header">
						<span class="text-success"><strong><?= $m->name ?></strong></span>
					</div>
					<div class="card-body">
						<img class="img-thumbnail" style="max-height: 200px" src="<?= base_url('uploads/'.$m->image) ?>" />
						<h5 class="mt-3 text-success"><?= "Rp ".number_format($m->price,2,',','.') ?></h5>
						<p class="text-info">Stock : <?= $m->stock ?></p>
					</div>
					<div class="card-footer">
						<a href="<?= site_url('etalase/buy/'.$m->id)?>" style="width:70%" class="btn btn-success">Buy</a>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>

<?= $this->endSection() ?>