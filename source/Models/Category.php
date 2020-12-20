<?php


namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

/**
 * Class Category
 * @package Source\Models
 */
class Category extends DataLayer
{
    /**
     * Category constructor.
     */
    public function __construct()
    {
        parent::__construct("categorias", ["titulo"]);
    }

}