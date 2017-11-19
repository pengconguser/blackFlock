<?php
function route_class() {
	return str_replace('.', '-', Route::currentRouteName());
}

function get_avatar() {
	if ($avatar) {
		return $avatar;
	} else {
		return "https://fsdhubcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png";
	}
}