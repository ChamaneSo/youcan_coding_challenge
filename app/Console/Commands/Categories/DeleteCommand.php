<?php

namespace App\Console\Commands\Categories;

use App\Repositories\CategoriesRepository;
use App\Services\Console\CategoriesService;
use Illuminate\Console\Command;

class DeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command allows to you to delete a category';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(CategoriesService $categoriesService)
    {
       $categoriesService->delete($this);
    }
}
