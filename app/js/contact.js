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

		defObj.done(function(ans){
			console.log('uhhhoooo');
		})

	};

	var _ajaxForm = function(form, url){
		// if(!validation.validateForm(form)) return false;
		var url = url,
			data = form.serializeArray();


		var objData = {};
		$(data).each(function(index, obj){
			objData[obj.name] = obj.value;
		});
		data = JSON.stringify(objData);

		var result = $.ajax({
			url: url,
			type: 'POST',
			data:{
				data: data
			},
			dataType: 'Json'
		}).fail(function(ans){
			console.log(ans.mess);
		})

	return relust;

	}


	return {
		init: init
	};


})();


contact.init();