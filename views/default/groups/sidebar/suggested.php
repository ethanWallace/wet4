
<?php
/**
 * Suggested groups
 *@package ElggGroups
 * Sidebar
 */
if ($groups) {
	// list suggested groups
	$content = elgg_view("output/text", array("value" => elgg_echo("group_tools:suggested_groups:info")));
	$content .= elgg_view("group_tools/suggested", array("groups" => $groups));
} else {
	$content = elgg_echo("group_tools:suggested_groups:none");
}


//$body = elgg_view_layout("content", $params);

echo elgg_view_module('aside', elgg_echo("group_tools:groups:sorting:suggested"), $content);