$(document).ready(function(){
	var users = {
		'lizzy': 'lizwiz',
		'admin': 'abc123',
		'user': 'pass987'
	}
	$('#login_form').submit(function(){
	//$('#login_submit_btn').click(function(){
		$('#error_message').text('');

		var username = $(this).find('input[name="username"]').val();
		var password = $(this).find('input[name="password"]').val();

		if(username != ''){
			if(username in users){
				if(password != ''){
					if(users[username] == password){
						return true;
					} else {
						display_error('Incorrect Password Provided.');
					}
				} else {
					display_error('Password is Required.');
				}
			} else {
				display_error('Invalid Username Entered.');
			}
		} else {
			display_error('Username is Required.');
		}
		return false;
	});

	function display_error(error){
		$('#error_message').text(error);
	}
});