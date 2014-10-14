<?php
function tesla_has_woocommerce() {
    static $flag = NULL;
    if ($flag === NULL) {
        if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins'))))
            $flag = TRUE;
        else
            $flag = FALSE;
    }
    return $flag;
}

function curl_mailchimp( $url, $postdata = array( ) , $grab_error = false , $get_response = false) {
    $ch = curl_init( $url );
    curl_setopt( $ch, CURLOPT_URL, $url );
    curl_setopt( $ch, CURLOPT_HEADER, 0 );
    curl_setopt( $ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY );
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, TRUE );
    curl_setopt( $ch, CURLOPT_USERAGENT, "Mozilla/6.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1) Gecko/2008070208 Firefox/3.0.3" );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
    if ( ! empty( $postdata ) ) {
        curl_setopt( $ch, CURLOPT_POST, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $postdata ));
    }

    $data = curl_exec( $ch );
    $error = curl_error( $ch );
    curl_close( $ch );

    if ( $error != '' || empty($data))
        return FALSE;
    else{
        $data = json_decode($data);
        if ($get_response && empty($data->error))
            return $data->data;
        elseif(empty($data->error))
            return TRUE;
        elseif($grab_error)
            return $data->error;
    }
    return FALSE;
}

function curl_get_file_contents($URL){
    if(function_exists('curl_init')){
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $contents = curl_exec($c);
        curl_close($c);

        if ($contents) 
            return $contents;
        else 
            return FALSE;
    }else
        return False;
}