<!DOCTYPE html> 
<html>
<head> 
	<title>LEMCON NETWORK</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="stylesheet" href="<?php echo base_url();?>/css/jquery.mobile.css" />
	<script src="<?php echo base_url();?>js/jquery-1.6.4.min.js"></script>
	<script src="<?php echo base_url();?>js/jquery.mobile.min.js"></script>
   
    <script>
	 $( document ).delegate("#daily", "pageinit", function() {
		 var chart1;
			$(document).ready(function() {
				chart1 = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'spline'
            },
            title: {
                text: 'LEMCON REPORT FOR TODAY/YESTERDAY'
            },
            subtitle: {
                text: 'Sales report comparison'
            },
            xAxis: {
                type: 'datetime',
                dateTimeLabelFormats: { // don't display the dummy year
					second: '%H:%M:%S'
                }
            },
            yAxis: {
                title: {
                    text: 'No. of product sold'
                },
                min: 0
            },
            tooltip: {
                formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        Highcharts.dateFormat('%H:%M:%S', this.x) +': '+ this.y +' m';
                }
            },
            
            series: [{
                name: 'Today\'s sale',
                // Define the data points. All series have a dummy year
                // of 1970/71 in order to be compared on the same x axis. Note
                // that in JavaScript, months start at 0 for January, 1 for February etc.
                data: [
                    <?php echo $today;?>
                ]
            }, {
                name: 'Yesterday\'s sale',
                data: [
                    <?php echo $yesterday;?>
                ]
            }]
        });
	});
	
	
$(document).ready(function() {			
	var chart2;		
	chart2 = new Highcharts.Chart({
            chart: {
                renderTo: 'container2',
                type: 'bar'
            },
            title: {
                text: 'LEMCON REPORT FOR TODAY/YESTERDAY'
            },
            subtitle: {
                text: 'Bar representation: Sales report comparison'
            },
            xAxis: {
                categories: ['', ''],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total Sales',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.series.name +': '+ this.y +'';
                }
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'top',
                x: -100,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#000',
                shadow: true
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Yesterday',
                data: [<?php echo $today_sale_yesterday;?>]
            }, {
                name: 'Today',
                data: [<?php echo $today_sale_today;?>]
            }]
        });
    });    
});
</script>
   
</head> 
<body> 

<div data-role="page" id="daily" data-theme="a">
        <div data-role="header" data-theme="e">
        	<a href="<?php echo base_url();?>home" data-icon="check" data-theme="a">Back</a>
            <h1>Daily View</h1>
            <a href="<?php echo base_url();?>home/logout" data-icon="delete" data-theme="a" class="ui-btn-right" data-ajax="false">Logout</a>
        </div>  

        <div data-role="content">
        	<div id="container"></div>
            <p>&nbsp;</p>
            <div id="container2"></div>
        </div>
        
        <div data-role="footer" data-theme="e">
            <h1></h1>
        </div> 
        
    </div>

</body>
</html>
 <script src="<?php echo base_url();?>js/highcharts.js"></script>
 <script src="<?php echo base_url();?>js/gray.js"></script>