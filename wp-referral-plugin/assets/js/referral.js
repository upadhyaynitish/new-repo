jQuery(document).ready(function function_name($) {
	$('#referral_code').on('blue',function(){

		var referral_code  = $(this).val();

		$.ajax({
			url: refferral_ajax.ajax_url,
			method : 'POST',
			data:{
				action:'validate_referral_code',
				referral_code : referral_code
			},

			success:function(res){
				var result = JSOn.parse(res);
				if(result.is_valid){
					$('#referral_code').text('Valid Referral Code').css('color','green')
				}else{
					$('#referral_code').text('Invalid Referral Code').css('color','red')

				}
			}
		});
	});
});