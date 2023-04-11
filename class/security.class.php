<?php 
    namespace Security;

    class Security{
        public function __construct(){

        }

        public function filterRequest($string){
            $string = trim(strip_tags(addslashes($string)));
            return $string;
        }

        public static function checkHTTPS()
        {
            if (isset($_SERVER['HTTP_HOST'])) {
                return ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443)
                   || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') || (!empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] === 'on');
            }

            return false;
        }

        public function whitelist($value, $allowed) {
            if (empty($value)) {
                return $allowed[0];
            }
            $key = array_search($value, $allowed, true);
            if ($key === false) { 
                return $this->setException(HACKING_MSG); 
            } else {
                return $value;
            }
        }

        public function setException($msg){
            return die($msg);
        }

        public function getCSRFToken(){
            if (empty($_SESSION['csrf_token'])) {
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            }
            return $_SESSION['csrf_token'];
        }

        public function generateHostSession($host){
            if (empty($_SESSION['host'])) {
                $_SESSION['host'] = $host;
            }
            return $_SESSION['host'];
        }

        public function secureRequestMethod($var){
            if (preg_match("/[^A-Za-z0-9'-]/",$var)) {
                $this->setException(HACKING_MSG);
            }else{
                return $var;
            }
        }

        public function blockRefresh($second){
            $uri = md5($_SERVER['REQUEST_URI']);
            $exp = $second;
            $hash = $uri .'|'. time();
            if (!isset($_SESSION['ddos'])) {
                $_SESSION['ddos'] = $hash;
            }
            list($_uri, $_exp) = explode('|', $_SESSION['ddos']);
            if ($_uri == $uri && time() - $_exp < $exp) {
                //header('HTTP/1.1 503 Service Unavailable');
                $this->setException(DDOS_MSG);
            }
            $_SESSION['ddos'] = $hash;
        }

    }
?>