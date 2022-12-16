<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Pagination_model extends Model{

	public function pagination(){
		$records_per_page = 5;
		$page = 1;
		$offset = ($page - 1) * $records_per_page;

		$data = $this->db
		            ->table('rhuposts')
		            ->where('category', 1)
		            ->limit($offset, $records_per_page)
		            ->get_all();

		$count = $this->db
		            ->table('rhuposts')
		            ->where('category', 1)
		            ->select_count('id', 'count')
		            ->get_all()[0];

		#$this->pagination->initialize($total_rows, $rows_per_page, $page_num, $url)
		$this->pagination->initialize($count['count'], $records_per_page, $page, 'home/page');
	}

}
?>