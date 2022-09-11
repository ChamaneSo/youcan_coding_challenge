<?php


namespace App\Services\Console;
use App\Console\Commands\Categories\CreateCommand;
use App\Console\Commands\Categories\DeleteCommand;

use App\Repositories\CategoriesRepository;

class CategoriesService
{
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        $this->categories = $categoriesRepository;
    }

    public function create(CreateCommand $command){
       if ($command->option('parent') && !$this->categories->find($command->option('parent'))){
            $command->error('the given category parent not found');
            return;
        }
        $category = $this->categories->create([
            'name' => $command->argument('name'),
            'parent' => $command->option('parent') == 'null' ? null :  $command->option('parent')
        ]);
        $command->info('The category "'.$category->name.'" has been created successfully!!');
    }

    public function delete(DeleteCommand $command)
    {
        if (!$this->categories->find($command->argument('id')))
        {
            $command->error('The given category not found');
            return ;
        }
        $this->categories->delete($command->argument('id'));
        $command->info('The category has been deleted successfully!!');
    }
}
