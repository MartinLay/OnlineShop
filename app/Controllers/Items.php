<?php
namespace App\Controllers;

class Items extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->validation = \Config\Services::validation();
		$this->session = session();
	}

	public function index()
	{
		$itemsModel = new \App\Models\ItemsModel();
		$itemss = $itemsModel->findAll();

		return view('items/index',[
			'itemss'=>$itemss,
		]);
	}

	public function view()
	{
		$id = $this->request->uri->getSegment(3);

		$itemsModel = new \App\Models\ItemsModel();

		$items = $itemsModel->find($id);

		return view('items/view',[
			'items' => $items,
		]);
	}

	public function create()
	{
		if($this->request->getPost())
		{
			//if there is post data
			$data = $this->request->getPost();
			$this->validation->run($data, 'items');
			$errors = $this->validation->getErrors();

			if(!$errors)
			{
				//save data
				$itemsModel = new \App\Models\ItemsModel();

				$items = new \App\Entities\Items();

				$items->fill($data);
				$items->image = $this->request->getFile('image');
				$items->createdby = $this->session->get('id');
				$items->createddate = date("Y-m-d H:i:s");

				$itemsModel->save($items);

				$id = $itemsModel->insertID();

				$segments = ['items', 'view', $id];
				// /items/view/$id
				return redirect()->to(site_url($segments));

			}
		}
		return view('items/create');
	}

	public function update()
	{
		$id = $this->request->uri->getSegment(3);

		$itemsModel = new \App\Models\ItemsModel();

		$items = $itemsModel->find($id);

		if($this->request->getPost())
		{
			$data = $this->request->getPost();
			$this->validation->run($data, 'itemsupdate');
			$errors = $this->validation->getErrors();

			if(!$errors)
			{
				$b = new \App\Entities\Items();
				$b->id = $id;
				$b->fill($data);

				if($this->request->getFile('image')->isValid()){
					$b->image = $this->request->getFile('image');
				}

				$b->updated_by = $this->session->get('id');
				$b->updated_date = date("Y-m-d H:i:s");

				$itemsModel->save($b);
				
				$segments = ['Items','view',$id];

				return redirect()->to(base_url($segments));
			}
		}

		return view('items/update',[
			'items' => $items,
		]);
	}

	public function delete()
	{
		$id = $this->request->uri->getSegment(3);

		$modelItems = new \App\Models\ItemsModel();
		$delete = $modelItems->delete($id);

		return redirect()->to(site_url('items/index'));
	}
}