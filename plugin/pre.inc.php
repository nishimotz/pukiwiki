<?php
/* pre.inc.php */
/* modified by Takuya Nishimoto */
/* original:  http://home.arino.jp/?pre.inc.php */
/* reference: http://www.phppro.jp/qa/238 */
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
		$body = preg_replace_callback("/(https?:\/\/[a-zA-Z0-9_\.\/\~\%\:\#\?=&\;\-]+)/i", "urllink", $body);
	return '<pre>' . $body . '</pre>';
}

function urllink($match) {
  if ($match[1]) {
    return sprintf('<a href="%1$s" target="_blank" title="%1$s">%1$s</a>', htmlspecialchars($match[1]));
  }
}

?>
