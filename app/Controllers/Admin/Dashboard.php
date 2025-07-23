<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\ArticleModel;

class Dashboard extends BaseController
{
    protected $productModel;
    protected $articleModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->articleModel = new ArticleModel();
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
        $db = \Config\Database::connect();
        
        $data = [
            'title' => 'Dashboard Admin - ShoesStore',
            'total_products' => $this->productModel->countAll(),
            'total_articles' => $this->articleModel->countAll(),
            'recent_contacts' => $db->table('contacts')
                                  ->orderBy('created_at', 'DESC')
                                  ->limit(5)
                                  ->get()
                                  ->getResult()
        ];

        return view('admin/dashboard', $data);
    }
}