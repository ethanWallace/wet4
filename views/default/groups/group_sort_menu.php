<?php
/**
 * All groups listing page navigation
 *
 */
$user = elgg_get_logged_in_user_entity();
//create dropdown menu

elgg_register_menu_item('user_menu_tabs', array(
    'name' => 'own',
    "href" => "groups/owner/$user->username",
    "text" => elgg_echo("groups:own"),
    'title' => elgg_echo("groups:own"),
    'class' => '',
    ));

elgg_register_menu_item('user_menu_tabs', array(
    'name' => 'myGroups',
    "href" => "groups/member/$user->username",
    "text" => elgg_echo("groups:yours"),
    'title' => elgg_echo("groups:yours"),
    'class' => '',
    ));

elgg_register_menu_item('user_menu_tabs', array(
    'name' => 'invitations',
    "href" => "groups/invitations/$user->username",
    "text" => elgg_echo("Invitations"),
    'title' => elgg_echo("Invitations"),
    'class' => '',
    ));

$dropdown = elgg_view_menu('user_menu_tabs', array('class' => 'dropdown-menu  pull-right'));
$caret = elgg_echo('<b class="caret"></b>');
//create tabs menu
elgg_register_menu_item('tabs_menu', array(
    'name' => 'Profile',
    'text' =>  elgg_echo('groups:personal').$caret. $dropdown ,
    'title' => elgg_echo('groups:personal'),
    'item_class' => 'dropdown',
    'data-toggle' => 'dropdown',
    'class' => 'dropdown-toggle',
    'priority' => '4',
    ));



//Can't write feature in name, error message.

elgg_register_menu_item('tabs_menu', array(
    'name' => 'feature1',
    "href" => "groups/all?filter=feature",
    'text' => elgg_echo('groups:feature'),
    'title' => elgg_echo('groups:feature') . $title,
    'item_class' => '',
    'class' => '',
    'priority' => '1',
    ));

elgg_register_menu_item('tabs_menu', array(
    'name' => 'popular',
    "href" => "groups/all?filter=popular",
    'text' => elgg_echo('groups:popular'),
    'title' => elgg_echo('groups:popular') . $title,
    'item_class' => ' ',
    'class' => '',
    'priority' => '2',
    ));

elgg_register_menu_item('tabs_menu', array(
    'name' => 'suggested',
    "href" => "groups/suggested",
    'text' => elgg_echo('groups:suggested'),
    'title' => elgg_echo('groups:suggested') . $title,
    'item_class' => '',
    'class' => '',
    'priority' => '3',
    ));


echo elgg_view_menu('tabs_menu', array('sort_by' => 'priority', 'id' => 'tabs_menu', 'class' => ' visited-link nav nav-tabs clearfix'));
?>



