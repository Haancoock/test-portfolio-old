var contact = (function(){

	var init = function(){
		_setUpListners();
	};

	var _setUpListners = function(){
		$('.contact-content-form').on('submit', _contactForm);
		$('.contact-content-form').on('reset', _resetForm);
	};


	var _resetForm = function(e){
		form = $(this);
		form.find('.qtip-container').hide();
		form.find('input, textarea').removeClass('qtip-error');
	};

	var _contactForm = function(e){
		e.preventDefault();

		var form = $(this),
			url = 'contact_me.php',
			defObj = _ajaxForm(form, url);

	};

	var _ajaxForm = function(form, url){
		if(!validation.validateForm(form)) return false;


	}


	return {
		init: init
	};


})();


contact.init();