<?php namespace App\Models;

use CodeIgniter\Model;

class ItemsModel extends Model
{
	protected $table = 'tb_items';
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'name','price','stock','image','createddate','createdby','updateddate','updatedby'
	];
	protected $returnType = 'App\Entities\Items';
	protected $useTimestamps = false;
}