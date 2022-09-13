<?php


namespace App\Services\Http;


use App\Repositories\CategoriesRepository;

class CategoriesService
{
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categories = $categoriesRepository;
    }

    public function list(){
        return $this->categories->all();
    }
}
