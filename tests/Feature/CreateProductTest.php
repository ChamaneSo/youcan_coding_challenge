<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        Storage::fake('products');
        $file = UploadedFile::fake()->image('test_product.jpg');
        $response = $this->post('/products' , [
            '_token' => csrf_token(),
            'name' => 'Nike' , 'description' => 'Amazing description' , 'price' => 1500,
            'image' => $file,
            'categories' => '1,3'
        ]);
        $response->assertStatus(201);
    }
}
