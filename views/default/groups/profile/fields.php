<?php
/**
 * Group profile fields
 
 2015/10/13-
 modified to only show long description for about tab
 */

$group = $vars['entity'];

$profile_fields = elgg_get_config('group');

if (is_array($profile_fields) && count($profile_fields) > 0) {

	$even_odd = 'odd';
	foreach ($profile_fields as $key => $valtype) {
		// do not show the name
		if ($key == 'name') {
			continue;
		}

		$value = $group->$key;
		if (is_null($value)) {
			continue;
		}

		$options = array('value' => $group->$key);
		if ($valtype == 'tags') {
			$options['tag_names'] = $key;
		}

        if($key == 'description'){
            echo "<div class=\"{$even_odd}\">";
            echo "<h4>";
            echo 'Description';
            echo ": </h4>";
            echo elgg_view("output/$valtype", $options);
            echo "</div>";
            }

		$even_odd = ($even_odd == 'even') ? 'odd' : 'even';
	}
}
