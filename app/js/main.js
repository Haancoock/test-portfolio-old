var myModule = (function(){
	

	var init = function(){
		_setUpListners();
		};
	var _setUpListners = function(){
		$('.work-site-add-container').on('click', _showPopup);
		$('.popup-form').on('submit', _addProject);

		};

	var _showPopup = function(e){
		e.preventDefault();
		var divPopup = $('.popup-container');
		divPopup.bPopup({
			onClose: function(){
				$('.popup-error-container').hide();
				$('.popup-addalert-content').hide();
				
			}
		});
	};

	var _ajaxForm = function(url, form){
		var url = url,
			data = form.serialize();

		var result = $.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: data,
		}).fail(function(){
			console.log('Проблемы в PHP');
			$('.popup-error-container').show();
		})

		return result;

	}

	var _addProject = function(e){
		e.preventDefault();
		var form = $(this),
			url = 'add_project.php',
			servAnswer = _ajaxForm(url, form);


		servAnswer.done(function(ans) {
			console.log("success");
			if (ans.mes === 'error') {
				$('.popup-error-container').show();
				$('.popup-addalert-content').hide();
			}else{
				$('.popup-addalert-content').show();
				$('.popup-error-container').hide();
				console.log('Всё прошло успешно, ухууу!');
			}
		});
	};

	return{
		init: init
	}
})();

myModule.init();

