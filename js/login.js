$(document).ready(function() {
	$('a.login-window').click(function() {
		
		
        // Lấy giá trị của biến từ một liên kết
		var loginBox = $(this).attr('href');

		// Làm mờ dần trong Popup và thêm nút đóng
		$(loginBox).fadeIn(300);
		
        // Đặt phần đệm căn chỉnh trung tâm + viền
		var popMargTop = ($(loginBox).height() + 24) / 2; 
		var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
		$(loginBox).css({ 
			'margin-top' : -popMargTop,
			'margin-left' : -popMargLeft
		});
		
		// Thêm mặt nạ vào cơ thể
		$('body').append('<div id="mask"></div>');
		$('#mask').fadeIn(300);
		
		return false;
	});
	
	
    // Khi nhấp vào nút đóng hoặc lớp mặt nạ, cửa sổ bật lên đóng lại
	$('a.close, #mask').live('click', function() { 
	  $('#mask , .login-popup').fadeOut(300 , function() {
		$('#mask').remove();  
	}); 
	return false;
	});
});