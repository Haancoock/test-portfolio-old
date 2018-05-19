var validation = (function(){

	var init = function(){
		_setUpListners();
	};

	var _setUpListners = function(){
		$('form').on('focus', '.qtip-error', _removeError);
	};

	//tooltips
	var _createQtip = function(element){
		$(element).siblings('.qtip-container').css({
			display: 'inline-block'
		});
		console.log(element)
		$(element).closest('.popup-form-input').siblings('.qtip-container').css({
			display: 'inline-block'
		});
	};

	var _removeError = function(){
		$(this).removeClass('qtip-error');
		$(this).siblings('.qtip-container').hide();
	}

	var validateForm = function(form){
		var elements = form.find('input, textarea').not('input[type="file"], input[type="hidden"]'),
			valid = true;

		$.each(elements, function(index, val){
			var element = $(val),
				val = $.trim(element.val());

			if(val.length === 0 ){
				element.not('#img').addClass('qtip-error');
				element.closest('.popup-form-input').addClass('qtip-error');
				_createQtip(element);
				valid = false;
			}

		});

		return valid;

	};

	return {
		init: init,
		validateForm: validateForm
	};


})();


validation.init();