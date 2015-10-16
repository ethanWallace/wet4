<?php
/**
 * Group profile summary
 *
 * Icon and profile fields
 *
 * @uses $vars['group']
 */

if (!isset($vars['entity']) || !$vars['entity']) {
	echo elgg_echo('groups:notfound');
	return true;
}

$group = $vars['entity'];
$owner = $group->getOwnerEntity();

if (!$owner) {
	// not having an owner is very bad so we throw an exception
	$msg = "Sorry, '" . 'group owner' . "' does not exist for guid:" . $group->guid;
	throw new InvalidParameterException($msg);
}

?>
<div class="groups-profile panel panel-custom clearfix elgg-image-block">

        <?php 
            
            //load action buttons
            $buttons = elgg_view_menu('title', array(
                'sort_by' => 'priority',
                'class' => 'list-inline pull-right',
                'item_class' => 'mrgn-rght-sm mrgn-tp-sm btn btn-custom btn-group',
                
            ));
            
        ?>
    
    
        <div class="panel-heading col-xs-12 mrgn-lft-sm"> 
            <?php 
                //action buttons
                echo $buttons; 
            ?>
            <h2 class="pull-left"><?php echo $group->name; ?></h2>
        </div>
    
		<div class="groups-profile-icon col-md-3 col-xs-3">
			<?php
				// we don't force icons to be square so don't set width/height
				echo elgg_view_entity_icon($group, 'medium', array(
					'href' => '',
					'width' => '',
					'height' => '',
				)); 
			?>
		</div>
        
    
    
    
		<div class="groups-info col-md-9 col-xs-7">
            
            
			<p class="mrgn-bttm-sm">
				<b><?php echo elgg_echo("groups:owner"); ?>: </b>
				<?php
					echo elgg_view('output/url', array(
						'text' => $owner->name,
						'value' => $owner->getURL(),
						'is_trusted' => true,
					));  
				?>
			</p>
            
            
			<p class="mrgn-bttm-sm">
			<?php
				$num_members = $group->getMembers(array('count' => true));
				echo '<b>' . elgg_echo('groups:members') . ':</b> ' . $num_members;
			?>
			</p>
            
            
            <?php

            //Add tags for new layout to profile stats

            $profile_fields = elgg_get_config('group');

            echo '<b>Tags:</b>';

            foreach ($profile_fields as $key => $valtype) {
                
                $options = array('value' => $group->$key, 'list_class' => 'mrgn-bttm-sm',);
                
                if ($valtype == 'tags') {
                    $options['tag_names'] = $key;
                    echo elgg_view("output/$valtype", $options);
                }   
            }   

            ?>
            
            <div class="groups-stats mrgn-tp-0 mrgn-bttm-sm"></div>
           
		</div>
    


</div>
