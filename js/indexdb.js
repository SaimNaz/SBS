$(document).ready(function() {
	$("#login-button, #user_login_button").click(function(event) {
	    if ($('#admin_email, #admin_password, #user_email, #user_password, #user_email_text, #user_password, #user_confirm_password').val()) {
			$('form, .register_link , #user_signup_form').fadeOut(500);
			$('.wrapper').addClass('form-success');
		}
	});
});

let getHeight = $(window).innerHeight();
document.getElementsByTagName('body')[0].style.height = getHeight + 'px';