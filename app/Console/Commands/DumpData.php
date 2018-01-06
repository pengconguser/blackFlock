<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DumpData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dump:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '我要开始备份数据库了！！！6不6';

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
        $this->dumpData();
    }
     
    //此方法会备份数据库文件至 /data/sqlfiles
    public function dumpData()
    {
          shell_exec('cd /data/www/hello_laravel/ && bash dumpsql.sh');
    }
}
