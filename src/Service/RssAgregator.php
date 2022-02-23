<?php
namespace App\Service;
require_once '../../vendor/autoload.php';
require_once '../Config/config.php';

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
