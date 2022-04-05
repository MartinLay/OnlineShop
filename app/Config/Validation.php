<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    public $register = [
		'username' => [
			'rules' => 'required|min_length[5]',
		],
		'password' => [
			'rules' => 'required',
		],
		'repeatPassword'=>[
			'rules' => 'required|matches[password]',
		],
	];

    public $register_errors = [
		'username' => [
			'required' =>'{field} Must be filled',
			'min_length' => '{field} Minimal 5 Karakter',
		],
		'password' => [
			'required' => '{field} Must be filled',
		],
		'repeatPassword'=>[
			'required' => '{field} Must be filled',
			'matches' => '{field} Does not Match Password'
		],
	];

    public $login = [
		'username' => [
			'rules' => 'required|min_length[5]',
		],
		'password' => [
			'rules' => 'required',
		],
	];

	public $transaction = [
		'iditems' => [
			'rules' => 'required',
		],
		'idconsumen' => [
			'rules' => 'required',
		],
		'amount'=> [
			'rules' => 'required',
		],
		'totalprice'=> [
			'rules' => 'required',
		],
		'address'=> [
			'rules' => 'required',
		],
		'shipping'=> [
			'rules' => 'required',
		]
	];

	public $login_errors = [
		'username' => [
			'required' =>'{field} Must be filled',
			'min_length' => '{field} Minimal 5 Karakter',
		],
		'password' => [
			'required' => '{field} Must be filled',
		],
	];

	public $items = [
		'name' => [
			'rules' => 'required|min_length[3]',
		],
		'price' => [
			'rules' => 'required|is_natural',
		],
		'stock' => [
			'rules' => 'required|is_natural',
		],
		'image' => [
			'rules' => 'uploaded[image]',
		]
	];

	public $items_errors = [
		'name' => [
			'required' => '{field} Must be filled',
			'min_length' => '{field} Minimum 3 characters',
		],
		'price' => [
			'required' => '{field} Must be filled',
			'is_natural' => '{field} Cannot be Negative',
		],
		'stock' => [
			'required' => '{field} Must be filled',
			'is_natural' => '{field} Cannot be Negative',
		],
		'image' => [
			'uploaded' => '{field} Must be upload',
		]
	];

	public $itemsupdate = [
		'name' => [
			'rules' => 'required|min_length[3]',
		],
		'price' => [
			'rules' => 'required|is_natural',
		],
		'stock' => [
			'rules' => 'required|is_natural',
		],
	];

	public $itemsupdate_errors = [
		'name' => [
			'required' => '{field} Must be filled',
			'min_length' => '{field} Minimum 3 characters',
		],
		'price' => [
			'required' => '{field} Must be filled',
			'is_natural' => '{field} Cannot be Negative',
		],
		'stock' => [
			'required' => '{field} Must be filled',
			'is_natural' => '{field} Cannot be Negative',
		],
	];

}
