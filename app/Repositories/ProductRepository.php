<?php

namespace App\Repositories;

use App\Models\Product;
use CrCms\Repository\AbstractRepository;

/**
 * Class ProductRepository
 * @package App\Repositories
 */
class ProductRepository extends AbstractRepository
{
    protected $guard = ['name', 'body', 'price'];

    /**
     * @return Product
     */
    public function newModel(): Product {
        return app(Product::class);
    }
}
