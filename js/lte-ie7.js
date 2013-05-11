/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'foundation_s\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icon-facebook' : '&#xe000;',
			'icon-twitter' : '&#xe001;',
			'icon-google-plus' : '&#xe002;',
			'icon-magnifying-glass' : '&#xe003;',
			'icon-vimeo' : '&#xe004;',
			'icon-wordpress' : '&#xe005;',
			'icon-github' : '&#xe006;',
			'icon-youtube' : '&#xe007;',
			'icon-instagram' : '&#xe008;',
			'icon-stumbleupon' : '&#xe009;',
			'icon-linkedin' : '&#xe00a;',
			'icon-flag' : '&#xe00b;',
			'icon-envelope' : '&#xe00c;',
			'icon-comment-fill' : '&#xe010;',
			'icon-tags' : '&#xe013;',
			'icon-phone' : '&#xe014;',
			'icon-location' : '&#xe015;',
			'icon-calendar' : '&#xe016;',
			'icon-mug' : '&#xe017;',
			'icon-airplane' : '&#xe018;',
			'icon-heart' : '&#xe019;',
			'icon-star' : '&#xe01a;',
			'icon-star-2' : '&#xe01b;',
			'icon-star-3' : '&#xe01c;',
			'icon-skype' : '&#xe00f;',
			'icon-lastfm' : '&#xe01d;',
			'icon-flickr' : '&#xe011;',
			'icon-apple' : '&#xe01e;',
			'icon-tux' : '&#xe01f;',
			'icon-dribbble' : '&#xe020;',
			'icon-feed' : '&#xe021;',
			'icon-link' : '&#xe00d;',
			'icon-bookmark' : '&#xe00e;',
			'icon-globe' : '&#xe012;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};