var login = (function(){

	var init = function(){
		_setUpListners();
	};

	var _setUpListners = function(){
		$('.login-form-container').on('submit', _loginForm);
	};

	var _loginForm = function(e){
		e.preventDefault();
		form = $(this);
		url = "login.php";
		defObj = _ajaxForm(form, url);
	}


	var _ajaxForm = function(form, url){
		if(!validation.validateForm(form)) return false;
	}




	return{
		init: init
	}

})();


login.init();