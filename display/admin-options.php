<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

# Setup our fluxbb Settings.
add_option('fluxbb_rt_fluxbb_db', __('', 'prt'));
add_option('fluxbb_rt_fluxbb_tt', __('', 'prt'));
add_option('fluxbb_rt_fluxbb_url', __('', 'prt'));
add_option('fluxbb_rt_fluxbb_limit', __('', 'prt'));
add_option('fluxbb_show_time', __('', 'prt'));
add_option('fluxbb_ajust_time', __('', 'prt'));
add_option('fluxbb_url_suffix', __('', 'prt'));

# If we've been submitted, then save :-)
if(!isset($_POST['fluxbb_rt_stage'])) { 
}
elseif ('process' == $_POST['fluxbb_rt_stage'])
{
	update_option('fluxbb_rt_fluxbb_db', sanitize_text_field($_POST['fluxbb_rt_fluxbb_db']));
	update_option('fluxbb_rt_fluxbb_tt', sanitize_text_field($_POST['fluxbb_rt_fluxbb_tt']));
	update_option('fluxbb_rt_fluxbb_url', sanitize_text_field($_POST['fluxbb_rt_fluxbb_url']));
	update_option('fluxbb_rt_fluxbb_limit', sanitize_text_field($_POST['fluxbb_rt_fluxbb_limit']));
	update_option('fluxbb_show_time', sanitize_text_field($_POST['fluxbb_show_time']));
	update_option('fluxbb_ajust_time', sanitize_text_field($_POST['fluxbb_ajust_time']));
	update_option('fluxbb_url_suffix', sanitize_text_field($_POST['fluxbb_url_suffix']));
}

# When loading the form, fill in our old values....

$fluxbb_rt_fluxbb_db = stripslashes(get_option('fluxbb_rt_fluxbb_db'));
$fluxbb_rt_fluxbb_tt = stripslashes(get_option('fluxbb_rt_fluxbb_tt'));
$fluxbb_rt_fluxbb_url = stripslashes(get_option('fluxbb_rt_fluxbb_url'));
$fluxbb_rt_fluxbb_limit = stripslashes(get_option('fluxbb_rt_fluxbb_limit'));
$fluxbb_show_time = stripslashes(get_option('fluxbb_show_time'));
$fluxbb_ajust_time = stripslashes(get_option('fluxbb_ajust_time'));
$fluxbb_url_suffix = stripslashes(get_option('fluxbb_url_suffix'));

?>
<div class="wrap">
  <h2><?php _e('fluxbb Recent Topics') ?></h2>
  <form name="form1" method="post">
  <input type="hidden" name="fluxbb_rt_updated" value="true" />
  <input type="hidden" name="fluxbb_rt_stage" value="process" />
  <table width="100%" cellspacing="2" cellpadding="5" class="editform">
    <tr valign="top">
      <th scope="row"><?php _e('fluxbb MySQL Database Name') ?></th>
      <td><input name="fluxbb_rt_fluxbb_db" id="fluxbb_rt_fluxbb_db" style="width: 80%;" rows="1" wrap="virtual" cols="50" value="<?php echo $fluxbb_rt_fluxbb_db; ?>" />
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('fluxbb Topics Table Name') ?></th>
      <td><input name="fluxbb_rt_fluxbb_tt" id="fluxbb_rt_fluxbb_tt" style="width: 80%;" rows="1" wrap="virtual" cols="50" value="<?php echo $fluxbb_rt_fluxbb_tt; ?>" />
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('fluxbb forum URL') ?></th>
      <td><input name="fluxbb_rt_fluxbb_url" id="fluxbb_rt_fluxbb_url" style="width: 80%;" rows="1" wrap="virtual" cols="50" value="<?php echo $fluxbb_rt_fluxbb_url; ?>" />
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Number of Topics to show') ?></th>
      <td><input type="number" name="fluxbb_rt_fluxbb_limit" id="fluxbb_rt_fluxbb_limit" style="width: 80%;" rows="1" wrap="virtual" cols="50" value="<?php echo $fluxbb_rt_fluxbb_limit; ?>" />
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Show time') ?></th>
      <td><input type="checkbox" name="fluxbb_show_time" id="fluxbb_show_time" <?php if($fluxbb_show_time=='yes') { ?> checked="checked" <?php } ?> value="yes" />
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('Time adjustment in hour (example to add 2 hour enter "2").') ?></th>
      <td><input type="number" name="fluxbb_ajust_time" id="fluxbb_ajust_time" style="width: 80%;" rows="1" wrap="virtual" cols="50" value="<?php echo $fluxbb_ajust_time; ?>" />
      </td>
    </tr>
    <tr valign="top">
      <th scope="row"><?php _e('URL suffix (example add "&action=new" for Reverse Messages Order compatibility)') ?></th>
      <td><input type="text" name="fluxbb_url_suffix" id="fluxbb_url_suffix" style="width: 80%;" rows="1" wrap="virtual" cols="50" value="<?php echo $fluxbb_url_suffix; ?>" />
      </td>
    </tr>
  </table>
    <p class="submit">
      <input type="submit" name="Submit" value="<?php _e('Update Options', 'prt') ?> &raquo;" />
    </p>
  </form>
</div>
