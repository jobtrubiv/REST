<?php
if ($_POST["server"] == "zomart") {
	$requestURL = "https://zomart.ru/.api/v1/";
}else{
	$requestURL = "http://dev04.zomart.ru/.api/v1/";
}
if ($_POST["metod"] == "category") {
	$reqest = array("jsonrpc" =>"2.0", "method"=>"getRubric", "params"=> array("rubricId"=> "-5"), "id"=>1);
	if( $curl = curl_init() ) {
		curl_setopt($curl, CURLOPT_URL, $requestURL);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($reqest));
		$out = curl_exec($curl);
		curl_close($curl);
		$result = json_decode($out);
		$answer = array();
		$answer["head"] = "<div class='row'><div class='col-md-3 col-md-offset-1'>jsonrpc:</div><div class='col-md-6'>$result->jsonrpc</div></div><br>";
		$answer["head"] .= "<div class='row'><div class='col-md-3 col-md-offset-1'>id:</div><div class='col-md-6'>$result->id:</div></div><br>";
		$str = "";
	foreach ($result->result as $key => $value) {
		if (!is_array($value)) {
			$str .= "<div class='row'><div class='col-md-3 col-md-offset-2'>$key</div><div class='col-md-6'>$value</div></div><br>";
		}else{
			foreach ($value as $arr => $ob) {
				$str .= "<div class='row'><div class='col-md-3 col-md-offset-3'>id</div><div class='col-md-6'>$ob->id</div></div><br>";
				$str .= "<div class='row'><div class='col-md-3 col-md-offset-3'>name</div><div class='col-md-6'>$ob->name</div></div><br>";
				if (isset($ob->hasChildren)) {
					$str .= "<div class='row'><div class='col-md-3 col-md-offset-3'>hasChildren</div><div class='col-md-6'>$ob->hasChildren</div></div><br>";
				}
			}
		}
	}
		$answer["body"] =$str;
	die(json_encode(array("head" => $answer["head"], "body" => $answer["body"],)));
	}
}
if ($_POST["metod"] == "Products") {
	$reqest = array("jsonrpc" =>"2.0", "method"=>"getProducts", "params"=> array("rubricId"=> "53"), "id"=>1);
	if( $curl = curl_init() ) {
		curl_setopt($curl, CURLOPT_URL, $requestURL);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($reqest));
		$out = curl_exec($curl);
		curl_close($curl);
		$result = json_decode($out);
		$answer = array();
		$answer["head"] = "<div class='row'><div class='col-md-3 col-md-offset-1'>jsonrpc:</div><div class='col-md-6'>$result->jsonrpc</div></div><br>";
		$answer["head"] .= "<div class='row'><div class='col-md-3 col-md-offset-1'>id:</div><div class='col-md-6'>$result->id:</div></div><br>";
		$str = "";
	foreach ($result->result as $key => $value) {

				$str .= "<div class='row'><div class='col-md-3 col-md-offset-3'>name</div><div class='col-md-6'>$value->name</div></div><br>";
				$str .= "<div class='row'><div class='col-md-3 col-md-offset-3'>BADPrice</div><div class='col-md-6'>$value->BADPrice</div></div><br>";
				$str .= "<div class='row'><div class='col-md-3 col-md-offset-3'>oldprice</div><div class='col-md-6'>$value->oldprice</div></div><br>";
				$str .= "<div class='row'><div class='col-md-3 col-md-offset-3'>currency</div><div class='col-md-6'>$value->currency</div></div><br>";
				$str .= "<div class='row'><div class='col-md-3 col-md-offset-3'>detail_picture</div><div class='col-md-6'>$value->detail_picture</div></div><br><hr>";
			}
		$answer["body"] =$str;
	die(json_encode(array("head" => $answer["head"], "body" => $answer["body"],)));
	}
}
