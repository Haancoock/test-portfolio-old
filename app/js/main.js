var myModule = (function(){
	var init = function(){
		_setUpListners();
		};
	var _setUpListners = function(){

		$('.work-site-add-container').on('click', function(e){
			e.preventDefault();
			$('.popup-wrapper').css({
				display: 'block'
			});
		});

		};


	return{
		init: init
	}
})();

myModule.init();

console.log('test');