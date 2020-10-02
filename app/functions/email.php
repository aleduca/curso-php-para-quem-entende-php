<?php

// function send($data) {
// 	$to = 'xandecar@hotmail.com';
// 	$subject = $data->subject;
// 	$message = $data->message;
// 	$headers = "From: {$data->email}" . "\r\n" .
// 	'Reply-To: contato@devclass.com.br' . "\r\n" .
// 	'X-Mailer: PHP/' . phpversion();

// 	return mail($to, $subject, $message, $headers);
// }

function send(array $data) {
	$email = new PHPMailer\PHPMailer\PHPMailer;
	$email->CharSet = 'UTF-8';
	$email->SMTPSecure = 'plain';
	$email->isSMTP();
	$email->Host = 'smtp.mailtrap.io';
	$email->Port = 465;
	$email->SMTPAuth = true;
	$email->Username = '512bf67bbc891e';
	$email->Password = 'e9591bd8a9c5cd';
	$email->isHTML(true);
	$email->setFrom('xandecar@hotmail.com');
	$email->FromName = $data['quem'];
	$email->addAddress($data['para']);
	$email->Body = $data['mensagem'];
	$email->Subject = $data['assunto'];
	$email->AltBody = 'Para ver esse email tenha certeza de estar vendo em um programa que aceita ver HTML';
	$email->MsgHTML($data['mensagem']);

	return $email->send();
}