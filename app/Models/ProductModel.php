<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'description', 'price', 'image', 'category', 'is_featured', 'stock'
    ];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function getFeaturedProducts($limit = 6)
    {
        return $this->where('is_featured', 1)
                    ->limit($limit)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function getProducts($limit = null, $offset = null)
    {
        $builder = $this->builder();
        
        if ($limit) {
            $builder->limit($limit, $offset);
        }
        
        return $builder->orderBy('created_at', 'DESC')->get()->getResult();
    }
}