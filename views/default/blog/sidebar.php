<?php
/**
 * Blog sidebar
 *
 * @package Blog
 */

// fetch & display latest comments
if ($vars['page'] != 'friends') {
	echo elgg_view('page/elements/comments_block', array(
		'subtypes' => 'blog',
		'container_guid' => elgg_get_page_owner_guid(),
	));
}
/*
// only users can have archives at present
if ($vars['page'] == 'owner' || $vars['page'] == 'group') {
	echo elgg_view('blog/sidebar/archives', $vars);
}
*/
if ($vars['page'] != 'friends') {
	echo elgg_view('page/elements/tagcloud_block', array(
		'subtypes' => 'blog',
		'container_guid' => elgg_get_page_owner_guid(),
	));
}

if (elgg_is_active_plugin('blog')) {
elgg_push_context('widgets');
$options = array(
    'type' => 'object',
    'subtype' => 'blog',
    'limit' => 2,//$num,
    'full_view' => FALSE,'list_type' => 'list',
    'pagination' => FALSE,
    );
$content = elgg_list_entities($options);
echo elgg_view_module('featured',  elgg_echo("Recent Blogs"), $content);
elgg_pop_context();
}
if(elgg_is_logged_in()){
    echo elgg_view('output/url', array("text" => "Add Blog", "href" => "blog/add/".  elgg_get_logged_in_user_guid(), 'class' => 'elgg-button elgg-button-action'));
    }