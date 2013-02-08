<!DOCTYPE html> 
<html>
<head> 
	<title>LEMCON NETWORK</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="<?php echo base_url();?>/css/jquery.mobile.css" />
	<script src="<?php echo base_url();?>js/jquery-1.6.4.min.js"></script>
	<script src="<?php echo base_url();?>js/jquery.mobile.min.js"></script>
</head> 
<body> 

<div data-role="page" id="login">
        <div data-role="header" data-theme="e">
            <h1>LEMCON</h1>
        </div>  

        <div data-role="content" data-theme="a">
            <form method="post" rel="external" action="<?php echo site_url('login');?>" data-ajax="false">
                <div data-role="fieldcontain" class="ui-hide-label">
					<label for="username">Username:</label>
					<input type="text" name="username" id="username" value="" placeholder="Username"/>
				</div>
				<div data-role="fieldcontain" class="ui-hide-label">
					<label for="password">Password:</label>
					<input type="password" name="password" id="password" value="" placeholder="Password"/>
				</div>
				<div data-role="fieldcontain" class="ui-hide-label">
				    <fieldset data-role="controlgroup">
					   <legend>Remember me:</legend>
					   <input type="checkbox" name="checkbox-agree" id="checkbox-agree" class="custom" />
					   <label for="checkbox-agree">Remember me</label>
				    </fieldset>
				</div>
				<input type="submit" value="Login" data-theme="e"/>
            </form>
        </div>
        
        
    </div>

</body>
</html>