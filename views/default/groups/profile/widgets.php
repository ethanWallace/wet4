<?php
/**
* Profile widgets/tools
* 
* @package ElggGroups


To add extra modules to groups you have to add a new tab link below






*/ 
	
// backward compatibility
$right = elgg_view('groups/right_column', $vars);
$left = elgg_view('groups/left_column', $vars);
if ($right || $left) {
	elgg_deprecated_notice('The views groups/right_column and groups/left_column have been replaced by groups/tool_latest', 1.8);
	echo $left;
	echo $right;
}


//grab terms from language to apply to tab title and tab ID's
?>

<ul class="nav nav-tabs clearfix">
    <li class="active"><a data-toggle="tab" href="#<?php echo elgg_echo('gprofile:about') ?>">About</a></li>
    <li><a data-toggle="tab" href="#<?php echo strtolower(elgg_echo('gprofile:discussion')) ?>"><?php echo elgg_echo('gprofile:discussion') ?></a></li>
    <li><a data-toggle="tab" href="#<?php echo strtolower(elgg_echo('gprofile:files')) ?>"><?php echo elgg_echo('gprofile:files') ?></a></li>
    <li><a data-toggle="tab" href="#<?php echo strtolower(elgg_echo('gprofile:blogs')) ?>"><?php echo elgg_echo('gprofile:blogs') ?></a></li>
    
    
    <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">More<b class="caret"></b></a>
        
        <ul class="dropdown-menu pull-right">
            <li><a data-toggle="tab" href="#<?php echo strtolower(elgg_echo('gprofile:calendar')) ?>"><?php echo elgg_echo('gprofile:events') ?></a></li>
            <li><a data-toggle="tab" href="#<?php echo strtolower(elgg_echo('gprofile:pages')) ?>"><?php echo elgg_echo('gprofile:pages') ?></a></li>
            <li><a data-toggle="tab" href="#<?php echo strtolower(elgg_echo('gprofile:bookmarks')) ?>"><?php echo elgg_echo('gprofile:bookmarks') ?></a></li>
        </ul>
    </li>
    
    
    <li><a data-toggle="tab" href="#search"><i class="fa fa-search"></i></a></li>
</ul>





<!--tools widget area-->
<div id="groups-tools" class="tab-content clearfix">

    <div id="<?php echo elgg_echo('gprofile:about') ?>" class="tab-pane fade-in active">

        <?php echo elgg_view('groups/profile/fields', $vars);
                
                
                echo elgg_view('groups/profile/widget_area', $vars);
        ?>

    </div>

    <?php  // Load other widgets to create tabs
    echo elgg_view("groups/tool_latest", $vars);
    ?>
    
    <div id="search" class="tab-pane fade-in">
        <?php 
            echo  '<h3>' .   elgg_echo('groups:search_in_group') . '</h3>';
            echo elgg_view("groups/sidebar/search", $vars); 
        ?>
    </div>

</div>
