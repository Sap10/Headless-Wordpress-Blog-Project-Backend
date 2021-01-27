<?php
/**
 * Plugin Name: TEST API
 */
add_action('rest_api_init','addCallbackUrlEndpoints');

function addCallbackUrlEndpoints(){
    register_rest_route('saptarshi/v1/','receive-callback',array(
        'methods'=>'POST',
        'callback'=>'receive_callback'
    )
);
}

function receive_callback($request_data){
    $data = array();

    $parameters = $request_data->get_params(); 

    $name = $parameters['name'];
    $password = $parameters['password'];

    if($name === 'saptarshi' && $password === '123456'){
        
    $data['status'] = 'ok';
    $data['received_data'] = array(
        'name' => $name,
        'password' => $password
    );    
    $data['message'] = 'you have reached the server';
    }else{
        $data['status'] = 'failed';
        $data['message'] = 'invalid login credential';
    }


    return $data;
}

?>