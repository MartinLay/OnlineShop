<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h4>Transaction No <?= $transaction->id_trans ?></h4>
<table class="table">
	<tr>
		<td>Product</td>
		<td><?= $transaction->name ?></td>
	</tr>
	<tr>
		<td>Buyer</td>
		<td><?= $transaction->username ?></td>
	</tr>
	<tr>
		<td>Address</td>
		<td><?= $transaction->address ?></td>
	</tr>
	<tr>
		<td>Amount</td>
		<td><?= $transaction->amount ?></td>
	</tr>
	<tr>
		<td>Total Price</td>
		<td><?= $transaction->totalprice ?></td>
	</tr>
</table>
<?= $this->endSection() ?>