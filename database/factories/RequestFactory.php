<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Request;
use App\User;
use App\SellerCategory;
use Faker\Generator as Faker;

$factory->define(Request::class, function (Faker $faker) {
    // $table->bigIncrements('id');
    // $table->bigInteger('user_id');
    // $table->string('phone');
    // $table->string('address');
    // $table->tinyInteger('seller_category_id');
    // $table->boolean('status');
    // $table->timestamps();
    return [
        'user_id' => function() {
            // $users = User::all()->toArray();
            // $count = count($users);
            // $rand_index = rand(0, $count - 1);
            // $user = $users[$rand_index];
            // return $user['id'];

            $users = User::all();
            $count = $users->count();

            // find an user with no request
            do {
                $rand_index = rand(0, $count - 1);
                $user = $users[$rand_index];
            } while($user->request != NULL);

            return $user->id;
        },
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'seller_category_id' => function() {
            $categories = SellerCategory::all()->toArray();
            $count = count($categories);
            $rand_index = rand(0, $count - 1);
            $category = $categories[$rand_index];
            return $category['id'];
        },
        'status' => rand(0, 1) == 1 ? true : false,
    ];
});
