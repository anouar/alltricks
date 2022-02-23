<?php

namespace App\Dao;

require_once '../../vendor/autoload.php';

use App\Helpers\DbConnection;


class ArticleDao {

    private $db;

    function __construct() {
        $this->db = new DbConnection();
    }

    public function getArticlesFromDB(){
        $sql = "SELECT a.name,s.name as sourceName,a.content FROM article a, source s where s.id = a.source_id ORDER BY a.id DESC";
        $res = $this->db->fetchAllObjects($sql, array());

        if (!empty($res)) {
           return $res;
        }

        return FALSE;
    }
}
?>
