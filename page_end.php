<?php
$contents = ob_get_contents();
ob_end_clean();

include 'pages.php';

define('TITLE', $pages[ID]['title'] ?? '');
define('CONTENT', $contents);

include 'content.php';