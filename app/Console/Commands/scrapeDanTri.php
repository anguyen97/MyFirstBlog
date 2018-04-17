<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Goutte;
use App\Post;

class scrapeDanTri extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:dantri';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $categories = [
        'xa-hoi.htm',
    ];

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
        foreach ($this->categories as $category) {
            $l = env("DAN_TRI")."/".$category;
            $crawler = Goutte::request('GET',$l);
            $linkPosts = $crawler->filter('a.fon6')->each(function($node){
                return $node->attr('href');
            });

            foreach ($linkPosts as $link) {
                // print(env("DAN_TRI".$link));
                $l = env("DAN_TRI").$link;
                self::scapePost($l);
            }
        }
        
    }


    public static function scapePost($url)
    {
        print($url);
        $crawler = Goutte::request('GET', $url);

        $title = $crawler->filter('h1.fon31.mgb15')->each(function($node){
            return $node->text();
        });

        if (isset($title[0])) {
            $title = $title[0];
        }

        $slug = str_slug($title);

        $description = $crawler->filter('h2.fon33.mt1.sapo')->each(function($node){
            return $node->text();
        });

        

        if (isset($description[0])) {
            $description = $description[0];
        }

        $thumbnail = $crawler->filter('')->each(function($node){
            return $node->attr('src');
        })[0];

        $content = $crawler->filter('#divNewsContent')->each(function($node){
            return $node->text();
        });

        if (isset($content[0])) {
            $content = $content[0];
        }

        $data = [
            'title' => $title,
            'slug' => $slug,
            'description' => $description,
            'thumbnail' => $thumbnail,
            'content' => $content,
        ];

        
        Post::create($data);

        // print("success");
    }
}
