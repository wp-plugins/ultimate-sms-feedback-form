<style>

 
 input, select, textarea
 {
 margin: 10px;
 padding:10px;
 font-family: verdana;
 width: 250px;
 }
 select{width:250px;}

 input:hover, input:focus, select:hover, select:focus, textarea:hover, textarea:focus
 { border:1px solid #0179D1;
 border-left:5px solid #0179D1; }
 
 input#submit
 {
  border:none ;
  cursor:pointer;
  background:#892912;
  color:white;
  border-radius: 5px;
  font-weight:bold;

 }
input#submit:hover
 {
  border:none ;
  cursor:pointer;
  background:#CE6F04;
  color:white;
 }
 input#rahul{
 padding;-left: 30px;
 width:20px;
 }

</style>
<?php
	
		if(isset($_POST['ultimatesmsapi_admin_submit']))
                   {
			//Form data sent
                        $adminmobile=$_POST['adminmobile'];
                        update_option('adminmobile',$adminmobile);
                        
						$provider=$_POST['provider'];
						update_option('provider', $provider);

						$username=$_POST['username'];
                        update_option('username', $username);
                        
                        $password=$_POST['password'];
                        update_option('password',$password);
                        
                        $sender=$_POST['sender'];
                        update_option('sender',$sender);
                        
                        if(isset($_POST['sendreply']))
                        {
                        $visitormsg=1;
                        update_option('visitormsg',$visitormsg);
                        }
                        else
                        {
                        $visitormsg=0;
                        update_option('visitormsg',$visitormsg);
                        }
                        
                        $msg=$_POST['msg'];
                        update_option('msg',$msg);
                        
                        
			?>
                        
			<div class="updated"><strong>Your settings have been saved successfully.</strong></div>
			<?php
		} else {
			//Normal page display
                        $adminmobile=get_option('adminmobile');
						$provider=get_option('provider');
                        $username=get_option('username');
                        $password=get_option('password');
                        $sender=get_option('sender');
                        $visitormsg=get_option('visitormsg');
                        $msg=get_option('msg');
                ?>        
                
                
                <div class="wrap"><center>
			<h2>Ultimate SMS API message settings..</h2>
			
			<br/>
			<img src='http://ultimatesmsapi.tk/mainlogo.png'>
			<div > <h2> To use the SMS feedback contact form simply add '[ultimatesmsapi]' in your posts..</h2></div>
			<form action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>" method="post">
			<table>
				<tr>
				<td>Your Contact Number</td><td>
				<input type="text" name="adminmobile" value="<?php echo $adminmobile; ?>" size="20"></td></tr>
				<tr>
				<td>Choose Default Provider </td><td>
					<select name='provider' id='provider'>
						<option value='way2sms'>Way2Sms</option>
						<option value='160by2'>160by2</option>
						<option value='fullonsms'>Fullonsms</option>
						<option value='ultoo'>Ultoo</option>
						<option value='site2sms'>site2sms</option>
						<option value='indyarocks'>IndyaRocks</option>
						<option value='smsfi'>smsFi</option>
						<option value='smsabc'>SMSabc</option>
					</select></td></tr>
				<tr>
				<td>Username: </td><td><input type="text" name="username" value="<?php echo $username; ?>" size="15"></td></tr>
				<tr>
				<td>Password:  </td><td><input type="password" name="password" value="<?php echo $password; ?>" size="15"></td></tr>
				<tr>
				<td>Visitor Message: </td><td>
				<input type="checkbox"  name="sendreply" id='rahul' onclick="if(document.getElementById('visitor_message').style.display=='none'){document.getElementById('visitor_message').style.display='block';}else{document.getElementById('visitor_message').style.display='none';}" value="sendreply"  <?php if($visitormsg==1){?> checked <?php } ?> >Send Reply to Visitor <br/>(If you want to reply people sending feedback then check this.)</td>
				</tr><tr>
				<td></td>
				<td><div id="visitor_message" <?php if($visitormsg == 1){echo "style='position:relative; display:block;'"; }else {echo "style='position:relative; display:none;'";} ?>>
				<textarea name="msg" cols='60' rows='10'><?php echo $msg; ?></textarea> 
				</div>
				</tr>
				</td>
				<tr>
				<td></td>
				<td>
				<input type="submit" id='submit' name="ultimatesmsapi_admin_submit" value="Save Settings" />
				</td>
				</tr>
			</table>

			</form>
			</center>
		</div>
                <?php
		}
	?>
	


