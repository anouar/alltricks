<?php

namespace App\Helpers;
use App\Config\Config;

require_once 'App/Config/config.php';
/**
 * Description of DBConnetion
 *
 * @author Anouar SOUID
 */
class DBConnetion {
    protected static $instance = null;
    //# retourner l'instance en cours
    public static function instance() {
        if (self::$instance === null) {
            try {
                self::$instance = new \PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
                self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$instance;
    }

    //# retourner plusieurs lignes
    public static function fetchAllObjects($query, $values = NULL) {
        try {
            $pre = self::instance()->prepare($query);
            if (isset($values))
                $pre->execute($values);
            else
                $pre->execute();
            return $pre->fetchAll(\PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

?>
