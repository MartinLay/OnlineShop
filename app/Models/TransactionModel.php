<?php namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
	protected $table = 'tb_transaction';
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'iditems', 'idconsumen', 'amount', 'totalprice', 'address', 'shipping', 'status', 'created_date','created_by','updated_date','updated_by'
	];
	protected $returnType = 'App\Entities\Transaction';
	protected $useTimestamps = false;
}