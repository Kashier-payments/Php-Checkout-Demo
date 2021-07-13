

<?php 

include  'backend.php';

$queryString = "";
$secret = $order->secret;

foreach ($_GET as $key => $value) { 
    if($key == "signature" || $key== "mode"){
        continue;
    }
    $queryString = $queryString."&".$key."=".$value;
}

$queryString = ltrim($queryString, $queryString[0]); 
$signature = hash_hmac( 'sha256' , $queryString , $secret ,false);

if($signature == $_GET["signature"]){
    echo "Success signature";
}else{
    echo "Failed signature";
}
?>

