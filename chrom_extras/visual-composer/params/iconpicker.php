<?php 
/**
 *  Customn iconpicker icons
 *
 * See 'vc_icon' element and: "../js_composer/include/params/iconpicker/iconpicker.php"
 *
 * @package wow
 * @author Chrom Themes
 * @link http://chromthemes.com
 * @version 2.0
 */
/* Enqueue iconpicker icons */
function CHfw_vc_iconpicker_base_register_css() {
	// Pixeden icons
	wp_enqueue_style( 'pe-icons-filled', CHfw_THEME_URL . '/assets/fonts/font-icons/pe-icon-7-filled/css/pe-icon-7-filled.css' );
	wp_enqueue_style( 'pe-icons-stroke', CHfw_THEME_URL . '/assets/fonts/font-icons/pe-icon-7-stroke/css/pe-icon-7-stroke.css' );
};
add_action( 'vc_base_register_admin_css', 'CHfw_vc_iconpicker_base_register_css' );


/* Pixeden icons */
function CHfw_vc_iconpicker_type_pixeden( $icons ) {
	$pixeden_icons = array(
		'Pixeden Line Icons' => array(
			array( 'pe-7s-close' => __( 'close', 'js_composer' ) ),
			array( 'pe-7s-close-circle' => __( 'close circle', 'js_composer' ) ),
			array( 'pe-7s-angle-up' => __( 'angle up', 'js_composer' ) ),
			array( 'pe-7s-angle-up-circle' => __( 'angle up circle', 'js_composer' ) ),
			array( 'pe-7s-angle-right' => __( 'angle right', 'js_composer' ) ),
			array( 'pe-7s-angle-right-circle' => __( 'angle right circle', 'js_composer' ) ),
			array( 'pe-7s-angle-left' => __( 'angle left', 'js_composer' ) ),
			array( 'pe-7s-angle-left-circle' => __( 'angle left circle', 'js_composer' ) ),
			array( 'pe-7s-angle-down' => __( 'angle down', 'js_composer' ) ),
			array( 'pe-7s-angle-down-circle' => __( 'angle down circle', 'js_composer' ) ),
			array( 'pe-7s-wallet' => __( 'wallet', 'js_composer' ) ),
			array( 'pe-7s-volume2' => __( 'volume2', 'js_composer' ) ),
			array( 'pe-7s-volume1' => __( 'volume1', 'js_composer' ) ),
			array( 'pe-7s-voicemail' => __( 'close', 'js_composer' ) ),
			array( 'pe-7s-video' => __( 'video', 'js_composer' ) ),
			array( 'pe-7s-user' => __( 'user', 'js_composer' ) ),
			array( 'pe-7s-upload' => __( 'upload', 'js_composer' ) ),
			array( 'pe-7s-unlock' => __( 'unlock', 'js_composer' ) ),
			array( 'pe-7s-umbrella' => __( 'umbrella', 'js_composer' ) ),
			array( 'pe-7s-trash' => __( 'trash', 'js_composer' ) ),
			array( 'pe-7s-tools' => __( 'tools', 'js_composer' ) ),
			array( 'pe-7s-timer' => __( 'timer', 'js_composer' ) ),
			array( 'pe-7s-ticket' => __( 'ticket', 'js_composer' ) ),
			array( 'pe-7s-target' => __( 'target', 'js_composer' ) ),
			array( 'pe-7s-sun' => __( 'sun', 'js_composer' ) ),
			array( 'pe-7s-study' => __( 'study', 'js_composer' ) ),
			array( 'pe-7s-stopwatch' => __( 'stopwatch', 'js_composer' ) ),
			array( 'pe-7s-star' => __( 'star', 'js_composer' ) ),
			array( 'pe-7s-speaker' => __( 'speaker', 'js_composer' ) ),
			array( 'pe-7s-signal' => __( 'signal', 'js_composer' ) ),
			array( 'pe-7s-shuffle' => __( 'shuffle', 'js_composer' ) ),
			array( 'pe-7s-shopbag' => __( 'shopbag', 'js_composer' ) ),
			array( 'pe-7s-share' => __( 'share', 'js_composer' ) ),
			array( 'pe-7s-server' => __( 'server', 'js_composer' ) ),
			array( 'pe-7s-search' => __( 'search', 'js_composer' ) ),
			array( 'pe-7s-science' => __( 'science', 'js_composer' ) ),
			array( 'pe-7s-ribbon' => __( 'ribbon', 'js_composer' ) ),
			array( 'pe-7s-repeat' => __( 'repeat', 'js_composer' ) ),
			array( 'pe-7s-refresh' => __( 'refresh', 'js_composer' ) ),
			array( 'pe-7s-refresh-cloud' => __( 'refresh cloud', 'js_composer' ) ),
			array( 'pe-7s-radio' => __( 'radio', 'js_composer' ) ),
			array( 'pe-7s-print' => __( 'print', 'js_composer' ) ),
			array( 'pe-7s-prev' => __( 'prev', 'js_composer' ) ),
			array( 'pe-7s-power' => __( 'power', 'js_composer' ) ),
			array( 'pe-7s-portfolio' => __( 'portfolio', 'js_composer' ) ),
			array( 'pe-7s-plus' => __( 'plus', 'js_composer' ) ),
			array( 'pe-7s-play' => __( 'play', 'js_composer' ) ),
			array( 'pe-7s-plane' => __( 'plane', 'js_composer' ) ),
			array( 'pe-7s-photo-gallery' => __( 'photo gallery', 'js_composer' ) ),
			array( 'pe-7s-phone' => __( 'phone', 'js_composer' ) ),
			array( 'pe-7s-pen' => __( 'pen', 'js_composer' ) ),
			array( 'pe-7s-paper-plane' => __( 'paper plane', 'js_composer' ) ),
			array( 'pe-7s-paint' => __( 'paint', 'js_composer' ) ),
			array( 'pe-7s-notebook' => __( 'notebook', 'js_composer' ) ),
			array( 'pe-7s-note' => __( 'note', 'js_composer' ) ),
			array( 'pe-7s-next' => __( 'next', 'js_composer' ) ),
			array( 'pe-7s-news-paper' => __( 'news paper', 'js_composer' ) ),
			array( 'pe-7s-musiclist' => __( 'musiclist', 'js_composer' ) ),
			array( 'pe-7s-music' => __( 'music', 'js_composer' ) ),
			array( 'pe-7s-mouse' => __( 'mouse', 'js_composer' ) ),
			array( 'pe-7s-more' => __( 'more', 'js_composer' ) ),
			array( 'pe-7s-moon' => __( 'moon', 'js_composer' ) ),
			array( 'pe-7s-monitor' => __( 'monitor', 'js_composer' ) ),
			array( 'pe-7s-micro' => __( 'micro', 'js_composer' ) ),
			array( 'pe-7s-menu' => __( 'menu', 'js_composer' ) ),
			array( 'pe-7s-map' => __( 'map', 'js_composer' ) ),
			array( 'pe-7s-map-marker' => __( 'map marker', 'js_composer' ) ),
			array( 'pe-7s-mail' => __( 'mail', 'js_composer' ) ),
			array( 'pe-7s-mail-open' => __( 'mail open', 'js_composer' ) ),
			array( 'pe-7s-mail-open-file' => __( 'mail open file', 'js_composer' ) ),
			array( 'pe-7s-magnet' => __( 'magnet', 'js_composer' ) ),
			array( 'pe-7s-loop' => __( 'loop', 'js_composer' ) ),
			array( 'pe-7s-look' => __( 'look', 'js_composer' ) ),
			array( 'pe-7s-lock' => __( 'lock', 'js_composer' ) ),
			array( 'pe-7s-lintern' => __( 'lintern', 'js_composer' ) ),
			array( 'pe-7s-link' => __( 'link', 'js_composer' ) ),
			array( 'pe-7s-like' => __( 'like', 'js_composer' ) ),
			array( 'pe-7s-light' => __( 'light', 'js_composer' ) ),
			array( 'pe-7s-less' => __( 'less', 'js_composer' ) ),
			array( 'pe-7s-keypad' => __( 'keypad', 'js_composer' ) ),
			array( 'pe-7s-junk' => __( 'junk', 'js_composer' ) ),
			array( 'pe-7s-info' => __( 'info', 'js_composer' ) ),
			array( 'pe-7s-home' => __( 'home', 'js_composer' ) ),
			array( 'pe-7s-help2' => __( 'help2', 'js_composer' ) ),
			array( 'pe-7s-help1' => __( 'help1', 'js_composer' ) ),
			array( 'pe-7s-graph3' => __( 'graph3', 'js_composer' ) ),
			array( 'pe-7s-graph2' => __( 'graph2', 'js_composer' ) ),
			array( 'pe-7s-graph1' => __( 'graph1', 'js_composer' ) ),
			array( 'pe-7s-graph' => __( 'graph', 'js_composer' ) ),
			array( 'pe-7s-global' => __( 'global', 'js_composer' ) ),
			array( 'pe-7s-gleam' => __( 'gleam', 'js_composer' ) ),
			array( 'pe-7s-glasses' => __( 'glasses', 'js_composer' ) ),
			array( 'pe-7s-gift' => __( 'gift', 'js_composer' ) ),
			array( 'pe-7s-folder' => __( 'folder', 'js_composer' ) ),
			array( 'pe-7s-flag' => __( 'flag', 'js_composer' ) ),
			array( 'pe-7s-filter' => __( 'filter', 'js_composer' ) ),
			array( 'pe-7s-file' => __( 'file', 'js_composer' ) ),
			array( 'pe-7s-expand1' => __( 'expand1', 'js_composer' ) ),
			array( 'pe-7s-exapnd2' => __( 'exapnd2', 'js_composer' ) ),
			array( 'pe-7s-edit' => __( 'edit', 'js_composer' ) ),
			array( 'pe-7s-drop' => __( 'drop', 'js_composer' ) ),
			array( 'pe-7s-drawer' => __( 'drawer', 'js_composer' ) ),
			array( 'pe-7s-download' => __( 'download', 'js_composer' ) ),
			array( 'pe-7s-display2' => __( 'display2', 'js_composer' ) ),
			array( 'pe-7s-display1' => __( 'display1', 'js_composer' ) ),
			array( 'pe-7s-diskette' => __( 'diskette', 'js_composer' ) ),
			array( 'pe-7s-date' => __( 'date', 'js_composer' ) ),
			array( 'pe-7s-cup' => __( 'cup', 'js_composer' ) ),
			array( 'pe-7s-culture' => __( 'culture', 'js_composer' ) ),
			array( 'pe-7s-crop' => __( 'crop', 'js_composer' ) ),
			array( 'pe-7s-credit' => __( 'credit', 'js_composer' ) ),
			array( 'pe-7s-copy-file' => __( 'copy file', 'js_composer' ) ),
			array( 'pe-7s-config' => __( 'config', 'js_composer' ) ),
			array( 'pe-7s-compass' => __( 'compass', 'js_composer' ) ),
			array( 'pe-7s-comment' => __( 'comment', 'js_composer' ) ),
			array( 'pe-7s-coffee' => __( 'coffee', 'js_composer' ) ),
			array( 'pe-7s-cloud' => __( 'cloud', 'js_composer' ) ),
			array( 'pe-7s-clock' => __( 'clock', 'js_composer' ) ),
			array( 'pe-7s-check' => __( 'check', 'js_composer' ) ),
			array( 'pe-7s-chat' => __( 'chat', 'js_composer' ) ),
			array( 'pe-7s-cart' => __( 'cart', 'js_composer' ) ),
			array( 'pe-7s-camera' => __( 'camera', 'js_composer' ) ),
			array( 'pe-7s-call' => __( 'call', 'js_composer' ) ),
			array( 'pe-7s-calculator' => __( 'calculator', 'js_composer' ) ),
			array( 'pe-7s-browser' => __( 'browser', 'js_composer' ) ),
			array( 'pe-7s-box2' => __( 'box2', 'js_composer' ) ),
			array( 'pe-7s-box1' => __( 'box1', 'js_composer' ) ),
			array( 'pe-7s-bookmarks' => __( 'bookmarks', 'js_composer' ) ),
			array( 'pe-7s-bicycle' => __( 'bicycle', 'js_composer' ) ),
			array( 'pe-7s-bell' => __( 'bell', 'js_composer' ) ),
			array( 'pe-7s-battery' => __( 'battery', 'js_composer' ) ),
			array( 'pe-7s-ball' => __( 'ball', 'js_composer' ) ),
			array( 'pe-7s-back' => __( 'back', 'js_composer' ) ),
			array( 'pe-7s-attention' => __( 'attention', 'js_composer' ) ),
			array( 'pe-7s-anchor' => __( 'anchor', 'js_composer' ) ),
			array( 'pe-7s-albums' => __( 'albums', 'js_composer' ) ),
			array( 'pe-7s-alarm' => __( 'alarm', 'js_composer' ) ),
			array( 'pe-7s-airplay' => __( 'airplay', 'js_composer' ) ),
			array( 'pe-7s-cloud-upload' => __( 'cloud upload', 'js_composer' ) ),
			array( 'pe-7s-cloud-download' => __( 'loud download', 'js_composer' ) )
		),
		'Pixeden Filled Icons' => array(
			array( 'pe-7f-close' => __( 'close', 'js_composer' ) ),
			array( 'pe-7f-angle-up' => __( 'angle up', 'js_composer' ) ),
			array( 'pe-7f-angle-right' => __( 'angle right', 'js_composer' ) ),
			array( 'pe-7f-angle-left' => __( 'angle left', 'js_composer' ) ),
			array( 'pe-7f-angle-down' => __( 'angle down', 'js_composer' ) ),
			array( 'pe-7f-wallet' => __( 'wallet', 'js_composer' ) ),
			array( 'pe-7f-volume2' => __( 'volume2', 'js_composer' ) ),
			array( 'pe-7f-volume1' => __( 'volume1', 'js_composer' ) ),
			array( 'pe-7f-voicemail' => __( 'close', 'js_composer' ) ),
			array( 'pe-7f-video' => __( 'video', 'js_composer' ) ),
			array( 'pe-7f-user' => __( 'user', 'js_composer' ) ),
			array( 'pe-7f-upload' => __( 'upload', 'js_composer' ) ),
			array( 'pe-7f-unlock' => __( 'unlock', 'js_composer' ) ),
			array( 'pe-7f-umbrella' => __( 'umbrella', 'js_composer' ) ),
			array( 'pe-7f-trash' => __( 'trash', 'js_composer' ) ),
			array( 'pe-7f-tools' => __( 'tools', 'js_composer' ) ),
			array( 'pe-7f-timer' => __( 'timer', 'js_composer' ) ),
			array( 'pe-7f-ticket' => __( 'ticket', 'js_composer' ) ),
			array( 'pe-7f-target' => __( 'target', 'js_composer' ) ),
			array( 'pe-7f-sun' => __( 'sun', 'js_composer' ) ),
			array( 'pe-7f-study' => __( 'study', 'js_composer' ) ),
			array( 'pe-7f-stopwatch' => __( 'stopwatch', 'js_composer' ) ),
			array( 'pe-7f-star' => __( 'star', 'js_composer' ) ),
			array( 'pe-7f-speaker' => __( 'speaker', 'js_composer' ) ),
			array( 'pe-7f-signal' => __( 'signal', 'js_composer' ) ),
			array( 'pe-7f-shuffle' => __( 'shuffle', 'js_composer' ) ),
			array( 'pe-7f-shopbag' => __( 'shopbag', 'js_composer' ) ),
			array( 'pe-7f-share' => __( 'share', 'js_composer' ) ),
			array( 'pe-7f-server' => __( 'server', 'js_composer' ) ),
			array( 'pe-7f-search' => __( 'search', 'js_composer' ) ),
			array( 'pe-7f-science' => __( 'science', 'js_composer' ) ),
			array( 'pe-7f-ribbon' => __( 'ribbon', 'js_composer' ) ),
			array( 'pe-7f-repeat' => __( 'repeat', 'js_composer' ) ),
			array( 'pe-7f-refresh' => __( 'refresh', 'js_composer' ) ),
			array( 'pe-7f-refresh-cloud' => __( 'refresh cloud', 'js_composer' ) ),
			array( 'pe-7f-radio' => __( 'radio', 'js_composer' ) ),
			array( 'pe-7f-print' => __( 'print', 'js_composer' ) ),
			array( 'pe-7f-prev' => __( 'prev', 'js_composer' ) ),
			array( 'pe-7f-power' => __( 'power', 'js_composer' ) ),
			array( 'pe-7f-portfolio' => __( 'portfolio', 'js_composer' ) ),
			array( 'pe-7f-plus' => __( 'plus', 'js_composer' ) ),
			array( 'pe-7f-play' => __( 'play', 'js_composer' ) ),
			array( 'pe-7f-plane' => __( 'plane', 'js_composer' ) ),
			array( 'pe-7f-photo-gallery' => __( 'photo gallery', 'js_composer' ) ),
			array( 'pe-7f-phone' => __( 'phone', 'js_composer' ) ),
			array( 'pe-7f-pen' => __( 'pen', 'js_composer' ) ),
			array( 'pe-7f-paper-plane' => __( 'paper plane', 'js_composer' ) ),
			array( 'pe-7f-paint' => __( 'paint', 'js_composer' ) ),
			array( 'pe-7f-notebook' => __( 'notebook', 'js_composer' ) ),
			array( 'pe-7f-note' => __( 'note', 'js_composer' ) ),
			array( 'pe-7f-next' => __( 'next', 'js_composer' ) ),
			array( 'pe-7f-news-paper' => __( 'news paper', 'js_composer' ) ),
			array( 'pe-7f-musiclist' => __( 'musiclist', 'js_composer' ) ),
			array( 'pe-7f-music' => __( 'music', 'js_composer' ) ),
			array( 'pe-7f-mouse' => __( 'mouse', 'js_composer' ) ),
			array( 'pe-7f-more' => __( 'more', 'js_composer' ) ),
			array( 'pe-7f-moon' => __( 'moon', 'js_composer' ) ),
			array( 'pe-7f-monitor' => __( 'monitor', 'js_composer' ) ),
			array( 'pe-7f-micro' => __( 'micro', 'js_composer' ) ),
			array( 'pe-7f-menu' => __( 'menu', 'js_composer' ) ),
			array( 'pe-7f-map' => __( 'map', 'js_composer' ) ),
			array( 'pe-7f-map-marker' => __( 'map marker', 'js_composer' ) ),
			array( 'pe-7f-mail' => __( 'mail', 'js_composer' ) ),
			array( 'pe-7f-mail-open' => __( 'mail open', 'js_composer' ) ),
			array( 'pe-7f-mail-open-file' => __( 'mail open file', 'js_composer' ) ),
			array( 'pe-7f-magnet' => __( 'magnet', 'js_composer' ) ),
			array( 'pe-7f-loop' => __( 'loop', 'js_composer' ) ),
			array( 'pe-7f-look' => __( 'look', 'js_composer' ) ),
			array( 'pe-7f-lock' => __( 'lock', 'js_composer' ) ),
			array( 'pe-7f-lintern' => __( 'lintern', 'js_composer' ) ),
			array( 'pe-7f-link' => __( 'link', 'js_composer' ) ),
			array( 'pe-7f-like' => __( 'like', 'js_composer' ) ),
			array( 'pe-7f-light' => __( 'light', 'js_composer' ) ),
			array( 'pe-7f-less' => __( 'less', 'js_composer' ) ),
			array( 'pe-7f-keypad' => __( 'keypad', 'js_composer' ) ),
			array( 'pe-7f-junk' => __( 'junk', 'js_composer' ) ),
			array( 'pe-7f-info' => __( 'info', 'js_composer' ) ),
			array( 'pe-7f-home' => __( 'home', 'js_composer' ) ),
			array( 'pe-7f-help2' => __( 'help2', 'js_composer' ) ),
			array( 'pe-7f-help1' => __( 'help1', 'js_composer' ) ),
			array( 'pe-7f-graph3' => __( 'graph3', 'js_composer' ) ),
			array( 'pe-7f-graph2' => __( 'graph2', 'js_composer' ) ),
			array( 'pe-7f-graph1' => __( 'graph1', 'js_composer' ) ),
			array( 'pe-7f-graph' => __( 'graph', 'js_composer' ) ),
			array( 'pe-7f-global' => __( 'global', 'js_composer' ) ),
			array( 'pe-7f-gleam' => __( 'gleam', 'js_composer' ) ),
			array( 'pe-7f-glasses' => __( 'glasses', 'js_composer' ) ),
			array( 'pe-7f-gift' => __( 'gift', 'js_composer' ) ),
			array( 'pe-7f-folder' => __( 'folder', 'js_composer' ) ),
			array( 'pe-7f-flag' => __( 'flag', 'js_composer' ) ),
			array( 'pe-7f-filter' => __( 'filter', 'js_composer' ) ),
			array( 'pe-7f-file' => __( 'file', 'js_composer' ) ),
			array( 'pe-7f-expand1' => __( 'expand1', 'js_composer' ) ),
			array( 'pe-7f-edit' => __( 'edit', 'js_composer' ) ),
			array( 'pe-7f-drop' => __( 'drop', 'js_composer' ) ),
			array( 'pe-7f-drawer' => __( 'drawer', 'js_composer' ) ),
			array( 'pe-7f-download' => __( 'download', 'js_composer' ) ),
			array( 'pe-7f-display2' => __( 'display2', 'js_composer' ) ),
			array( 'pe-7f-display1' => __( 'display1', 'js_composer' ) ),
			array( 'pe-7f-diskette' => __( 'diskette', 'js_composer' ) ),
			array( 'pe-7f-date' => __( 'date', 'js_composer' ) ),
			array( 'pe-7f-cup' => __( 'cup', 'js_composer' ) ),
			array( 'pe-7f-culture' => __( 'culture', 'js_composer' ) ),
			array( 'pe-7f-crop' => __( 'crop', 'js_composer' ) ),
			array( 'pe-7f-credit' => __( 'credit', 'js_composer' ) ),
			array( 'pe-7f-copy-file' => __( 'copy file', 'js_composer' ) ),
			array( 'pe-7f-config' => __( 'config', 'js_composer' ) ),
			array( 'pe-7f-compass' => __( 'compass', 'js_composer' ) ),
			array( 'pe-7f-comment' => __( 'comment', 'js_composer' ) ),
			array( 'pe-7f-coffee' => __( 'coffee', 'js_composer' ) ),
			array( 'pe-7f-cloud' => __( 'cloud', 'js_composer' ) ),
			array( 'pe-7f-clock' => __( 'clock', 'js_composer' ) ),
			array( 'pe-7f-check' => __( 'check', 'js_composer' ) ),
			array( 'pe-7f-chat' => __( 'chat', 'js_composer' ) ),
			array( 'pe-7f-cart' => __( 'cart', 'js_composer' ) ),
			array( 'pe-7f-camera' => __( 'camera', 'js_composer' ) ),
			array( 'pe-7f-call' => __( 'call', 'js_composer' ) ),
			array( 'pe-7f-calculator' => __( 'calculator', 'js_composer' ) ),
			array( 'pe-7f-browser' => __( 'browser', 'js_composer' ) ),
			array( 'pe-7f-box1' => __( 'box1', 'js_composer' ) ),
			array( 'pe-7f-bookmarks' => __( 'bookmarks', 'js_composer' ) ),
			array( 'pe-7f-bicycle' => __( 'bicycle', 'js_composer' ) ),
			array( 'pe-7f-bell' => __( 'bell', 'js_composer' ) ),
			array( 'pe-7f-battery' => __( 'battery', 'js_composer' ) ),
			array( 'pe-7f-ball' => __( 'ball', 'js_composer' ) ),
			array( 'pe-7f-back' => __( 'back', 'js_composer' ) ),
			array( 'pe-7f-attention' => __( 'attention', 'js_composer' ) ),
			array( 'pe-7f-anchor' => __( 'anchor', 'js_composer' ) ),
			array( 'pe-7f-albums' => __( 'albums', 'js_composer' ) ),
			array( 'pe-7f-alarm' => __( 'alarm', 'js_composer' ) ),
			array( 'pe-7f-airplay' => __( 'airplay', 'js_composer' ) ),
			array( 'pe-7f-cloud-upload' => __( 'cloud upload', 'js_composer' ) ),
			array( 'pe-7f-cloud-download' => __( 'loud download', 'js_composer' ) )
		)
	);
		
	return array_merge( $icons, $pixeden_icons );
}

add_filter( 'vc_iconpicker-type-pixeden', 'CHfw_vc_iconpicker_type_pixeden' );
