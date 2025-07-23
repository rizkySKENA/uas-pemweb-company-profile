<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\ArticleModel;
use CodeIgniter\Controller;

class Home extends BaseController
{
    protected $productModel;
    protected $articleModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->articleModel = new ArticleModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Beranda - ShoesStore',
            'products' => $this->productModel->getFeaturedProducts(6),
            'articles' => $this->articleModel->getRecentArticles(3)
        ];

        return view('home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'Tentang Kami - ShoesStore'
        ];

        return view('about', $data);
    }

    public function products($page = 1)
    {
        $perPage = 12;
        $products = $this->productModel->paginate($perPage, 'default', $page);
        
        $data = [
            'title' => 'Produk - ShoesStore',
            'products' => $products,
            'pager' => $this->productModel->pager
        ];

        return view('products', $data);
    }

    public function contact()
    {
        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'name' => 'required|min_length[3]',
                'email' => 'required|valid_email',
                'subject' => 'required|min_length[5]',
                'message' => 'required|min_length[10]'
            ];

            if ($this->validate($rules)) {
                $contactData = [
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                    'subject' => $this->request->getPost('subject'),
                    'message' => $this->request->getPost('message'),
                    'created_at' => date('Y-m-d H:i:s')
                ];

                $db = \Config\Database::connect();
                $db->table('contacts')->insert($contactData);

                session()->setFlashdata('success', 'Pesan Anda berhasil dikirim!');
                return redirect()->to('/contact');
            } else {
                session()->setFlashdata('errors', $this->validator->getErrors());
            }
        }

        $data = [
            'title' => 'Kontak - ShoesStore'
        ];

        return view('contact', $data);
    }
}