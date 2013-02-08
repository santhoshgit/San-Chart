<?php
	class Lemcon_model extends CI_Model {

    var $title   = '';
    var $content = '';
    var $date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	//Check for username & password
	function login_access($username,$password)
	{
	   $this->db->select('user_id,username,name');
	   $this->db->from('user');
	   $this->db->where('username', $username);
	   $this->db->where('password', $password);
       $query = $this->db->get();
	   if($query->num_rows() == 1)
	   {
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
	}
	
	function today_sale()
    {
       // $today = date('Y-m-d');
	   $today = '2013-02-06';
		$this->db->select('DAY(sale_date) as day,MONTH(sale_date) as month ,YEAR(sale_date) as year,HOUR(sale_date) as hour,MINUTE(sale_date) as minute,SECOND(sale_date) as second,sale,sale_date');
		$this->db->from('chart');
		$this->db->where('DATE(sale_date)',$today);
		$query = $this->db->get();
        return $query->result();
    }
	
	function yesterday_sale()
    {
        //$yesterday = date("Y-m-d", time() - (60*60*24) );
		$yesterday = '2013-02-05';
		$this->db->select('DAY(sale_date) as day,MONTH(sale_date) as month ,YEAR(sale_date) as year,HOUR(sale_date) as hour,MINUTE(sale_date) as minute,SECOND(sale_date) as second,sale,sale_date');
		$this->db->from('chart');
		$this->db->where('DATE(sale_date)',$yesterday);
		$query = $this->db->get();
        return $query->result();
    }
	
	
	
	function this_week_sale($first_date,$second_date)
    {
       // $today = date('Y-m-d');
		$this->db->select('DAY(sale_date) as day,MONTH(sale_date) as month ,YEAR(sale_date) as year,HOUR(sale_date) as hour,MINUTE(sale_date) as minute,SECOND(sale_date) as second,sale,sale_date');
		$this->db->from('chart');
		$this->db->where('DATE(sale_date) >=', $first_date);
		$this->db->where('DATE(sale_date) <=', $second_date);
		$query = $this->db->get();
        return $query->result();
    }
	
	function last_week_sale($first_date,$second_date)
    {
       // $today = date('Y-m-d');
		$this->db->select('DAY(sale_date) as day,MONTH(sale_date) as month ,YEAR(sale_date) as year,HOUR(sale_date) as hour,MINUTE(sale_date) as minute,SECOND(sale_date) as second,sale,sale_date');
		$this->db->from('chart');
		$this->db->where('DATE(sale_date) >=', $first_date);
		$this->db->where('DATE(sale_date) <=', $second_date);
		$query = $this->db->get();
        return $query->result();
    }
	
	
	function this_month_sale()
    {
        $month = date('m');
		$year = date('Y');
		$this->db->select('DAY(sale_date) as day,MONTH(sale_date) as month ,YEAR(sale_date) as year,HOUR(sale_date) as hour,MINUTE(sale_date) as minute,SECOND(sale_date) as second,sale,sale_date');
		$this->db->from('chart');
		$this->db->where('MONTH(sale_date)', $month);
		$this->db->where('YEAR(sale_date)', $year);
		$query = $this->db->get();
        return $query->result();
    }
	
	function last_month_sale()
    {
        $month = date("m", strtotime("-1 month") ) ;
		$year = date('Y');
		$this->db->select('DAY(sale_date) as day,MONTH(sale_date) as month ,YEAR(sale_date) as year,HOUR(sale_date) as hour,MINUTE(sale_date) as minute,SECOND(sale_date) as second,sale,sale_date');
		$this->db->from('chart');
		$this->db->where('MONTH(sale_date)', $month);
		$this->db->where('YEAR(sale_date)', $year);
		$query = $this->db->get();
        return $query->result();
    }
	
	
	function this_year_sale()
    {
		$year = date('Y');
		$this->db->select('DAY(sale_date) as day,MONTH(sale_date) as month ,YEAR(sale_date) as year,HOUR(sale_date) as hour,MINUTE(sale_date) as minute,SECOND(sale_date) as second,sale,sale_date');
		$this->db->from('chart');
		$this->db->where('YEAR(sale_date)', $year);
		$query = $this->db->get();
        return $query->result();
    }
	
	function last_year_sale()
    {
		$year = date('Y')-1;
		$this->db->select('DAY(sale_date) as day,MONTH(sale_date) as month ,YEAR(sale_date) as year,HOUR(sale_date) as hour,MINUTE(sale_date) as minute,SECOND(sale_date) as second,sale,sale_date');
		$this->db->from('chart');
		$this->db->where('YEAR(sale_date)', $year);
		$query = $this->db->get();
        return $query->result();
    }
	
	
	
	
	
}
?>