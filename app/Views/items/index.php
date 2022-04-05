<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<h1>Product</h1>
<table class="table">
	<thead>
		<th>No</th>
		<th>Product</th>
		<th>Image</th>
		<th>Price</th>
		<th>Stock</th>
		<th>Action</th>
	</thead>
	<tbody>
		<?php foreach($itemss as $index=>$items): ?>
			<tr>
				<td><?= ($index+1) ?></td>
				<td><?= $items->name ?></td>
				<td>
					<img class="img-fluid" width="200px" alt="image" src="<?= base_url('uploads/'.$items->image) ?>" />
				</td>
				<td> <?= "Rp ".number_format($items->price,0,',','.') ?></td>
				<td><?= $items->stock ?></td>
				<td>
					<a href="<?= site_url('items/view/'.$items->id) ?>" class="btn btn-primary">View</a>
					<a href="<?= site_url('items/update/'.$items->id) ?>" class="btn btn-success">Update</a>
					<a href="<?= site_url('items/delete/'.$items->id) ?>" onclick="return confirm('Delete Data?');" class="btn btn-danger">Delete</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
<?= $this->endSection() ?>