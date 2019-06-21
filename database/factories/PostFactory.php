<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(mt_rand(3,6)),
        'subtitle' => $faker->sentence(mt_rand(3,6)),
        'content_raw'=> join("\n\n", $faker->paragraphs(mt_rand(3, 6))),
        'page_image' => $faker->imageUrl(),
        'published_at' => $faker->dateTimeBetween('-1 month', '+3 days'),
        'meta_description'=>$faker->sentence(mt_rand(1,2)),
        'is_draft'=>0
    ];
});
