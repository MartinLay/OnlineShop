<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table = 'tb_consumen';
	protected $primaryKey = 'id';
	protected $allowedFields = [
		'username','password','salt', 'avatar','role','createdby','createddate','updateddate','updatedby'
	];
	protected $returnType = 'App\Entities\User';
	protected $useTimestamps = false;
}