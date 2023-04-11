<?php 
    namespace Users;
    use \Database\Database as DB;

    class Accounts extends DB{

        public function __construct(){
            parent::__construct();
        }

        public function addUser($arr){
            $add = parent::add("users", $arr);
            return $add;
        }

        public function checkEmail($email){
            $email  = trim($email);
            $user   = parent::get("*", "users", " email='$email'");
            return $user;
        }

        public function checkUsername($username){
            $username   = trim($username);
            $user       = parent::get("*", "users", " username='$username'");
            return $user;
        }

        public function loginUser($username, $password){
            $username   = trim($username);
            $password   = trim($password);
            $user       = parent::get("*", "users", " username='$username' AND password='$password'");
            return $user;
        }

        public function getUser($user_id){
            $user_id   = trim($user_id);
            $user      = parent::get("*", "users", " id='$user_id'");
            return $user;
        }

        public function updateUser($arr, $id){
            $update = parent::set("users", $arr, " id='$id'");
            return $update;
        }

        public function myDonations($user_id){
            $user = parent::get("*", "history", " user_id='$user_id'");
            return $user;
        }

        public function searchCertificate($word){
            $word = trim($word);
            $certificate = parent::get("*", "certificates", " fullname LIKE '%$word%' OR cert_no='$word'");
            return $certificate;
        }

    }
?>