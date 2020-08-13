<?php

use Hdkhoasgt\DemoPackage\Models\MessageLog;
use Faker\Generator as Faker;

$factory->define(MessageLog::class, function (Faker $faker) {
    return [
        'message' => $faker->sentence,
    ];
});
