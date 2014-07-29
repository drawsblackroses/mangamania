<?php
/*
 * Validate the User and Process Login
 *
*/

$users = array(
	array('username' => 'lizzy','password' => 'lizwiz'),
	array('username' => 'admin','password' => 'abc123'),
	array('username' => 'user','password' => 'pass987')
);

$username = $_POST['username'];
$password = $_POST['password'];

if($username != ''){
	$user_found = false;
	foreach($users as $user){
		if($user['username'] == $username){
			$user_found = true;
			if($password != ''){
				if($user['password'] == $password){
					die(json_encode(array('status'=>'success','msg'=>'User Login Successfully Validated.')));
				} else {
					display_error('Incorrect Password Provided.');
				}
			} else {
				display_error('Password is Required.');
			}
		}
	}
	if(!$user_found){
		display_error('Invalid Username Entered.');
	}
} else {
	display_error('Username is Required.');
}

function display_error($message){
	die(json_encode(array('status'=>'error','msg'=>$message)));
}


?>