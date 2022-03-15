<?php
/*
Plugin Name: Hello World
Description: Echos "Hello World" in footer of theme
Version: 1.0
Author: Chris Cagle
Author URI: http://www.cagintranet.com/
*/
 
# get correct id for plugin
$thisfile=basename(__FILE__, ".php");
 
# register plugin
register_plugin(
	$thisfile, //Plugin id
	'Call Me', 	//Plugin name
	'1.0', 		//Plugin version
	'Mateusz Skrzypczak',  //Plugin author
	'http://www.multicolor.stargard.pl/', //author website
	'Add "call me" icon to your website on mobilephone', //Plugin description
	'plugins', //page type - on which admin tab to display
	'call_me_info'  //main function (administration)
);
 





 

register_style('call_me_style',$SITEURL.'plugins/call_me/css/call_me_style.css', GSVERSION, 'screen');
queue_style('call_me_style',GSFRONT); 
 
# activate filter 
add_action('theme-header','call_me_now'); 
 
# add a link in the admin tab 'theme'
add_action('plugins-sidebar','createSideMenu',array($thisfile,'Call Me Settings'));
 
# functions


 
function call_me_info() {
	







	
	
// Set up the data

 $plugin_id = 'call_me_now';
 
// Set up the folder name and its permissions
// Note the constant GSDATAOTHERPATH, which points to /path/to/getsimple/data/other/
$folder        = GSDATAOTHERPATH . '/' . $plugin_id . '/';
$filename      = $folder . 'phonenumber.txt';
$filename2      = $folder . 'bg.txt';
$chmod_mode    = 0755;
$folder_exists = file_exists($folder) || mkdir($folder, $chmod_mode);
 
// Save the file (assuming that the folder indeed exists)


  
echo' <b>Your Number </b> (example: 12345678 only number) ';  echo file_get_contents($filename); echo'<br><br>';
echo' <b>Your background</b> (put hex color without #) ';  echo file_get_contents($filename2); echo '<br><br>';
  
  	echo'

	
	 <form  action="#" style="margin:0 auto;" method="POST">
 <b>PHONE NUMBER</b><br><input type="text" style="width:90%;padding:10px;border-radius:5px;"  name="phonenumber" />
    <br><br><b>BG</b> <br><input type="text"  style="width:90%;padding:10px; border-radius:5px;"  name="bg" />

    <input type="submit" name="submit" style="background:#000;color:#fff;padding:10px;margin-top:10px;border:solid 0 ;border-radius:10px;" value="Save settings" />
  </form>';

  
  echo' <p style="color:#343434;margin-top:20px;">Add "call me" icon to your website on mobilephone Call_me by Multicolor</p>';

 	    
  if(isset($_POST['submit'])){
$telphone = $_POST['phonenumber'];
$background = $_POST['bg'];
  file_put_contents($filename, $telphone);
  file_put_contents($filename2, $background);
  
  echo '<div style="width:90%;background:green;color:#fff;border-radius:5px;padding:10px;text-align:center;">ok ! ';
  echo 'number: '; echo file_get_contents($filename); echo ' background: '; echo file_get_contents($filename2); 
  echo'</div>';
};


}



function call_me_now() {
	
 $plugin_id = 'call_me_now';

$folder        = GSDATAOTHERPATH . '/' . $plugin_id . '/';
$filename      = $folder . 'phonenumber.txt';
$filename2      = $folder . 'bg.txt';



echo '<div class="call_me" style="background:#';echo file_get_contents($filename2) ; echo '"><a href="tel:';  echo file_get_contents($filename) ; echo '"><div class="mobile icon"></div></a></div>';
}




?>
