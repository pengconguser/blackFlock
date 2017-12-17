<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
	    $category=Category::firstOrNew([
               'name'=>'larave随笔'
	    ]);
		$category->description = '记载在学习laravel的过程中踩过的坑';
		$category->save();

		$category=Category::firstOrNew([
               'name'=>'公告'
	    ]);
		$category->description = '小社区当中的公告';
		$category->save();

		$category=Category::firstOrNew([
               'name'=>'larave教程'
	    ]);
		$category->description = '一些关于laravel教程';
		$category->save();

		$category=Category::firstOrNew([
               'name'=>'redis'
	    ]);
		$category->description = '关于redis技术';
		$category->save();

        
		$category=Category::firstOrNew([
               'name'=>'mysql'
	    ]);
		$category->description = '有关于mysql的各种技术';
		$category->save();
        

		$category=Category::firstOrNew([
               'name'=>'liunx环境'
	    ]);
		$category->description = 'liunx下环境配置,运维,数据加密等';
		$category->save();

	}
}
