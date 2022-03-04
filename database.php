<?php
    class database{
        private static $host = "localhost";
        private static $port = 3306;
        private static $name = "central_server";
        private static $db_usr = "root";
        private static $db_psw = "root";
        private static $charset = "utf8";

        public static $db = null;
        public static $sql = "";
        public static $rs = null;

        private static function getDb() {
            if(!self::$db) {
                self::$db = new PDO (
                    "mysql:host=" . self::$host . ";
                    port=" . self::$port . ";
                    dbname=" . self::$name . ";
                    charset=" . self::$charset,
                    self::$db_usr,
                    self::$db_psw
                );
            }
            return self::$db;
        }

        public static function getAll($qr, $pr = array()) {
            self::$rs = self::getDb()->prepare($qr);
            self::$rs->execute((array)$pr);
            return self::$rs->fetchAll(PDO::FETCH_ASSOC);
	    }
    }
?>