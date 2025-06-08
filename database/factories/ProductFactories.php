<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product as ModelsProduct;
use App\Product;
use Faker\Generator as Faker;

$factory->define(ModelsProduct::class, function (Faker $faker) {
    return [
        'nama' => $faker->word(),
        'deskripsi' => $faker->text(120),
        'harga' => $faker->numberBetween(10000, 100000),
        'gambar' => '',
        'stok' =>  $faker->numberBetween(100, 200),
        'status' => ''
    ];
});
