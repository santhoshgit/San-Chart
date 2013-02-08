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

<div data-role="page" id="home">
        <div data-role="header" data-theme="e">
            <h1>WELCOME TO LEMCON</h1>
            <a href="<?php echo base_url();?>home/logout" data-icon="delete" data-theme="a" class="ui-btn-right" data-ajax="false">Logout</a>
        </div>  

        <div data-role="content" data-theme="a">
           	<a href="<?php echo base_url();?>home/daily" data-role="button" data-icon="arrow-r" data-iconpos="right" data-theme="b" data-ajax="false">Daily Report</a> 
            <a href="<?php echo base_url();?>home/weekly" data-role="button" data-icon="arrow-r" data-iconpos="right" data-theme="b" data-ajax="false">Weekly Report</a> 
            <a href="<?php echo base_url();?>home/monthly" data-role="button" data-icon="arrow-r" data-iconpos="right" data-theme="b" data-ajax="false">Monthly Report</a> 
            <a href="<?php echo base_url();?>home/yearly" data-role="button" data-icon="arrow-r" data-iconpos="right" data-theme="b" data-ajax="false">Yearly Report</a> 
        </div>
        
        <div data-role="footer" data-theme="e">
            <h1></h1>
        </div> 
        
    </div>

</body>
</html>