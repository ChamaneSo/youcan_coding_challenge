<?php


namespace App\Repositories;


use App\Models\Product;

class ProductsRepository
{
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categories = $categoriesRepository;
    }

    public function all($sort='id'){
        return Product::orderBy($sort)->paginate(20);
    }

    public function create(array $date,string $path ,array $categories) : Product{
        $product = Product::create([
            'name' => $date['name'],
            'description' => $date['description'],
            'price' => $date['price'],
            'image' => $path
        ]);
        $product->categories()->attach($categories);
        return $product;
    }

    public function find($id) : ?Product{
        return Product::all()->find($id);
    }

    public function delete($id) : bool{
        return $this->find($id)->forceDelete();
    }

    public function filterByCategory($category_id , $sort='id'){
        $this->categories->find($category_id)->products()->orderBy($sort)->paginate(20);
    }

}
