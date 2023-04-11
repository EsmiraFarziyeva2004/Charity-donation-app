<?php 
    namespace Organization;
    use \Database\Database as DB;

    class Community extends DB{

        public function __construct(){
            parent::__construct();
        }

        public function addCommunity($arr){
            $add = parent::add("community", $arr);
            return $add;
        }

        public function addHistory($arr){
            $add = parent::add("history", $arr);
            return $add;
        }

        public function getAllCommunity(){
            $community = parent::get("*", "community");
            return $community;
        }

        public function getCommunity($id){
            $community = parent::get("*", "community", " id='$id'");
            return $community;
        }

        public function getHistory($user_id){
            $history = parent::get("*", "history", " user_id='$user_id'");
            return $history;
        }

        public function getHistoryOrg($user_id){
            $history = parent::get("*", "history", " user2_id='$user_id'");
            return $history;
        }

        public function updateCommunity($arr, $id){
            $update = parent::set("community", $arr, " id='$id'");
            return $update;
        }

        public function searchCommunity($word){
            $word = trim($word);
            $community_result = parent::get("*", "community", " name LIKE '%$word%'");
            return $community_result;
        }

    }
?>