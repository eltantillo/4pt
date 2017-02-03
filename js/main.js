setNavigation();

function setNavigation() {
	var path   = window.location.href;
	var length = window.location.protocol.length + window.location.hostname.length + 2;
	path = path.substring(length, path.length);
	$(".nav a").each(function () {
		var href = $(this).attr('href');
		if (path.substring(0, href.length) === href) {
			$(this).closest('li').addClass('active');
		}
	});
}