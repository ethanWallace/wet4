<?php
/**
 * All groups listing page navigation
 *
 *//*
$user = elgg_get_logged_in_user_entity();
$tabs = array(
	"newest" => array(
		"text" => elgg_echo("sort:newest"),
		"href" => "groups/all?filter=newest",
		"priority" => 200,
	),
	"yours" => array(
		"text" => elgg_echo("groups:yours"),
		"href" => "groups/all?filter=yours",
		"priority" => 250,
	),
	"popular" => array(
		"text" => elgg_echo("sort:popular"),
		"href" => "groups/all?filter=popular",
		"priority" => 300,
	),
	"discussion" => array(
		"text" => elgg_echo("groups:latestdiscussion"),
		"href" => "groups/all?filter=discussion",
		"priority" => 400,
	),
	"open" => array(
		"text" => elgg_echo("group_tools:groups:sorting:open"),
		"href" => "groups/all?filter=open",
		"priority" => 500,
	),
	"closed" => array(
		"text" => elgg_echo("group_tools:groups:sorting:closed"),
		"href" => "groups/all?filter=closed",
		"priority" => 600,
	),
	"alpha" => array(
		"text" => elgg_echo("group_tools:groups:sorting:alphabetical"),
		"href" => "groups/all?filter=alpha",
		"priority" => 700,
	),
	"ordered" => array(
		"text" => elgg_echo("group_tools:groups:sorting:ordered"),
		"href" => "groups/all?filter=ordered",
		"priority" => 800,
	),
    //echo elgg_echo('allo');
	"suggested" => array(
		"text" => elgg_echo("Suggested"),
		"href" => "groups/suggested",
		"priority" => 900,
	),
    "own" => array(
		"text" => elgg_echo("Groups I own"),
		"href" => "groups/owner/$user->username",
		"priority" => 1100,
	),
    "invitations" => array(
		"text" => elgg_echo("Invitations"),
		"href" => "groups/invitations/$user->username",
		"priority" => 1200,
	),
);

foreach ($tabs as $name => $tab) {
	$show_tab = false;
	$show_tab_setting = elgg_get_plugin_setting("group_listing_" . $name . "_available", "group_tools");
	if ($name == "ordered") {
		if ($show_tab_setting == "1") {
			$show_tab = true;
		}
	} elseif ($show_tab_setting !== "0") {
		$show_tab = true;
	}
	
	if ($show_tab && in_array($name, array("yours", "suggested")) && !elgg_is_logged_in()) {
		$show_tab = false;
	}
	
	if ($show_tab) {
		$tab["name"] = $name;
		
		if ($vars["selected"] == $name) {
			$tab["selected"] = true;
		}
	
		elgg_register_menu_item("filter", $tab);
	}
}

?>

<?php

echo elgg_view_menu("filter", array("sort_by" => "priority", "class" => "list-inline mrgn-lft-sm"));

*/


/**
 * User Menu
 * Access profile/messages/colleagues/settings
 */
/*
// Elgg logo
echo elgg_view_menu('topbar', array('sort_by' => 'priority', array('elgg-menu-hz')));

// elgg tools menu
// need to echo this empty view for backward compatibility.
echo elgg_view_deprecated("navigation/topbar_tools", array(), "Extend the topbar menus or the page/elements/topbar view directly", 1.8);
*/

$site_url = elgg_get_site_url();
$user = elgg_get_logged_in_user_entity();
$displayName = get_loggedin_user()->name;
$user_avatar = get_loggedin_user()->geticonURL('medium');
$email = get_loggedin_user()->email;

//create dropdown menu

elgg_register_menu_item('user_menu_tabs', array(
    'name' => 'own',
    "href" => "groups/owner/$user->username",
    "text" => elgg_echo("grouptoolsgroupssortingown"),
    'title' => 'My Dashboard',
    'class' => '',
    ));

elgg_register_menu_item('user_menu_tabs', array(
    'name' => 'myGroups',
    "href" => "groups/all?filter=yours",
    "text" => elgg_echo("groups:yours"),
    'title' => 'Account Settings',
    'class' => '',
    ));

elgg_register_menu_item('user_menu_tabs', array(
    'name' => 'invitations',
    "href" => "groups/invitations/$user->username",
    "text" => elgg_echo("Invitations"),
    'title' => 'invitations',
    'class' => '',
    ));

$dropdown = elgg_view_menu('user_menu_tabs', array('class' => 'dropdown-menu  pull-right'));

//create user menu
elgg_register_menu_item('tabs_menu', array(
    'name' => 'Profile',
    'text' =>  'Personal' . $dropdown,
    'title' => elgg_echo('userMenu:profile'),
    'item_class' => 'dropdown',
    'data-toggle' => 'dropdown',
    'class' => 'dropdown-toggle',
    'priority' => '4',
    ));



//Can't write feature in name, error message.

elgg_register_menu_item('tabs_menu', array(
    'name' => 'feature1',
    "href" => "groups/all?filter=feature",
    'text' => elgg_echo('Feature'),
    'title' => elgg_echo('userMenu:messages') . $title,
    'item_class' => '',
    'class' => '',
    'priority' => '1',
    ));

elgg_register_menu_item('tabs_menu', array(
    'name' => 'popular',
    "href" => "groups/all?filter=popular",
    'text' => elgg_echo('Popular'),
    'title' => elgg_echo('userMenu:messages') . $title,
    'item_class' => ' ',
    'class' => '',
    'priority' => '2',
    ));

elgg_register_menu_item('tabs_menu', array(
    'name' => 'suggested',
    "href" => "groups/suggested",
    'text' => elgg_echo('Suggested'),
    'title' => elgg_echo('userMenu:messages') . $title,
    'item_class' => '',
    'class' => '',
    'priority' => '3',
    ));


echo elgg_view_menu('tabs_menu', array('sort_by' => 'priority', 'id' => 'tabs_menu', 'class' => ' visited-link nav nav-tabs clearfix'));
?>



