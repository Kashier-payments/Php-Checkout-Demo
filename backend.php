

<?php 

$config = include("config.php");

$configObj = $config[$config['mode']];

class Order{


	public $amount = "20";

	public $currency = "EGP";

	public $merchantOrderId = "";

	public $mid = "";

	public $secret = "";
	
	public $baseUrl = '';

	public $mode = "";

	public $allowedMethods = "card,wallet,bank_installments";

	function __construct($config){
		$this->secret = $config["apikey"];
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

$order->mode = $config['mode'];

$hash = generateKashierOrderHash($order);

$callbackUrl = urlencode('http://localhost/Php-Checkout-Demo/hppCallback.php');

$hppUrl = $order->baseUrl."?merchantId=".$order->mid."&orderId=".$order->merchantOrderId."&mode=".$order->mode."&amount=".$order->amount."&currency=".$order->currency."&hash=".$hash."&merchantRedirect=".$callbackUrl."&allowedMethods=".$order->allowedMethods."&display=en";

?>

