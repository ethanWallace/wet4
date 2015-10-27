<?php
/**
 * All groups listing page navigation
 *
 */
$user = elgg_get_logged_in_user_entity();
/*$tabs = array(
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
	"suggested" => array(
		"text" => elgg_echo("Suggested"),
		"href" => "groups/suggested",
		"priority" => 900,
	),
    "personal" => array(
		"text" => elgg_echo("Personal"),
		'data-toggle' => 'dropdown',
        'class' => 'dropdown-toggle  dropdownToggle',
		"priority" => 1000,
	),
    "own" => array(
		"text" => elgg_echo("Groups I own"),
		"href" => "groups/owner/$user->username",
        'data-toggle' => 'dropdown',
        'class' => 'dropdown-toggle  dropdownToggle',
		"priority" => 1100,
	),
    "invitations" => array(
		"text" => elgg_echo("Invitations"),
		"href" => "groups/invitations/$user->username",
        'data-toggle' => 'dropdown',
        'class' => 'dropdown-toggle  dropdownToggle',
		"priority" => 1200,
	),
);*/

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

<ul class="nav nav-tabs mrgn-tp-md">  <!--top Tabs--> 
            <li role="presentation" class="active"><a href="all?filter=feature">Featured</a></li>
            <li role="presentation"><a href="all?filter=popular">Popular</a></li>
            <li role="presentation"><a href="suggested">Suggested</a></li>
            <li class="dropdown"> <!--More dropdown. This works with the bootstrap javascript tag at the bottom of this page-->
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">Personal<b class="caret"></b></a>
                    <ul class="dropdown-menu pull-right">
                        <li><a  href="all?filter=yours">My Groups</a></li>
                        <li><a  href="owner/<?php echo get_loggedin_user()->username; ?>">Groups I Own</a></li>
                        <li><a  href="invitations/<?php echo get_loggedin_user()->username; ?>">Invitations</a></li>
                                    
                </ul>
        </ul>
<?php

echo elgg_view_menu("filter", array("sort_by" => "priority", "class" => "list-inline mrgn-lft-sm"));
