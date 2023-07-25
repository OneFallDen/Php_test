<?php

    header('Access-Control-Allow-Headers:*');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: *');
    header('Access-Control-Allow-Credentials: true');
    header('Content-type: json/application');

    require('func.php');

    $method = $_SERVER['REQUEST_METHOD'];

    $q = $_SERVER['REQUEST_URI'];

    $params = explode('/', $q);

    switch($method){

        case 'GET':
            switch($params[2]){

                case 'users':
                    if(isset($params[3])){
                        if(isset($params[4])){
                            switch($params[4]){
                                case 'posts':
                                    get_users_posts($params[3]);
                                    break;
                                case 'todos':
                                    get_users_todos($params[3]);
                                    break;
                            }
                        }
                        else{
                            get_user($params[3]);
                        }
                    }
                     break;
                break;
            }        

        case 'POST':
            
            switch($params[2]){
                case 'posts':
                            add_post($_POST);
                        break;
            }
            break;

        case 'PUT':

            switch($params[2]){
                case 'posts':
                    if(isset($params[3])){
                        $put_data = file_get_contents('php://input');
                        $p_data = explode('&', $put_data);
                        foreach($p_data as $value){
                            $v = explode('=', $value);
                            if($v[0] == 'title' || $v[0] == 'body'){
                                $data[$v[0]] = $v[1];
                            }
                            else if ($v[0] == 'id' || $v[0] == 'userId')
                                $data[$v[0]] = (int)$v[1];
                        }
                        if(isset($data['title']) && isset($data['body']) && isset($data['id']) && isset($data['userId'])){
                            if($params[3] == $data['id']){
                                update_post($data);
                            }
                            else{
                                echo 'Post id don`t match';
                            }
                        }
                        else{
                            echo 'Bad request body';
                        }
                    }
                    break;
                break;
            }
        
        case 'DELETE':
            if (isset($params[3])){
                delete_post($params[3]);
            }
            break;

    }
?>