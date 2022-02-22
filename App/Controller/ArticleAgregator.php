<?php

namespace App\Controller;
use App\Dao\ArticleDao;
use App\Service\RssAgregator;
require_once 'App\Dao\ArticleDao.php';
require_once 'App\Service\RssAgregator.php';

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
