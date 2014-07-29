$(document).ready(function(){
	$('#login_form').submit(function(){
	//$('#login_submit_btn').click(function(){
		$('#error_message').text('');
		var form_action = $(this).attr('action');

		$.ajax({
			url: '/process_login.php',
			type: 'post',
			data: $(this).serialize(),
			dataType: 'json',
			success: function(data){
				if(data['status']=='success'){
					window.location = form_action;
				} else {
					display_error(data['msg']);
				}
			}

		});

		return false;
	});

	function display_error(error){
		$('#error_message').text(error);
	}
});