<?php

function validate(array $fields) {

	$request = request();

	$validate = [];
	foreach ($fields as $field => $type) {
		switch ($type) {
		case 's':
			$validate[$field] = filter_var($request[$field], FILTER_SANITIZE_STRING);
			break;
		case 'i':
			$validate[$field] = filter_var($request[$field], FILTER_SANITIZE_NUMBER_INT);
			break;
		case 'e':
			$validate[$field] = filter_var($request[$field], FILTER_SANITIZE_EMAIL);
			break;
		}
	}

	return (object) $validate;

}

function isEmpty() {

	$request = request();

	$empty = false;
	foreach ($request as $key => $value) {
		if (empty($request[$key])) {
			$empty = true;
		}
	}

	return $empty;
}