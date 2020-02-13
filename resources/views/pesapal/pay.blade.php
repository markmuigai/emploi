

		<?php
			include_once('../app/Helpers/OAuth.php');
			$token = $params = NULL;
			// if (config('app.env') === 'production'){
			    $consumer_key = 'ZBbkCl0wj1l8sc/JAjMMUxKrbbz4R7eT';
			    $consumer_secret = '3WBbsMWRplX7ezn08vX7wQlRYfo=';
			    $signature_method = new OAuthSignatureMethod_HMAC_SHA1();
			    $iframelink = 'https://www.pesapal.com/API/PostPesapalDirectOrderV4';
			// }
			// else{
			//     $consumer_key = 'iO7oqH2FK64Kv7j+4wNCs8wMsulUwhkw';
			//     $consumer_secret = 'cuX9M4ovpIYd3zSlIjghdnlh4YQ=';
			//     $iframelink = 'https://demo.pesapal.com/api/PostPesapalDirectOrderV4';
			// }
			// $signature_method = new OAuthSignatureMethod_HMAC_SHA1();
			$amount = number_format($invoice->total, 2);
			$desc = $invoice->description;
			$type = 'MERCHANT';
			$reference = $invoice->slug;
			$first_name = $invoice->first_name;
			$last_name = isset($invoice->last_name) ? $invoice->last_name : '';
			$email = $invoice->email;
			$phonenumber = isset($invoice->phone_number) ? $invoice->phone_number : '';//ONE of email or phonenumber is required
			//$phonenumber = '';
			$callback_url = url('/invoice/'.$invoice->slug.'/paid');
			$post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?><PesapalDirectOrderInfo xmlns:xsi=\"http://www.w3.org/2001/XMLSchemainstance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" Amount=\"".$amount."\" Description=\"".$desc."\" Type=\"".$type."\" Reference=\"".$reference."\" FirstName=\"".$first_name."\" LastName=\"".$last_name."\" Email=\"".$email."\" PhoneNumber=\"".$phonenumber."\" xmlns=\"http://www.pesapal.com\" />";
			//dd($post_xml);
			$post_xml = htmlentities($post_xml);
			$consumer = new OAuthConsumer($consumer_key, $consumer_secret);
			$iframe_src = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $iframelink, $params);
			$iframe_src->set_parameter("oauth_callback", $callback_url);
			$iframe_src->set_parameter("pesapal_request_data", $post_xml);
			$iframe_src->sign_request($signature_method, $consumer, $token);
		?>

		<iframe src="<?php echo $iframe_src;?>" width="100%" height="100%" scrolling="auto"  frameBorder="0" style="display: block;">
			<p>Browser unable to load iFrame</p>
		</iframe>
	