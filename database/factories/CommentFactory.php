<?php

use Faker\Generator as Faker;

$factory->define(\App\Comment::class, function (Faker $faker) {
	//随机取一个月以内的时间.
	$time = $faker->dateTimeThisMonth();

	return [
		'content' => $faker->sentence(),
		'created_at' => $time,
		'updated_at' => $time,
		'user_id' => function () {
			return factory(App\User::class)->create()->id;
		},
	];
});
