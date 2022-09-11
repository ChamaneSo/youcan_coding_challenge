<?php

namespace App\Console\Commands\Categories;

use App\Services\Console\CategoriesService;
use Illuminate\Console\Command;

class CreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'category:create {name} {--parent=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command allow to create a category';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(CategoriesService $categoriesService)
    {
        $categoriesService->create($this);
    }
}
