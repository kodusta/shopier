<?php
function generate_shopier_form($data){
			$api_key   = $data->apikey;
			$secret    = $data->apisecret;
			$user_registered = date("Y.m.d");
			$time_elapsed = time() - strtotime($user_registered);
			$buyer_account_age = (int)($time_elapsed/86400);
			$currency = 0;
			$productinfo = $data->item_name;
			$producttype = 1;
			$productinfo = str_replace('"','',$productinfo);
			$productinfo = str_replace('"','',$productinfo);
			$current_language=0;
			$current_lan=0;
			$modul_version=('1.0.4');
			srand(time(NULL));
			$random_number=rand(1000000,9999999);
			$args = array(
				'API_key' => $api_key,
				'website_index' => 3,
				'platform_order_id' => $data->order_id,
				'product_name' => $productinfo,
				'product_type' => $producttype,
				'buyer_name' => $data->buyer_name,
				'buyer_surname' => $data->buyer_surname,
				'buyer_email' => $data->buyer_email,
				'buyer_account_age' => $buyer_account_age,
				'buyer_id_nr' => 0,
				'buyer_phone' => $data->buyer_phone,
				'billing_address' => $data->billing_address,
				'billing_city' => $data->city,
				'billing_country' => "TR",
				'billing_postcode' => "",
				'shipping_address' => $data->billing_address,
				'shipping_city' => $data->city,
				'shipping_country' => "TR",
				'shipping_postcode' => "",
				'total_order_value' => $data->ucret,
				'currency' => $currency,
				'platform' => 0,
				'is_in_frame' => 1,
				'current_language'=>$current_lan,
				'modul_version'=>$modul_version,
				'random_nr' => $random_number
			);
			$data = $args["random_nr"].$args["platform_order_id"].$args["total_order_value"].$args["currency"];
			$signature = hash_hmac("SHA256",$data,$secret,true);
			$signature = base64_encode($signature);
			$args['signature'] = $signature;
			$args_array = array();
			foreach($args as $key => $value){
				$args_array[] = "<input type='hidden' name='$key' value='$value'/>";
			}
			return '<html> <!doctype html><head> <meta charset="UTF-8"> <meta content="True" name="HandheldFriendly"> <meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="robots" content="noindex, nofollow, noarchive" /> 
			<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0" /> <title lang="tr">Güvenli Ödeme Sayfası</title><body><head>
			<form action="https://www.shopier.com/ShowProduct/api_pay4.php" method="post" id="shopier_payment_form">' . implode('', $args_array) .
			'<script>document.getElementById("shopier_payment_form").submit();</script></form></body></html>';
		}
		$form_data = [
			"apikey"	      => "c26f154c3e68a7c82a3277f88e501d55",
			"apisecret"	      => "f7505d98d5ee56f512c972b570f2f2b2",
			"item_name"       => $ordarname,
			"order_id"        => $order,
			"buyer_name"      => $name,
			"buyer_surname"   => $surname,
			"buyer_email"     => $email,
			"buyer_phone"     => $phone,
			"city"            => $city,
			"billing_address" => $address,
			"ucret"           => $price
		];
		print_r(generate_shopier_form(json_decode(json_encode($form_data))));
?>
