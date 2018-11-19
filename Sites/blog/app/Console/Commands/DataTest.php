<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DataTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this is a command test';

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
        //php artisan make:command SendEmails
//        $name = $this->anticipate('What is your name?', ['Taylor', 'Dayle']);//用户输入补全
//        $name = $this->choice('what is your name?',['T',"B"],0);//提供预选项，用户选择的索引，不选择输出默认索引对应的值
//        dump($name);
/*        //将输出发送到控制台
        $this->info('this is a info level');
        $this->line('this is a line level');
        $this->comment('this is a comment level');
        $this->question('this is a question level');
        $this->error('this is a error level');*/
        //向控制台输出表格
        $headers =['Name','Email'];
        $users =[
            ['caoxiang','keephp@163.com'],
            ['dp','dp@163.com']
        ];
        $this->table($headers,$users,'compact');
        //进度条
/*        $arr =[1,2,3];
        $bar = $this->output->createProgressBar(count($arr));
        foreach($arr as $k=>$value){
            $bar->advance();
            sleep(3);
        }
        $bar->finish();
        $this->info("\n task finished!!!");*/
        //非client执行artisan命令，需要通过Artisan门面的call方法

//        $this->info('test not client call');
    }
}
