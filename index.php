<?php 
    include 'system/config.php';
    include 'class/security.class.php';
    include 'class/db.class.php';
    include 'class/accounts.class.php';
    include 'class/community.class.php';

    use Security\Security;
    use Users\Accounts;
    use Organization\Community;

    $sec        = new Security();
    $accounts   = new Accounts();
    $community  = new Community();

    $csrf = $sec->getCSRFToken();

    $p_req = $sec->filterRequest(@$_GET['p_req']);
    $p_req = $sec->secureRequestMethod($p_req);

    if(isset($_GET['c_lead'])){
        $c_req = $sec->filterRequest(@$_GET['c_req']);
        $c_req = $sec->secureRequestMethod($c_req);
    }

    if(!isset($_COOKIE['user'])){
        switch($p_req){

            case 'signup':

                if(!empty(trim(@$_POST['username']))){

                    if(count($accounts->checkEmail($sec->filterRequest($_POST['email']))) > 0){
                        $error['email']     = true;
                        $error_msg['email'] = 'Email exists. Please try other email address';
                    }
                    
                    if(count($accounts->checkUsername($sec->filterRequest($_POST['username']))) > 0){
                        $error['username'] = true;
                        $error_msg['username'] = 'Username exists. Please try other username';
                    }

                    if($sec->filterRequest($_POST['password']) != $sec->filterRequest($_POST['password_again'])){
                        $error['password'] = true;
                        $error_msg['password'] = 'Your passwords do not match';
                    }

                    
                    if(count($error) == 0){
                        $usr_arr = array(
                            "fullname" => $sec->filterRequest($_POST['fullname']),
                            "username" => $sec->filterRequest($_POST['username']),
                            "email"    => $sec->filterRequest($_POST['email']),
                            "password" => $sec->filterRequest($_POST['password']),
                            "type"     => $sec->filterRequest($_POST['account']),
                            "balance"  => $sec->filterRequest($_POST['balance']),
                            "status"   => 1
                        );
                        $accounts->addUser($usr_arr);
                        header('location:'.HOST);
                    }
                    
                }

                include 'pages/auth/signup.php';

                unset($error);
                unset($error_msg);

                break;

            case 'login':

                if(!empty(trim(@$_POST['username'])) && !empty(trim(@$_POST['password']))){
                    
                    $login = $accounts->loginUser($sec->filterRequest($_POST['username']), $sec->filterRequest($_POST['password']));
                                        
                    if(count($login) > 0){

                        $_SESSION['user'] = $login[0]['id'];
                        setcookie('user', $login[0]['id'], time() + (86400 * 30));
                        header('location:'.HOST);

                    }else{
                        $error['login']     = true;
                        $error_msg['login'] = 'Error: Username or password is wrong';
                    }

                }else{
                    $error['login_empty']     = true;
                    $error_msg['login_empty'] = 'Error: Username or password is wrong';
                }

                include 'pages/auth/login.php';

                unset($error);
                unset($error_msg);

                break;
            
            default:
                include 'pages/auth/login.php';
                break;
        }
        exit;
    }

    $user = $accounts->getUser($_COOKIE['user']);

?>

<!DOCTYPE html>
<html lang="az">
    <head>
        <?php include 'layouts/head.php'; ?>
    </head>
    <body class="crm_body_bg">
        

        <?php 
            include 'layouts/navbar.php'; 
        ?>

        <section class="main_content dashboard_part">

            <!-- Menu  -->
            <?php 
                include 'layouts/header.php';
            ?>

            <!-- Main Container -->
            <div class="main_content_iner ">
                <div class="container-fluid p-0">
                    <div class="row ">
                        <?php 
                            switch($p_req){
                                case 'profile':
                                    
                                    if(!empty(trim(@$_POST['username']))){
                                        $usr_arr = array(
                                            "fullname" => $sec->filterRequest($_POST['fullname']),
                                            "username" => $sec->filterRequest($_POST['username']),
                                            "email"    => $sec->filterRequest($_POST['email']),
                                            "password" => $sec->filterRequest($_POST['password']),
                                        );
                                        $update = $accounts->updateUser($usr_arr, $_COOKIE['user']);
                                        
                                        if($update){
                                            $error['update_profile'] = false;
                                            $error_msg['update_profile'] = 'Successfuly updated profile!';
                                        }
                                    }

                                    include 'pages/profile.php';

                                    unset($error);
                                    unset($error_msg);

                                    break;

                                case 'create-community':

                                    if(!empty(trim(@$_POST['name']))){

                                        $target_dir = "uploads/community/";
                                        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
                                        $uploadOk = 1;
                                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                                        $check = getimagesize($_FILES["photo"]["tmp_name"]);

                                        $newfilename = $target_dir.$_COOKIE['user'].'_'.time().'.'.$imageFileType;
                                        
                                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                                            $error['add_community_photo'] = true;
                                            $error_msg['add_community_photo'] = 'File is not an image.';
                                        } else { 
                                            move_uploaded_file($_FILES["photo"]["tmp_name"], $newfilename);
                                        }

                                        $community_arr = array(
                                            "name"          => $sec->filterRequest($_POST['name']),
                                            "description"   => $sec->filterRequest($_POST['description']),
                                            "photo"         => $sec->filterRequest($newfilename),
                                            "user_id"       => $sec->filterRequest($_COOKIE['user'])
                                        );

                                        $addCommunity = $community->addCommunity($community_arr);

                                        if($addCommunity){
                                            $error['add_community'] = false;
                                            $error_msg['add_community'] = 'Community successfuly created!';
                                        }
                                    }

                                    include 'pages/create-community.php';   
                                    break;

                                    case 'all-community':
                                        include 'pages/all-community.php';
                                        break;

                                    case 'history':
                                        include 'pages/history.php';
                                        break;


                                    case 'search-community':
                                        include 'pages/search-community.php';
                                        break;

                                    case 'community':

                                        $thisCommunity = $community->getCommunity($sec->filterRequest($_GET['cid']));

                                        if($_POST){
                                            if(!empty($sec->filterRequest(@$_POST['donate_amount']))){
                                                $arr = array(
                                                    "balance" => ($thisCommunity[0]['balance'] + $sec->filterRequest($_POST['donate_amount']))
                                                );

                                                $history_arr = array(
                                                    "user_id" => $_COOKIE['user'],
                                                    "organization_id" => $thisCommunity[0]['id'],
                                                    "user2_id" => $thisCommunity[0]['user_id'],
                                                    "amount" => $sec->filterRequest($_POST['donate_amount'])
                                                );

                                                $account_arr_donate = array(
                                                    "balance" => ($user[0]['balance'] - $sec->filterRequest($_POST['donate_amount']))
                                                );

                                                $accounts->updateUser($account_arr_donate, $_COOKIE['user']);

                                                $community->addHistory($history_arr);
                                                
                                                if($community->updateCommunity($arr, $sec->filterRequest($_POST['community_id']))){
                                                    $error['donated'] = false;
                                                    $error_msg['donated'] = 'Successfuly donated! Thank You!';
                                                }
                                            }else{
                                                $error['donated_amount'] = true;
                                                $error_msg['donated_amount'] = 'Please fill donate amount input!';
                                            }
                                        }           
                                        
                                        include 'pages/community.php';

                                        break;

                                    case 'logout':
                                        echo '<meta http-equiv="refresh" content="0;url='.HOST.'/logoutuser" />';
                                        break;

                                default:
                                    include 'pages/home.php';
                                    break;
                            }
                        ?>
                    </div>
                </div>
            </div>


        </section>

        <?php include 'layouts/footerJs.php'; ?>
        
    </body>

</html>