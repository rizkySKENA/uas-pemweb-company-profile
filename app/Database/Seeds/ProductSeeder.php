<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Nike Air Force 1',
                'description' => 'Sepatu Nike Air Force 1 classic dengan desain timeless yang cocok untuk berbagai aktivitas sehari-hari.',
                'price' => 1299000,
                'image' => 'https://via.placeholder.com/300x200/ffffff/000000?text=Nike+Air+Force+1',
                'category' => 'Sneakers',
                'stock' => 25,
                'is_featured' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Adidas Stan Smith',
                'description' => 'Sepatu tennis klasik Adidas Stan Smith dengan upper kulit putih dan aksen hijau yang ikonik.',
                'price' => 999000,
                'image' => 'https://via.placeholder.com/300x200/ffffff/000000?text=Adidas+Stan+Smith',
                'category' => 'Sneakers',
                'stock' => 30,
                'is_featured' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Converse Chuck Taylor',
                'description' => 'Sepatu canvas tinggi Converse Chuck Taylor All Star yang legendaris dengan berbagai pilihan warna.',
                'price' => 699000,
                'image' => 'https://via.placeholder.com/300x200/ffffff/000000?text=Converse+Chuck+Taylor',
                'category' => 'Sneakers',
                'stock' => 40,
                'is_featured' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Vans Old Skool',
                'description' => 'Sepatu skate Vans Old Skool dengan garis samping yang khas dan konstruksi yang tahan lama.',
                'price' => 849000,
                'image' => 'https://via.placeholder.com/300x200/ffffff/000000?text=Vans+Old+Skool',
                'category' => 'Sneakers',
                'stock' => 20,
                'is_featured' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Puma Suede Classic',
                'description' => 'Sepatu suede klasik Puma dengan desain retro yang cocok untuk gaya kasual sehari-hari.',
                'price' => 799000,
                'image' => 'https://via.placeholder.com/300x200/ffffff/000000?text=Puma+Suede+Classic',
                'category' => 'Sneakers',
                'stock' => 15,
                'is_featured' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'New Balance 574',
                'description' => 'Sepatu running New Balance 574 dengan teknologi ENCAP midsole untuk kenyamanan maksimal.',
                'price' => 1199000,
                'image' => 'https://via.placeholder.com/300x200/ffffff/000000?text=New+Balance+574',
                'category' => 'Running',
                'stock' => 18,
                'is_featured' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('products')->insertBatch($data);
    }
}