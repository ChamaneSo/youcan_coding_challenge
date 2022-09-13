<?php


namespace App\Services\Console;


use App\Console\Commands\Products\CreateCommand;
use App\Console\Commands\Products\DeleteCommand;
use App\Repositories\CategoriesRepository;
use App\Repositories\ProductsRepository;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class ProductsService
{
    public function __construct(ProductsRepository $productsRepository, CategoriesRepository $categoriesRepository)
    {
        $this->categories = $categoriesRepository;  $this->products = $productsRepository;
    }

    public function create(CreateCommand $command){
        if (collect($command->option('category'))->diff($this->categories->categoriesIds())->count() != 0)
        {
            $command->error('One or multiple given categories not found');
            return ;
        }
        if (!\Illuminate\Support\Facades\File::exists($command->argument('image')))
        {
            $command->error('The provided image path is not exists');
            return ;
        }
        $path = 'media/'.Storage::putFile('products', new File($command->argument('image')));
        $this->products->create([
            'name' => $command->argument('name'),
            'description' => $command->argument('description'),
            'price' => $command->argument('price'),
        ] , $path , $command->option('category'));
        $command->info('The product "'. $command->argument('name').'" has been created successfully!!');
    }

    public function delete(DeleteCommand $command){
        if (!$this->products->find($command->argument('id')))
        {
            $command->error('The provided product not found');
            return ;
        }
        $this->products->delete($command->argument('id'));
        $command->info('The product has been deleted successfully !!');
    }
}
