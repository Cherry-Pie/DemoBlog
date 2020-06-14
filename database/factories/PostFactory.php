<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $filename = 'post-'. rand(1, 6) .'.jpg';

    $paragraphWrapper = function ($paragraph) {
        return '<p>'. $paragraph .'</p>';
    };

    return [
        'title' => [
            'en' => $faker->sentence(9),
            'es' => $faker->sentence(8),
        ],
        'content' => [
            'en' => implode('', array_map($paragraphWrapper, $faker->paragraphs(5))),
            'es' => implode('', array_map($paragraphWrapper, $faker->paragraphs(6))),
        ],
        'published_at' => $faker->unixTime,
        'is_published' => $faker->boolean,
        'preview_image' => [
            'storage' => [
                'disk' => 'public',
                'is_encoded' => false,
            ],
            'crop' => [
                'width' => null,
                'height' => null,
                'x' => null,
                'y' => null,
                'rotate' => null,
                'rotate_background' => null,
            ],
            'sources' => [
                'original' => $filename,
                'cropped' => $filename,
            ],
        ],
    ];
});
