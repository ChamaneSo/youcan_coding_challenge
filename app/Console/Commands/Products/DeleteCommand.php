<?php

namespace App\Console\Commands\Products;

use App\Repositories\ProductsRepository;
use App\Services\Console\ProductsService;
use Illuminate\Console\Command;

class DeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:delete {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command allows to delete a product';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ProductsService $productsService)
    {
        $productsService->delete($this);
    }
}
