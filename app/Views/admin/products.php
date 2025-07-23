<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Products extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->checkLogin();
    }

    private function checkLogin()
    {
        if (!session()->get('admin_logged_in')) {
            return redirect()->to('/admin/login');
        }
    }

    public function index()
    {
        $data = [
            'title' => 'Kelola Produk - ShoesStore Admin',
            'products' => $this->productModel->findAll()
        ];

        return view('admin/products/index', $data);
    }

    public function show($id = null)
    {
        $product = $this->productModel->find($id);
        
        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tidak ditemukan');
        }

        $data = [
            'title' => 'Detail Produk - ShoesStore Admin',
            'product' => $product
        ];

        return view('admin/products/show', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Tambah Produk - ShoesStore Admin'
        ];

        return view('admin/products/form', $data);
    }

    public function create()
    {
        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[10]',
            'price' => 'required|numeric|greater_than[0]',
            'category' => 'required',
            'stock' => 'required|integer|greater_than_equal_to[0]',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,2048]'
        ];

        if ($this->validate($rules)) {
            $image = $this->request->getFile('image');
            $imageName = '';
            
            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();
                $image->move(WRITEPATH . '../public/uploads/', $imageName);
                $imageName = base_url('uploads/' . $imageName);
            }

            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'category' => $this->request->getPost('category'),
                'stock' => $this->request->getPost('stock'),
                'image' => $imageName,
                'is_featured' => $this->request->getPost('is_featured') ? 1 : 0
            ];

            $this->productModel->insert($data);
            session()->setFlashdata('success', 'Produk berhasil ditambahkan!');
            return redirect()->to('/admin/products');
        } else {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }
    }

    public function edit($id = null)
    {
        $product = $this->productModel->find($id);
        
        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Produk - ShoesStore Admin',
            'product' => $product
        ];

        return view('admin/products/form', $data);
    }

    public function update($id = null)
    {
        $product = $this->productModel->find($id);
        
        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tidak ditemukan');
        }

        $rules = [
            'name' => 'required|min_length[3]|max_length[255]',
            'description' => 'required|min_length[10]',
            'price' => 'required|numeric|greater_than[0]',
            'category' => 'required',
            'stock' => 'required|integer|greater_than_equal_to[0]'
        ];

        if ($this->validate($rules)) {
            $data = [
                'name' => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price' => $this->request->getPost('price'),
                'category' => $this->request->getPost('category'),
                'stock' => $this->request->getPost('stock'),
                'is_featured' => $this->request->getPost('is_featured') ? 1 : 0
            ];

            $image = $this->request->getFile('image');
            if ($image && $image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();
                $image->move(WRITEPATH . '../public/uploads/', $imageName);
                $data['image'] = base_url('uploads/' . $imageName);
            }

            $this->productModel->update($id, $data);
            session()->setFlashdata('success', 'Produk berhasil diupdate!');
            return redirect()->to('/admin/products');
        } else {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }
    }

    public function delete($id = null)
    {
        $product = $this->productModel->find($id);
        
        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk tidak ditemukan');
        }

        $this->productModel->delete($id);
        session()->setFlashdata('success', 'Produk berhasil dihapus!');
        return redirect()->to('/admin/products');
    }
}