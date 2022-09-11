<?php

namespace App\Console\Commands\Products;

use App\Repositories\CategoriesRepository;
use App\Repositories\ProductsRepository;
use App\Services\Console\ProductsService;
use Illuminate\Console\Command;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class CreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:create {name} {description} {price} {image} {--category=*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command allows to create a product';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ProductsService $productsService)
    {
        $productsService->create($this);
    }
}
