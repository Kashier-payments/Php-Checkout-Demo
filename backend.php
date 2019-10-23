

<?php 

$config = include("config.php");
$configObj = $config[$config['mode']];

class Order{


	public $amount = "20";

	public $currency = "USD";

	public $merchantOrderId = "";

	public $mid = "";

	public $secret = "";

	public $iframeSecret = "";

	public $HPPSecret = "";
	
	public $baseUrl = "";

	function __construct($config){
		$this->secret = $config["iFrameSecret"];
		$this->iframeSecret = $config["iFrameSecret"];		
		$this->HPPSecret = $config["HPPSecret"];
		$this->mid = $config["mid"];
		$this->baseUrl = $config["baseUrl"];
		$this->merchantOrderId = time();
	}
}


function generateKashierOrderHash($order){

$mid = $order->mid; 

$amount = $order->amount; 

$currency = $order->currency; 

$orderId = $order->merchantOrderId;

$secret = $order->secret;

$path = "/?payment=".$mid.".".$orderId.".".$amount.".".$currency;
return hash_hmac( 'sha256' , $path , $secret ,false);
}

$order = new Order($configObj);

$hash = generateKashierOrderHash($order);

$order->secret = $order->HPPSecret;
$hppHash = generateKashierOrderHash($order);

$callbackUrl = urlencode('http://localhost/phpIFrame/hppCallback.php');

$hppUrl = $order->baseUrl."/payment?mid=".$order->mid."&orderId=".$order->merchantOrderId."&amount=".$order->amount."&currency=".$order->currency."&hash=".$hppHash."&merchantRedirect=".$callbackUrl;


?>

