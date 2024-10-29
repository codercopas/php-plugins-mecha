<?php
	
	// array untuk menyimpan filter/hook function yang ditambahkan
	$filters = [];

	// fungsi untuk menambahkan filter/hook
	function add_filter($callback) {
		global $filters;
		$filters[] = $callback;
	}

	// fungsi untuk menjalankan filter/hook yg sudah ditambahkan di array $filters
	function apply_filters($value) {
		global $filters;
		foreach ($filters as $callback) {
			$value = call_user_func($callback, $value);
		}
		return $value;
	}
	
	// scan semua file PHP di directory plugins
	$plugin_dir = 'plugins';
	$plugin_files = glob($plugin_dir . '/*.php');
	
	// include semua file PHP yang ada di folder plugins
	foreach ($plugin_files as $file) {
		include $file;
	}

	// contoh pemanggilan apply_filter
	$text = "Hello, world!";
	$text = apply_filters($text);
	
	echo $text;
	
	var_export($filters);
	
?>


