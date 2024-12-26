<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategorySeeder extends Seeder
{
    private $category;

    public function __construct(Categories $category_model) {
        $this->category = $category_model;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category=[
            [
                'name'=>'fluty',
                'created_at'=>NOW(),
                'updated_at'=>NOW()
            ],
            [
                'name'=>'Nutty',
                'created_at'=>NOW(),
                'updated_at'=>NOW()
            ],
            [
                'name'=>'Chocolaty',
                'created_at'=>NOW(),
                'updated_at'=>NOW()
            ],
            [
                'name'=>'Caramel',
                'created_at'=>NOW(),
                'updated_at'=>NOW()
            ],
            [
                'name'=>'Herbal',
                'created_at'=>NOW(),
                'updated_at'=>NOW()
            ]
        ];

        $this->category->insert($category);
    }
}
