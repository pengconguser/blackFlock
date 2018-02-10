<?php

namespace App\Console\Commands;

use App\Article;
use App\Category;
use Illuminate\Console\Command;

class FixData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:data {--article} {--category}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if ($this->option('article')) {
            $this->articleCategory();
        }

        if ($this->option('category')) {
            $this->fix_category();
        }
    }

    //修复一下原本的article对象并没有category关联的问题.
    public function articleCategory()
    {
        $articles = Article::orderBy('id', 'desc')->get();
        foreach ($articles as $article) {
            $article->user_id     = 2;
            $article->category_id = 1;
            $article->update();
            $this->info('已经修正');
        }

    }

    public function fix_category()
    {
        $category =Category::find(2);
        $category->name ="踩坑日记";
        $category->description = '记录自己踩过的坑';
        $category->save();
        $this->info("$category->name 修改成功");
    }
}
