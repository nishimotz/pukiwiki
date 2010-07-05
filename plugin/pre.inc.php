<?php
/* http://home.arino.jp/?pre.inc.php */
function plugin_pre_convert() {
	$args = func_get_args();
	if (count($args) == 0) {
		return FALSE;
	}
	$body = array_pop($args);
	$soft = (count($args) > 0 && $args[0] == 'soft');

	$body = str_replace("\r", "\n", $body);
	$body = $soft
		? make_link($body)
		: htmlspecialchars($body);
	return '<pre>' . $body . '</pre>';
}
?>
