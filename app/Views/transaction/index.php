<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6"><h1>Transaction Data</h1></div>
                    <div class="col-md-6" align="right">
                        <a href="<?php echo base_url('transaction/export'); ?>" class="btn btn-success">Export</a>
                    </div>
                </div>
            </div>
            </div>         
<table class="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Product</th>
			<th>Buyer</th>
			<th>Address</th>
			<th>Qty</th>
			<th>Total Price</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($model as $index=>$transaction): ?>
			<tr>
				<td><?= $transaction->id ?></td>
				<td><?= $transaction->iditems ?></td>
				<td><?= $transaction->idconsumen ?></td>
				<td><?= $transaction->address ?></td>
				<td><?= $transaction->amount ?></td>
				<td><?= $transaction->totalprice ?></td>
				<td>
					<a href="<?= site_url('transaction/view/'.$transaction->id) ?>" class="btn btn-primary">View</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<?= $this->endSection() ?>