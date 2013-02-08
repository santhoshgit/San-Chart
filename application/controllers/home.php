<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	
	public function __construct()
    {
		parent::__construct();
		$this->load->helper();
		$this->load->model('lemcon_model','lemcon',TRUE);
    }

   function index()
   {
		 $this->load->view('home');
   }
   
   function logout()
   {
	   $this->session->sess_destroy();
   	   redirect('login', 'refresh');
   }
   
   function daily()
   {
	   $today_data = '';
	   $yesterday_data = '';
	   $today = $this->lemcon->today_sale();
	   $today_sale_today = 0;
	   $today_sale_yesterday = 0;
	   if(!empty($today))
	   {
		   foreach($today as $value)
		   {
			   $val_date = date('H:i:s',strtotime($value->sale_date));
			   $today_data .= '['.strtotime($val_date).','.$value->sale.'],';
			   $today_sale_today = $today_sale_today + $value->sale;
		   }
		   $today_data = substr($today_data,0,-1);
	   }
	   $yesterday = $this->lemcon->yesterday_sale();
	   if(!empty($yesterday))
	   {
		   foreach($yesterday as $value)
		   {
			   $val_date = date('H:i:s',strtotime($value->sale_date));
			   $yesterday_data .= '['.strtotime($val_date).','.$value->sale.'],';
			   $today_sale_yesterday = $today_sale_yesterday + $value->sale;
		   }
		   $yesterday_data = substr($yesterday_data,0,-1);
	   }
	   
	   $data['today'] = $today_data;
	   $data['yesterday'] = $yesterday_data;
	   $data['today_sale_today'] =  $today_sale_today;
	   $data['today_sale_yesterday'] =  $today_sale_yesterday;
	   
	   $this->load->view('daily',$data);
   }
   
   function weekly()
   {
	  //this week
	  
	   $tm = time();
	   $w = date("w", $tm);
	   $this_week_start = (date("Y-m-d", $tm - (86400 * $w) ) );
	   $this_week_end = (date("Y-m-d", $tm + 86400 * (6 - $w) ) );
	   $today_sale_today = 0;
	   $today_sale_yesterday = 0;
	   
	   //previous week 
	   
	   $d = new DateTime();
	   $weekday = $d->format('w');
	   $diff = 8 + ($weekday == 0 ? 6 : $weekday - 1);
	   $d->modify("-$diff day");
	   $last_week_start = $d->format('Y-m-d');
	   $d->modify('+6 day');
	   $last_week_end  = $d->format('Y-m-d');
	   
	   
	   $this_week_data = '';
	   $last_week_data = '';
	   
	   $this_week = $this->lemcon->this_week_sale($this_week_start,$this_week_end);
	   if(!empty($this_week))
	   {
		   foreach($this_week as $value)
		   {
			   $val_date = date('Y-m-d',strtotime($value->sale_date));
			   $this_week_data .= '['.strtotime($val_date).','.$value->sale.'],';
			   $today_sale_today = $today_sale_today + $value->sale;
		   }
		   $this_week_data = substr($this_week_data,0,-1);
	   }
	   
	   $last_week = $this->lemcon->last_week_sale($last_week_start,$last_week_end);
	   
	   if(!empty($last_week))
	   {
		   foreach($last_week as $value)
		   {
			   $val_date = date('Y-m-d',strtotime($value->sale_date));
			   $last_week_data .= '['.strtotime($val_date).','.$value->sale.'],';
			   $today_sale_yesterday = $today_sale_yesterday + $value->sale;
		   }
		   $last_week_data = substr($last_week_data,0,-1);
	   }
	   
	   $data['today'] = $this_week_data;
	   $data['yesterday'] = $last_week_data;
	   $data['today_sale_first'] =  $today_sale_today;
	   $data['today_sale_last'] =  $today_sale_yesterday;
	   
	   $this->load->view('weekly',$data);
   }
   
   
   function monthly()
   {
	   $today_data = '';
	   $yesterday_data = '';
	   $today = $this->lemcon->this_month_sale();
	   $today_sale_today = 0;
	   $today_sale_yesterday = 0;
	   
	   if(!empty($today))
	   {
		   foreach($today as $value)
		   {
			   $val_date = date('Y-m-d H:i:s',strtotime($value->sale_date));
			   $today_data .= '['.strtotime($val_date).','.$value->sale.'],';
			   $today_sale_today = $today_sale_today + $value->sale;
		   }
		   $today_data = substr($today_data,0,-1);
	   }
	   $yesterday = $this->lemcon->last_month_sale();
	   if(!empty($yesterday))
	   {
		   foreach($yesterday as $value)
		   {
			   $val_date = date('Y-m-d H:i:s',strtotime($value->sale_date));
			   $yesterday_data .= '['.strtotime($val_date).','.$value->sale.'],';
			   $today_sale_yesterday = $today_sale_yesterday + $value->sale;
		   }
		   $yesterday_data = substr($yesterday_data,0,-1);
	   }
	   
	   $data['today'] = $today_data;
	   $data['yesterday'] = $yesterday_data;
	   $data['today_sale_first'] =  $today_sale_today;
	   $data['today_sale_last'] =  $today_sale_yesterday;

	   
	   $this->load->view('monthly',$data);
   }
   
   function yearly()
   {
	   $today_data = '';
	   $yesterday_data = '';
	   $today = $this->lemcon->this_year_sale();
	   $today_sale_today = 0;
	   $today_sale_yesterday = 0;
	   
	   if(!empty($today))
	   {
		   foreach($today as $value)
		   {
			   $val_date = date('Y-m-d H:i:s',strtotime($value->sale_date));
			   $today_data .= '['.strtotime($val_date).','.$value->sale.'],';
			   $today_sale_today = $today_sale_today + $value->sale;
		   }
		   $today_data = substr($today_data,0,-1);
	   }
	   $yesterday = $this->lemcon->last_year_sale();
	   if(!empty($yesterday))
	   {
		   foreach($yesterday as $value)
		   {
			   $val_date = date('Y-m-d H:i:s',strtotime($value->sale_date));
			   $yesterday_data .= '['.strtotime($val_date).','.$value->sale.'],';
			   $today_sale_yesterday = $today_sale_yesterday + $value->sale;
		   }
		   $yesterday_data = substr($yesterday_data,0,-1);
	   }
	   
	   $data['today'] = $today_data;
	   $data['yesterday'] = $yesterday_data;
	   $data['today_sale_first'] =  $today_sale_today;
	   $data['today_sale_last'] =  $today_sale_yesterday;

	   
	   $this->load->view('yearly',$data);
   }
  
}

