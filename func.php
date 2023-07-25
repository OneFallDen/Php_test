<?php

    function get_user($user_id){
        $url = "https://jsonplaceholder.typicode.com/users/".$user_id;
    
        $ch = curl_init($url);
        $response= curl_exec($ch);
        curl_close($ch);
    }

    function get_users_posts($user_id){
        $url = "https://jsonplaceholder.typicode.com/users/".$user_id."/posts";
    
        $ch = curl_init($url);
        $response= curl_exec($ch);
        curl_close($ch);
    }

    function get_users_todos($user_id){
        $url = "https://jsonplaceholder.typicode.com/users/".$user_id."/todos";
    
        $ch = curl_init($url);
        $response= curl_exec($ch);
        curl_close($ch);
    }

    function add_post($post_data){
        $data['title'] = $post_data['title'];
        $data['body'] = $post_data['body'];
        $data['userId'] = $post_data['userId'];
        $curl = curl_init('https://jsonplaceholder.typicode.com/posts');
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
    }

    function update_post($data){
        $curl = curl_init('https://jsonplaceholder.typicode.com/posts/'.$data['id']);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response  = curl_exec($ch);
        curl_close($ch);
        echo $response;
    }

    function delete_post($post_id){
        $url = 'https://jsonplaceholder.typicode.com/posts/'.$post_id;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
    }

?>