<?php
/*
Plugin Name: UltimateSMSapi feedback contact form
Plugin URI: http://ultimatesmsapi.tk
Description:  GET FEEDBACKS OF YOUR SITE BY SMS USING FREE SMS SITES LIKE WAY2SMS FULLONSMS SITE2SMS ULTOO etc 
Version: 1.1.1
Author: Rahul Chaudhary
Author URI: http://ultimatesmsapi.tk
License: GPL2
*/
/*  
Copyright 2012  Rahul Chaudhary (email :  rahchaudhary@gmail.com) 
*/
function show_ultimatesmsapi_visitor_form(){
            
            $ultimatesmsapi_form = "";
            $ultimatesmsapi_form =
			"<form action='".$_SERVER['PHP_SELF']."' method='post'>
				<table>
				<tr>
				<td>Name: </td><td><input type='text' name='name'></td>
				<tr>
				<td>Mobile: </td><td><input type='text' name='number' length=10> (without country code)</td>
				<tr>
				<td>Email: </td><td><input type='text' name='mail'></td>
				<tr>
				<td>Message: </td><td><textarea name='mess'></textarea></td>
				<tr>
				<td></td><td><input type='submit' name='submit' value='Send'></td>
				</table>
			</form>
            ";
            return $ultimatesmsapi_form;
}

function ultimatesmsapi_add_header_scripts()
{
  if(isset($_POST['submit']))
  {
            
			$ultimatesmsapi_admin_mobile=get_option('adminmobile');
			$provider=get_option('provider');
			$ultimatesmsapi_username=get_option('username');
			$ultimatesmsapi_password=get_option('password');
			$ultimatesmsapi_sender=get_option('sender');
			$ultimatesmsapi_visitor_msg_status=get_option('visitormsg');
			$ultimatesmsapi_visitor_message=get_option('msg');
			
	    $mess=$_POST['name']." ( ".$_POST['number']." , ".$_POST['mail']." says ".$_POST['mess'];
	    $number=$_POST['number'];
		$sms_response="";
		if($ultimatesmsapi_visitor_msg_status == 0)
		{
		$content = 'username='.rawurlencode($ultimatesmsapi_username).
		'&password='.rawurlencode($ultimatesmsapi_password).
		'&numbers='.rawurlencode($numbers).
		'&msg='.rawurlencode($mess).
		'&provider='.rawurlencode($provider);
		$sms_response = file_get_contents('http://ultimatesmsapi.tk/sms.php?' . $content);
		}
		else
		{
		$content = 'username='.rawurlencode($ultimatesmsapi_username).
		'&password='.rawurlencode($ultimatesmsapi_password).
		'&numbers='.rawurlencode($ultimatesmsapi_admin_mobile).
		'&msg='.rawurlencode($mess).
		'&provider='.rawurlencode($provider);
		$sms_response = file_get_contents('http://ultimatesmsapi.tk/sms.php?' . $content);

		$content = 'username='.rawurlencode($ultimatesmsapi_username).
		'&password='.rawurlencode($ultimatesmsapi_password).
		'&numbers='.rawurlencode($number).
		'&msg='.rawurlencode($ultimatesmsapi_visitor_message).
		'&provider='.rawurlencode($provider);
		$sms_response = file_get_contents('http://ultimatesmsapi.tk/sms.php?' . $content);
		}
		if($sms_response == "1")
		{
	    ?>
	    <script type="text/javascript">
	     alert('Your feedback has been sent successfully..');
	    </script>
	    <?php
		}
		else
		{
		?>
	    <script type="text/javascript">
	     alert('Error while sending your message to admin please after some time.');
	    </script>
		
		<?php
	      }
	    }
  
}

function ultimatesmsapi_admin_form()
{
include('ultimatesmsapi_import_admin.php');
}
add_shortcode('ultimatesmsapi', 'show_ultimatesmsapi_visitor_form');
add_action('wp_head', 'ultimatesmsapi_add_header_scripts');
add_action('admin_menu', 'ultimatesmsapi_plugin_menu');

function ultimatesmsapi_plugin_menu() {
	add_options_page('Ultimate SMS API Admin page', 'UltimateSMSapi feedback form', 'manage_options', 'ultimatesmsapi', 'ultimatesmsapi_admin_form');
}

?>
