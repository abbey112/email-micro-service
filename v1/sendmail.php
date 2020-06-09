<?php
error_reporting(0);
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$recipient = $_POST['recipient'] ? $_POST['recipient'] : '';
	$sender = $_POST['sender'] ? $_POST['sender'] : '';
	$subject = $_POST['subject'] ? $_POST['subject'] : '';
	$body = $_POST['body'] ? $_POST['body'] : '';
	$cc = $_POST['cc'] ? $_POST['cc'] : '';
	$bcc = $_POST['bcc'] ? $_POST['bcc'] : '';
	$msg = '';

	if (empty($recipient)) {
		$msg = [
			'status' => false,
			'data' => [
				'message' => 'recipient is required'
			]
		];
	} else if(empty($subject)){
		$msg = [
			'status' => false,
			'data' => [
				'message' => 'subject is required'
			]
		];
	} else if(empty($body)){
		$msg = [
			'status' => false,
			'data' => [
				'message' => 'body is required'
			]
		];
	} else {
		if(!empty($cc) && !empty($bcc)){
			$header .= "From: ".$sender. "\r\n";
		    $header .= "Reply-To: " . $sender ." \r\n";
		    $header .= "Cc: " . $cc ." \r\n";
		    $header .= "Bcc: " . $bcc ." \r\n";
		    $header .= "Date: ".date("r (T)")." \r\n";
			$mail = mail($recipient, $subject, $body, $header);
			if ($mail) {
				$msg = [
					'status' => true,
					'data' => [
						'message' => 'mail sent successfully'
					]
				];
			} else {
				$msg = [
					'status' => false,
					'data' => [
						'message' => 'mail not sent'
					]
				];
			}
		} else {
			$mail = mail($recipient, $subject, $body);
			if ($mail) {
				$msg = [
					'status' => true,
					'data' => [
						'message' => '	mail sent successfully'
					]
				];
			} else {
				$msg = [
					'status' => false,
					'data' => [
						'message' => '	mail not sent'
					]
				];
			}
		}
	}
	echo json_encode($msg);
} else {
	$msg = [
		'status' => false,
		'data' => [
			'message' => 'invalid request'
		]
	];
	echo json_encode($msg);
}

?>
