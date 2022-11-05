<?php

namespace app\models;

use app\core\model\Model;

class Product extends Model
{
    public ?string $id = null;
    public ?string $brand = null;
    public ?string $name = null;
    public ?float $price = null;
    public ?float $discount_price = null;
    public ?string $img = null;
    public ?int $views = null;
    public ?float $rating = null;
    public ?string $ram = null;
    public ?string $color = null;
    public ?string $storage = null;


    protected static function tableName(): string
    {
        return 'products';
    }

    protected function attributes(): array
    {
        return [
            "brand",
            "name",
            "price",
            "discount_price",
            "img",
            "created_at",
            "views",
            "rating",
            "ram",
            "color",
            "storage",
        ];
    }
}