<?php
/**
* Profile widgets/tools
* 
* @package ElggGroups
*/ 
	
// tools widget area
//echo '<ul id="groups-tools" class="tab-content clearfix">';

// enable tools to extend this area
//echo elgg_view("groups/tool_latest", $vars);

// backward compatibility
$right = elgg_view('groups/right_column', $vars);
$left = elgg_view('groups/left_column', $vars);
if ($right || $left) {
	elgg_deprecated_notice('The views groups/right_column and groups/left_column have been replaced by groups/tool_latest', 1.8);
	echo $left;
	echo $right;
}

//echo "</ul>";


/*

<div class='tab-content'>

    <div id='aboutTab' class='tab-pane fade-in active'><h2>About</h2></div>
    
    <div id='discussTab' class='tab-pane fade-in'><h2>Discussion</h2></div>
    
    <div id='filesTab' class='tab-pane fade-in'><h2>Files</h2></div>
    
    <div id='blogsTab' class='tab-pane fade-in'><h2>Blogs</h2></div>

</div>
*/

?>

<ul class="nav nav-tabs clearfix">
    <li class="active"><a data-toggle="tab" href="#aboutTab">About</a></li>
    <li><a data-toggle="tab" href="#discussion">Discussion</a></li>
    <li><a data-toggle="tab" href="#files">Files</a></li>
    <li><a data-toggle="tab" href="#blog">Blogs</a></li>
    
    
    <li class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">More<b class="caret"></b></a>
        
        <ul class="dropdown-menu pull-right">
            <li><a data-toggle="tab" href="#calendar">Events</a></li>
            <li><a data-toggle="tab" href="#pages">Pages</a></li>
            <li><a data-toggle="tab" href="#bookmarks">Bookmarks</a></li>
        </ul>
    </li>
    
    
    <li><a data-toggle="tab" href="#"><i class="fa fa-search"></i></a></li>
</ul>





<!--tools widget area-->
<div id="groups-tools" class="tab-content clearfix">

    <div id="aboutTab" class="tab-pane fade-in active">

        <?php echo elgg_view('groups/profile/fields', $vars);
                
                
                echo elgg_view('groups/profile/widget_area', $vars);
        ?>

    </div>

    <?php  // Load other widgets to create tabs
    echo elgg_view("groups/tool_latest", $vars);?>

</div>
