<?php
namespace App\Service;
use App\Config\Config;
require_once 'App\Config\Config.php';

class RssAgregator
{
    public function appendRss(){
        if(@simplexml_load_string(file_get_contents(RSS_URL))){
            return simplexml_load_string(file_get_contents(RSS_URL));
        }else{
           return false;
        }
    }
}
