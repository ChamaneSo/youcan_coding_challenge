<?php


namespace App\Repositories;



use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesRepository
{
    public function create(array $data) : Category{
        return Category::create([
            'name' => $data['name'],
            'category_id' => $data['parent']
        ]);
    }

    public function find($id) : ?Category{
        return Category::all()->find($id);
    }

    public function delete($id) : bool{
        return  $this->find($id)->forceDelete();
    }

    public function categoriesIds(){
        return Category::all()->pluck('id');
    }
}
