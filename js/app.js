$(document).ready(function() {

	$('a[microlink]').click(microClick);
	$('ul[microcontent]').hide();

});

function microClick(ev) {
	$('ul[id="'+ $(ev.target).attr('for')+'"]').slideToggle();
}