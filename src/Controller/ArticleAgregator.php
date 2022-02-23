<?php

namespace App\Controller;
require_once '../../vendor/autoload.php';
use App\Dao\ArticleDao;
use App\Service\RssAgregator;


class ArticleAgregator {

    private $articleDao;

    public function __construct(){
        $this->articleDao = new ArticleDao();
        $this->rssAgregator = new RssAgregator();
    }
    
    public function articleByDB() {
        $results = $this->articleDao->getArticlesFromDB();

        return $results;
    }
    public function articleByRss() {
        $results = $this->rssAgregator->appendRss();

        return $results;
    }
}
