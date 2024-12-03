<?php

$as_json = json_encode(array(
	'title' => TITLE,
	'content' => CONTENT
));

if (isset($_GET['json'])) {
	header('Content-Type: application/json');
	exit($as_json);
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="charset-utf8">
	<meta name="viewport" content="width=device-width">
	<title><?= TITLE ?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="loading hidden"></div>
	<div class="side-menu">
		<ul><?php
		$i = 0;
		foreach ($pages as $id => $page) : ?>
			<li>
				<a href="<?= $page['path']; ?>"<?php
					if (ID === $id) { ?> class="active"<?php }
						?> data-index="<?= $i++; ?>"><?= $page['title']; ?></a>
			</li><?php endforeach; ?>
		</ul>
	</div>
	<div class="side-content">
		<div id="content"><?= CONTENT ?></div>
	</div>
	<script type="text/javascript">
	!function () {
	var active = document.getElementsByClassName('active')[0];

	history.replaceState({
		data: <?= $as_json; ?>,
		idx: active && active.dataset.index
	}, '');
	}();
	</script>
	<script type="text/javascript" src="ajax.js"></script>
</body>
</html>
