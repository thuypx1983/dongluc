<script type="text/javascript">


function password_submit() {
	_form = $('#form_password_submit');
	
	_email = $('[name="text_email"]');
	
	_phainhap = $('.phainhap');
	_phainhap.hide();
	
	_thongbao = $('.login_thongbao');
	
	if ( !validateField2("email") ) {
		return false;
	} else {
		
		_thongbao
			.text('Đang gửi yêu cầu...')
			.addClass('loading')
			.addClass('inline-block')
			.show();
			
		$.post(url+'?ajax=true&mod=user&task=password', _form.serialize(), function(rs){
			ex = rs.split("|");
			bol = ex[0];
			msg = ex[1];
			
			if(bol=="true") {
				_thongbao
						.removeClass('error')
						.addClass('success')
						.removeClass('loading')
						.text(msg);
			} else {
				_thongbao
						.removeClass('loading')
						.removeClass('success')
						.addClass('error')
						.text(msg);
				_email
						.focus();
			}
			
		});
	}
		
	return false;	
}



function validateField2(field) {
	obj = $('#form_password_submit #'+field);
	err = $('#form_password_submit .phainhap_'+field);
	if (obj.val().length <= 0) {
		obj.focus();
		err.fadeIn(300);
		return false;
	} else {
		err.fadeOut(300);
		return true;
	}
}

</script>

<div class="tab-pane fade" id="forget">
	<form class="form-horizontal" id="form_password_submit" action='' method="POST" onsubmit="return password_submit();">
		<fieldset>
			<div id="legend">
				<legend class="">Lấy lại mật khẩu</legend>
				<div style="text-align:center; position:relative;">
					<div class="login_thongbao"></div>
				</div>
			</div>
			
			<div class="control-group">
				<!-- Username -->
				<label class="control-label"  for="username">Nhập email của bạn</label>
				<div class="controls">
					<input type="email" id="email" name="text_email"  placeholder="" class="input-xlarge">
					<small class="phainhap phainhap_email">Nhập địa chỉ Email</small>
				</div>
			</div>
			<div class="controls">
				<button class="btn btn-success" name="submit" onclick="" >Gửi yêu cầu</button> 
			</div>
		</fieldset>
	</form>
	<div class="modal-footer">Bạn đã có tài khoản&nbsp;&nbsp;&nbsp;<a href="#login" data-toggle="tab" class="btn btn-small btn-success switch_dialog"> Đăng nhập</a>
	</div>
</div>