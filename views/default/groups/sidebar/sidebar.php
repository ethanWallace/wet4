<?php
/**

Group Profile Sidebar

**/

$group = get_entity($guid);


//members widget
echo elgg_view('groups/sidebar/members', $vars);

//group activity
echo elgg_view('groups/sidebar/activity', $vars);