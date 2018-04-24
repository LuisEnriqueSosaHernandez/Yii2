<?php
namespace backend\components;
use Yii;
use yii\base\Component;
class MyComponent extends Component{
	function currencyConverter($from_Currency,$to_Currency,$amount) {
		$amount=urldecode($amount);
$from_Currency = urlencode($from_Currency);
$to_Currency = urlencode($to_Currency);
$encode_amount = 1;
$get = file_get_contents("https://finance.google.com/bctzjpnsun/converter?a=$encode_amount&from=$from_Currency&to=$to_Currency");
$get = explode("<span class=bld>",$get);
$get = explode("</span>",$get[1]);
$rate= preg_replace("/[^0-9\.]/", null, $get[0]);
$converted_amount = $amount*$rate;
$data = array( 'amount'=>$amount,'rate' => $rate, 'converted_amount' =>$converted_amount, 'from_Currency' => strtoupper($from_Currency), 'to_Currency' => strtoupper($to_Currency));
return json_encode( $data );
}
}
?>