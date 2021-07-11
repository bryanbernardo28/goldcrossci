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

	public function insert_batch($table,$data){
		$this->db->insert_batch($table,$data);
		$return_insert = [
			'affected_rows' => $this->db->affected_rows(),
			'insert_id' => $this->db->insert_id()
		];
		return $return_insert;
		//$this->db->query("INSERT INTO ". $table." ".$data);
	}

	public function pe_offense()
	{
		$this->db->select("*");
		$this->db->from("jp_offense jo");
		$this->db->join("personnel_evaluation_category pec","pec.personnel_evaluation_category_id = jo.pe_category_id");
		$this->db->group_by("pec.personnel_evaluation_category_id");
		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
	}


	public function pe_offense_spec($where_id)
	{
		$this->db->select("*");
		$this->db->from("jp_offense jo");
		$this->db->join("personnel_evaluation_category pec","pec.personnel_evaluation_category_id = jo.pe_category_id");
		$this->db->join("personnel_evaluation_questions peq","peq.personnel_evaluation_questions_id = jo.jp_offense_qnumber");
		$this->db->where("jo.pe_category_id",$where_id);
		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
	}

	public function pe_offense_question($where_id,$question_number,$attempt)
	{
		$this->db->select("*");
		$this->db->from("jp_offense jo");
		$this->db->join("personnel_evaluation_questions peq","peq.personnel_evaluation_questions_id = jo.jp_offense_qnumber");
		$this->db->where(["jo.pe_category_id"=>$where_id,"jo.jp_offense_qnumber" => $question_number,"jo.jp_offense_attempt" => $attempt]);
		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
	}

	public function get_personnel_eval()
	{
		$this->db->select("*");
		$this->db->from("personnel_evaluation_questions peq");
		$this->db->join("personnel_evaluation_category pec","pec.personnel_evaluation_category_id = peq.personnel_evaluation_category_id");
		// $this->db->group_by("cq.category_id");
		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
	}

	public function get_evals($userid,$evaluationid)
	{
		$this->db->select("*");
		$this->db->from("accounts a");
		$this->db->join("detachment d","d.account_id = a.user_id");
		$this->db->join("client_company cc","cc.cc_company_id = d.client_id");
		$this->db->join("evaluations e","e.user_id = a.user_id");
		$this->db->join("rating r","r.rating_id = e.rating_id");
		$this->db->join("merit_rating_basis mrb","mrb.rating_id = r.rating_id");
		$this->db->where(["a.user_id"=>$userid,"e.evaluation_id" => $evaluationid]);
		// $this->db->group_by("cq.category_id");
		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
	}

	public function get_all_evals()
	{
		$this->db->select("*");
		$this->db->from("accounts a");
		$this->db->join("evaluations e","e.user_id = a.user_id");
		$this->db->join("rating r","r.rating_id = e.rating_id");
		$this->db->join("merit_rating_basis mrb","mrb.rating_id = r.rating_id");
		$this->db->group_by("a.user_id");
		$this->db->order_by('e.total_points','desc');
		$this->db->order_by('e.evaluation_date','desc');
		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
	}

	public function fetchEvaluation()
	{
		$this->db->select("c.category_id,c.category_name,q.question_id,q.question_name");
		$this->db->from("category c");
		$this->db->join("question q","q.category_id = c.category_id");
		// $this->db->group_by("cq.category_id");
		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
	}

	public function selectSum($table,$where)
	{
		$this->db->select_sum($where);
		$result = $this->db->get($table)->row();  
		return $result;
	}


	public function fetchAll($table,$where=NULL,$orderby = NULL){


		if (!empty($where)) {
			$this->db->where($where);	
		}

		if(!empty($orderby)){
			$this->db->order_by($orderby[0],$orderby[1]);
		}
		// $this->db->order_by('schedule_date','asc');

		$query = $this->db->get($table);
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
		//return $query->result();
	}
	public function fetchAllLike($table,$like=NULL){


		if (!empty($like)) {
			$this->db->like($like);	
		}

		// $this->db->order_by('schedule_date','asc');

		$query = $this->db->get($table);
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
		//return $query->result();
	}

	// public function getEvaluations($eval_id){
	// 	if (!empty($eval_id)) {
	// 		$this->db->where("e.evaluation_id",$eval_id);
	// 	}

	// 	$this->db->select("*");
	// 	$this->db->from("evaluations e");
	// 	$this->db->join("rating_points cc","cc.account_id = e.user_id");

	// 	$query = $this->db->get();
	// 	return ($query->num_rows() > 0 )? $query->result() : FALSE;
	// }


	public function fetchClient($where=NULL,$id=NULL){


		if (!empty($where)) {
			$this->db->where("a.account_access",$where);
			if (!empty($id)) {
				$this->db->where("a.user_id",$id);
			}
		}

		// $this->db->order_by('schedule_date','asc');
		$this->db->select("*");
		$this->db->from("accounts a");
		$this->db->join("client_company cc","cc.account_id = a.user_id");

		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
		//return $query->result();
	}

	public function fetchEvalRating($where_ratingid=NULL){
		if (!empty($where_ratingid)) {
			$this->db->where("e.evaluation_id",$where_ratingid);
		}

		$this->db->select("*");
		$this->db->from("evaluations e");
		$this->db->join("rating r","r.rating_id = e.rating_id");
		$this->db->join("merit_rating_basis mrb","mrb.rating_id = r.rating_id");


		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;

	}

	// public function fetchEmployeeEval($where_userid=NULL,$where_access=NULL,$eval_id=NULL){
	// 	if (!empty($where) && !empty($id)) {
	// 		$this->db->where(array("a.account_access"=>$where_access,"a.user_id" => $where_userid));
	// 	}

	// 	// $this->db->order_by('schedule_date','asc');
	// 	$this->db->select("*");
	// 	$this->db->from("accounts a");
	// 	$this->db->join("client_company cc","cc.account_id = a.user_id");

	// 	$query = $this->db->get();
	// 	return ($query->num_rows() > 0 )? $query->result() : FALSE;
	// 	//return $query->result();
	// }


	public function fetchEditClient($where=NULL,$id=NULL){


		if (!empty($where) && !empty($id)) {
			$this->db->where(array("a.account_access"=>$where,"a.user_id" => $id));
		}

		// $this->db->order_by('schedule_date','asc');
		$this->db->select("*");
		$this->db->from("accounts a");
		$this->db->join("client_company cc","cc.account_id = a.user_id");

		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
		//return $query->result();
	}


	public function fetchDetachment($where=NULL,$id=NULL){


		if (!empty($where)) {
			$this->db->where("a.account_access",$where);
			if (!empty($id)) {
				$this->db->where("a.user_id",$id);
			}
		}

		// $this->db->order_by('schedule_date','asc');
		$this->db->select("*");
		$this->db->from("accounts a");
		$this->db->join("employee_company ec","ec.ec_account_id = a.user_id");

		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
		//return $query->result();
	}


	public function offense($cat_id=NULL)
	{
		// if (!empty($where)) {
		$this->db->where("jo.jp_offense_qnumber",$cat_id);
		// }

		// $this->db->order_by('schedule_date','asc');
		$this->db->select("*");
		$this->db->from("personnel_evaluation_questions peq");
		$this->db->join("jp_offense jo","jo.jp_offense_qnumber = peq.personnel_evaluation_questions_id");

		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
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


	function count_item($table,$where=NULL){
		if (!empty($where)) {
			$this->db->where($where);
		}

		$query = $this->db->get($table);
		return $query->num_rows();
	}

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

	public function get_detachment($account_id=null,$account_id2=null)
	{
		$this->db->select("*");
		$this->db->from("detachment d");
		$this->db->join("accounts a","d.account_id = a.user_id");
		$this->db->join("client_company cc","cc.cc_company_id = d.client_id");

		if (!empty($account_id2)) {
			$this->db->where("cc.account_id" , $account_id);
		}
		
		if (!empty($account_id2)) {
			$this->db->where("d.account_id" , $account_id2);
		}
		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
	}

	public function f_detachment($account_id=null)
	{
		$this->db->select("*");
		$this->db->from("detachment d");
		$this->db->join("accounts a","d.account_id = a.user_id");
		$this->db->join("client_company cc","cc.cc_company_id = d.client_id");
		if (!empty($account_id)) {
			$this->db->where("d.account_id" , $account_id);
		}
		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
	}

	public function get_remarks()
	{

		// $this->db->order_by('schedule_date','asc');
		$this->db->select("*");
		$this->db->from("remarks r");
		$this->db->join("applicant app","app.applicant_id = r.account_id");
		$this->db->where("r.remarks_hired " , 0);

		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
	}

	public function get_remarks_hired()
	{

		// $this->db->order_by('schedule_date','asc');
		$this->db->select("*");
		$this->db->from("remarks r");
		$this->db->join("applicant app","app.applicant_id = r.account_id");
		$this->db->where("r.remarks_hired " , 1);

		$query = $this->db->get();
		return ($query->num_rows() > 0 )? $query->result() : FALSE;
	}
	public function update_client($datas){
		$this->db->set('a.firstname', $datas["firstname"]);
		$this->db->set('a.lastname', $datas["lastname"]);
		$this->db->set('a.address', $datas["address"]);
		$this->db->set('a.City', $datas["City"]);
		$this->db->set('a.updated_at', $datas["updated_at"]);
		$this->db->set('b.cc_name', $datas["cc_name"]);
		$this->db->set('b.cc_updated_at', $datas["cc_updated_at"]);

		$this->db->where('a.user_id', $datas["id"]);
		$this->db->where('a.user_id = b.account_id');
		$this->db->update('accounts as a, client_company as b');
		return $this->db->affected_rows();
	}
	public function getQuestions()
	{
		$this->db->select("quiz_id, question, choice1, choice2, choice3, choice4, answer");
		$this->db->from("exam");
		
		$query = $this->db->get();
		
		return $query->result();
		
		$num_data_returned = $query->num_rows;
		
		if ($num_data_returned < 1) {
		  echo "There is no data in the database";
		  exit();	
		}
	}


	public function getExams()
	{
		$this->db->select("*");
		$this->db->from("exam_choices");
		$this->db->join('exam_questions', 'exam_questions.exam_question_id = exam_choices.exam_question_id');
		
		$query = $this->db->get();
		
		return $query->result();
		
		$num_data_returned = $query->num_rows;
		
		if ($num_data_returned < 1) {
		  echo "There is no data in the database";
		  exit();	
		}
	}

}