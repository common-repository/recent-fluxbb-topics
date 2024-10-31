<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

# Get the Options from the Database

$FLUXBB_RT_DB = stripslashes(get_option('fluxbb_rt_fluxbb_db'));
$FLUXBB_RT_TOPIC_TABLE = stripslashes(get_option('fluxbb_rt_fluxbb_tt'));
$FLUXBB_RT_SITEURL = stripslashes(get_option('fluxbb_rt_fluxbb_url'));
$FLUXBB_AJUST_TIME = stripslashes(get_option('fluxbb_ajust_time'));
$FLUXBB_URL_SUFFIX = stripslashes(get_option('fluxbb_url_suffix'));
$FLUXBB_SHOW_TIME = stripslashes(get_option('fluxbb_show_time'));

if(!isset($FLUXBB_RT_LIMIT) || empty($FLUXBB_RT_LIMIT)) 
{ 
    $FLUXBB_RT_LIMIT = stripslashes(get_option('fluxbb_rt_fluxbb_limit')); 
}
if(!isset($FLUXBB_SHOW_TIME) || empty($FLUXBB_SHOW_TIME)) 
{ 
    $FLUXBB_SHOW_TIME = false; 
}
if(isset($LIMIT_shortcode) || !empty($LIMIT_shortcode)) 
{ 
    $FLUXBB_RT_LIMIT = $LIMIT_shortcode; 
}

if(!isset($FLUXBB_URL_SUFFIX) || empty($FLUXBB_URL_SUFFIX)) 
{ 
    $FLUXBB_URL_SUFFIX = ''; 
}



if(isset($FLUXBB_RT_DB) && isset($FLUXBB_RT_TOPIC_TABLE) && isset($FLUXBB_RT_SITEURL) && !empty($FLUXBB_RT_DB) && !empty($FLUXBB_RT_TOPIC_TABLE) && !empty($FLUXBB_RT_SITEURL)) 
{
    # Setup our Wordpress DB Connection
    	global $wpdb;
    
    # Are we a function call or Page call ? Set up our list length...
    
    	if (!$FLUXBB_RT_LIMIT) 
    	{ 
            $FLUXBB_RT_LIMIT = 5;
    	}
    
    # Connect to pun BB
    $wpdb->select($FLUXBB_RT_DB);
    
    # Run The query
    $FLUXBB_RT_results = $wpdb->get_results("SELECT * FROM $FLUXBB_RT_TOPIC_TABLE ORDER BY $FLUXBB_RT_TOPIC_TABLE.`posted` DESC LIMIT 0 , $FLUXBB_RT_LIMIT ");
    
    if ($FLUXBB_RT_results){
    	
    		echo '<ul class="fluxbb_recent_posts">';	
    	
    	# Loop away baby !
    	foreach ($FLUXBB_RT_results as $topic)
    		{
            if(isset($FLUXBB_AJUST_TIME) && !empty($FLUXBB_AJUST_TIME)) {
            $time = $topic->posted + ($FLUXBB_AJUST_TIME*3600);
            }
            else
            {
                $time = $topic->posted;
            }
            
    		echo "<li>";
    		echo "<a href='" . $FLUXBB_RT_SITEURL . "/viewtopic.php?id=".$topic->id.$FLUXBB_URL_SUFFIX."' title=\"Date : ".$topic->posted."\">";
    		echo "$topic->subject";
                    echo "</a>";
            if($FLUXBB_SHOW_TIME==='yes') 
            {
                echo "<small>" . date_i18n(get_option('date_format').", ".get_option('time_format'), $time) . "</small>\n";
            }
            else
            {
                echo "<small>" . date_i18n(get_option('date_format')) . "</small>\n";
            }
    		echo "</li>";
    		
    		}
    
    		echo "</ul>";
    } else {
    		echo "<div><small>FluxBB Error : no results</small></div>";
    }
    
    # Connect back to wordpress :-)
    $wpdb->select(DB_NAME);
}
?>
