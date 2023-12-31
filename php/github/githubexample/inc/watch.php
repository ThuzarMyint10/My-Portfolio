<?php
if (isset($_GET['subscribe'])) {
    $response = $api->put(
        '/repos/' . $_GET['subscribe'] . '/subscription', [
            'subscribed' =>true
        ]
        );
}
if (isset($_GET['unsubscribe'])) {
    $response = $api->delete(
        '/repos/' . $_GET['unsubscribe'] . '/subscription', [
            'subscribed' =>false
        ]
        );
}

$alert = array();
if (isset($response)){
    if (substr($response->getCode(), 0 ,1) == 2){
     $alert['type'] = 'success';
     $alert['type'] = 'Watch Status Updated';
    } else {
     $alert['type'] = 'danger';
     $alert['type'] = 'Unable to Update Watch Status';
    }
}
?>