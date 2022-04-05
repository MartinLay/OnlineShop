<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransactionModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Transaction extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->validation = \Config\Services::validation();
		$this->session = session();
	}

	public function view()
	{
		$id = $this->request->uri->getSegment(3);

		$transactionModel = new \App\Models\TransactionModel();
		$transaction = $transactionModel->select('*, tb_transaction.id AS id_trans')->join('tb_items', 'tb_items.id=tb_transaction.iditems')
					->join('tb_consumen', 'tb_consumen.id=tb_transaction.idconsumen')
					->where('tb_transaction.id', $id)
					->first();

		return view('transaction/view',[
			'transaction'=>$transaction,
		]);
	}

	public function index(){
		$transactionModel = new \App\Models\TransactionModel();
		$model = $transactionModel->findAll();
		return view('transaction/index',[
			'model' => $model,
		]);
	}

	function export()
	{
		
		$transaction_object = new TransactionModel();

		$data = $transaction_object->findAll();

		$file_name = 'data.xlsx';

		$spreadsheet = new Spreadsheet();

		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'Buyer');
		$sheet->setCellValue('B1', 'Product');
		$sheet->setCellValue('C1', 'Address');
		$sheet->setCellValue('D1', 'Amount');
		$sheet->setCellValue('E1', 'Total Price');
		$sheet->setCellValue('F1', 'Transaction Date');

		$count = 2;

		foreach($data as $row)
		{
			$sheet->setCellValue('A' . $count, $row->idconsumen);
			$sheet->setCellValue('B' . $count, $row->iditems);
			$sheet->setCellValue('C' . $count, $row->address);
			$sheet->setCellValue('D' . $count, $row->amount);
			$sheet->setCellValue('E' . $count, $row->totalprice);
			$sheet->setCellValue('F' . $count, $row->created_date);

			$count++;
		}

		$writer = new Xlsx($spreadsheet);

		$writer->save($file_name);

		header("Content-Type: application/vnd.ms-excel");

		header('Content-Disposition: attachment; filename="' . basename($file_name) . '"');

		header('Expires: 0');

		header('Cache-Control: must-revalidate');

		header('Pragma: public');

		header('Content-Length:' . filesize($file_name));

		flush();

		readfile($file_name);

		exit;
	}

}	