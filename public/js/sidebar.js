/*
  Slidemenu
*/
(function() {
	var $body = document.body, $menu_trigger = $body.getElementsByClassName('menu-trigger')[0];
	var $content = document.getElementById('content');

	if ( typeof $menu_trigger !== 'undefined' ) {
		$menu_trigger.addEventListener('click', function(e) {
			e.stopPropagation();
			$body.className = ( $body.className == 'menu-active' )? '' : 'menu-active';
		});
	}
	
	$content.addEventListener('click', function(e){
		$body.className = $body.className = '';
	})

}).call(this);






