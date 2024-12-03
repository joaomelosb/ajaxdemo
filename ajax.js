!function () {

var loading = document.getElementsByClassName('loading')[0];
var content = document.getElementById('content');

document.querySelectorAll('[data-index]').forEach(function (link) {
	link.addEventListener('click', function (e) {
		var xhr = new XMLHttpRequest;

		e.preventDefault();

		xhr.responseType = 'json';
		xhr.onload = onxhrload.bind(xhr, this);
		xhr.onerror = onxhrerr;
		xhr.open('GET', this.href.concat('?json'));
		xhr.send();

		updateloading(false);
	});
});

window.addEventListener('popstate', function (e) {
	var state = e.state;
	var prevLink = document.querySelector('[data-index="'.concat(state.idx, '"]'));

	loadpage(state.data, prevLink);
	history.replaceState(state, '', prevLink.href);
});

function onxhrerr(e) {
	updateloading(true);

	window.alert('Error loading page');
}

function onxhrload(link) {
	var data = this.response;

	updateloading(true);

	loadpage(data, link);
	history.pushState({
		data,
		idx: link.dataset.index
	}, '', link.href);
}

function loadpage(data, link) {
	document.title = data.title;
	content && (content.innerHTML = data.content);

	var active = document.getElementsByClassName('active')[0];

	if (active)
		active.classList.remove('active');

	link.classList.add('active');
}

function updateloading(hidden) {
	if (loading)
		loading.classList[hidden ? 'add' : 'remove']('hidden');
}

}();