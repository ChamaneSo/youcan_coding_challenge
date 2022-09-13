<?php


namespace App\Services\Http;


use App\Http\Requests\CreateProductRequest;
use App\Repositories\ProductsRepository;

class ProductsService
{
    public function __construct(ProductsRepository $productsService)
    {
        $this->products = $productsService;
    }

    public function index($sort = 'id'){
        return $this->products->all($sort);
    }

    public function filter($category_id){
        return $this->products->filterByCategory($category_id);
    }

    public function create(CreateProductRequest $request){
        $product = $this->products->create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ] ,
            'media/'.$request->file('image')->store('products'),explode(',' , $request->categories));
        return $product;
    }
}
