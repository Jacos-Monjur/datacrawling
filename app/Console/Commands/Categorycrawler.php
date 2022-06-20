<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\category;
class Categorycrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawler:category';

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
     * @return int
     */
    public function handle()
    {
        // dd('hello');
        // $dom = file_get_html('https://www.truyenngan.com.vn/');
        // $a =$dom->find('#mainmenu .nav li a',0);
        // $a =$dom->find('#mainmenu .nav li a');
        // $dom = file_get_html('https://ofelafoods.com/');
        // $a =$dom->find('.info .row .price  h5 a', 0);
        // $a =$dom->find('.nav .dropdown ul li a');
        $dom = file_get_html('https://www.somoynews.tv/');
        $a =$dom->find('.top a b');
        // dd($a->href);
        // dd($a->innertext);

        $category = array();
        foreach ($a as $key => $value) {
           $category['name']=$value->innertext;
           $category['parent_id']=0;
           $category['left']=0;
           $category['right']=0;
           $category['slug']=$value->href;

           $cat[] =  $category;
        }

        foreach ($cat as $key => $value) 
        {
            category::create($value);
        }

    }
}
