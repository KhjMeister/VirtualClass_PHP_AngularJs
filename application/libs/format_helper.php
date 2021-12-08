<?php
/*
 * Format Date
 */
function formatDate($date) {
	$date = date("F j, Y, g:i a", strtotime($date));
	return $date;
}

/*
 * URL Format
 */
function urlFormat($str) {
	// Strip out all whitespace
	$str = preg_replace('/\s*/', '', $str);
	// Convert string to lowercase
	$str = strtolower($str);
	//URL encode
	$str = urldecode($str);
	return $str;
}

/*
 * Add classname active if category is active
 */
function is_active($category){
	if (isset($_GET['category'])){
		if($_GET['category'] == $category){
			return 'active';
		} else {
			return '';
		}
	} else {
		if($category == null){
			return 'active';
		}
	}
}

/*
 * Add link isactive if on current page
 */
function isCurrentPage($page){
	$url = $_SERVER['PHP_SELF'];
	$url_array = explode('/', $url);
	$current_page = end($url_array);
	if ($page.'.php' == $current_page) {
		return ' class="active"';
	} else {
		return '';
	}
}
