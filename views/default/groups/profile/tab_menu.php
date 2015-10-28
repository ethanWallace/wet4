<?php
/**
 * Group Profile Tools Tab Menu
 * 
 *
 * 
 * 
 * - if adding an additional tool to groups
 * - make sure it's link priority is before "more" and "search"
 */


$owner = elgg_get_page_owner_entity();

elgg_register_menu_item('owner_block', array(
    'name' => 'about',
    'href' => '#' . elgg_echo('gprofile:about'),
    'text' => elgg_echo('gprofile:about'),
    'title' => elgg_echo('gprofile:about'),
    'item_class' => 'active',
    'data-toggle' => 'tab',
    'class' => '',
    'priority' => '0',
    ));

elgg_register_menu_item('owner_block', array(
    'name' => 'more',
    'text' => elgg_echo('gprofile:more') . '<b class="caret"></b>',
    'item_class' => 'dropdown',
    'data-toggle' => 'dropdown',
    'class' => 'dropdown-toggle',
    'href' => '',
    'priority' => '100',
    ));

elgg_register_menu_item('owner_block', array(
    'name' => 'search',
    'href' => '#search',
    'text' => '<i class="fa fa-search"></i>',
    'title' => 'search',
    'data-toggle' => 'tab',
    'class' => '',
    'priority' => '101',
    ));

echo elgg_view_menu('owner_block', array('entity' => $owner, 'class' => 'nav nav-tabs tabMenuGroup clearfix', 'sort_by' => 'priority',));


?>


<script>
    
    //place additional group tools in dropdown menu
$(document).ready( function(){
    
    //add tab data to li's
    $('.tabMenuGroup .elgg-menu-content').attr('data-toggle', 'tab');
    //add dropdown data to li
    $('.tabMenuGroup .dropdown a').attr('data-toggle', 'dropdown');
    //add the dropdown list
    $('.elgg-menu-owner-block .dropdown').append('<ul class="dropdown-menu pull-right"></ul>');
    
    //grab all list items
    var listItems = $('.tabMenuGroup li').toArray();
    for(var i = 0; i < listItems.length; i++){
        //only display four li's outside of dropdown menu
        //put rest in dropdown
       if(i >= 4 && i < (listItems.length) - 2 ){
           //remove extra li's
           listItems[i].remove();
           //add them to dropdown menu
           $('.elgg-menu-item-more ul').append(listItems[i]);
       }
    }
});
    

</script>

    