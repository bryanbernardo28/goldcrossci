<?php

class Gcsa_model extends CI_Model{

	// $this->item_model->fetchAll('item_tbl');
	// $this->item_model->fetchAll('item_tbl', array('item_id'=>1));

	public function insert($table,$data){
		$this->db->insert($table,$data);
		$return_insert = [
			'affected_rows' => $this->db->affected_rows(),
			'insert_id' => $this->db->insert_id()
		];
		return $return_insert;
		//$this->db->query("INSERT INTO ". $table." ".$data);
	}

	public function fetchAll($table,$where=NULL){


		if (!empty($where)) {
			$this->db->where($where);	
		}

		// $this->db->order_by('schedule_date','asc');

		$query = $this->db->get($table);
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
		//return $query->result();
	}


	public function fetchAllClient($where=NULL){


		if (!empty($where)) {
			$this->db->where("a.account_access",$where);
		}

		// $this->db->order_by('schedule_date','asc');
		$this->db->select("*");
		$this->db->from("accounts a");
		$this->db->join("company c","c.account_id = a.user_id");

		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
		//return $query->result();
	}


	// public function getReports(){
	// 	$this->db->select("COUNT(r.reported_user) as total,r.report_id id , r.report_issue issue, r.report_from from, r.reported_user reported_user, r.report_date report_date, r.date_sent date_sent, acc.account_firstname firstname, acc.account_lastname lastname,acc1.account_firstname from_firstname,acc1.account_lastname from_lastname, acc1.account_studentid from_studid , acc.account_status status, acc.account_access access");
	// 	$this->db->from("reports r");
	// 	$this->db->join("accounts acc","acc.account_studentid = r.reported_user");
	// 	$this->db->join("accounts acc1","acc1.account_studentid = r.report_from");
	// 	$this->db->group_by('r.reported_user');
	// 	$this->db->where("r.report_status","1");
	// 	$this->db->order_by('total', 'desc'); 

	// 	return $this->db->get()->result();
	// }

	// public function getRatingsAccount($id){
	// 	$this->db->select("a.account_email,a.account_firstname account_firstname,a.account_lastname account_lastname,a.account_studentid account_studentid,a.account_image account_image,a.account_strength account_strength,a.account_weakness account_weakness,r.rating account_rating,r.average_rating average_rating,r.rated_by rated_by");
	// 	$this->db->from("accounts a");
	// 	$this->db->join("ratings r","a.account_studentid = r.account_studentid");
	// 	$this->db->where(array("a.account_studentid"=>$id,"a.account_access"=>2));

	// 	return $this->db->get()->result();
	// }


	public function delete($table,$id){
		
		$this->db->delete($table,$id);
		return $this->db->affected_rows();
	}

	public function update($table,$ndata,$id=NULL){
		// $this->db->set($ndata);
		// $this->db->where('item_id',$id);
		// $this->db->update($table);
		if (!empty($id)) {
			$this->db->where($id);
		}
		
			$this->db->update($table,$ndata);
			return $this->db->affected_rows();
			
		// $this->db->replace($table, $ndata);

	}

}