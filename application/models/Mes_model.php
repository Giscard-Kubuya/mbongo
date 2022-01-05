<?php

class Mes_model extends CI_Model {
	
	function list_all($table){
			$this->db->select('*');
			$query=$this->db->get($table);
			if ($query) {
            return $query->result_array();
			}
		}
		
	function list_One($table,$condition){
			$this->db->select('*');
			$this->db->where($condition);
			$query=$this->db->get($table);
			if ($query) {
            return $query->row_array();
			}
		}
	function register($table,$data){
			$query=$this->db->insert($table,$data);
			if ($query) {
            return true;
			}else{
				return false;
			}
		}
	function list_Some($table,$condition){
			$this->db->select('*');
			$this->db->where($condition);
			$query=$this->db->get($table);
			if ($query) {
            return $query->result_array();
			}
		}

	function checkvalue($table, $condition) {
			$this->db->where($condition);
			$query = $this->db->get($table);
			if($query->num_rows() > 0)
			{
			   return true ;
			}
			else{
				return false;
			}
		}
	
	function count_number($table,$condition){
			$this->db->select('*');
			$this->db->where($condition);
			$query=$this->db->get($table);
			if ($query) {
            return $query->num_rows();
			}
		}

		function insert_last_id($table, $data) {

        $query = $this->db->insert($table, $data);
       
       if ($query) {
            return $this->db->insert_id();
        }

    }

    function update($table,$condition,$data){
			$this->db->where($condition);
			$query=$this->db->update($table, $data);
			if ($query) {
            return true;
			}else{
				return false;
			}
		}
		
	function list_different_champ($table,$champ,$value){
			$this->db->select('*');
			$this->db->where($champ.'!=',$value);
			$query=$this->db->get($table);
			if ($query) {
            return $query->result_array();
			}
		}

	function list_Some_Order($table, $condition,$champ,$value="DESC") {
        $this->db->where($condition);
        $this->db->order_by($champ,$value);
        $query = $this->db->get($table);
        return $query->result_array();
    }

    function getLastId($table,$champ,$value) {
        $this->db->order_by($champ,$value);
        $query = $this->db->get($table);
        return $query->row();
    }

    function list_Some_One($table, $condition,$champ,$value="DESC") {
        $this->db->where($condition);
        $this->db->order_by($champ,$value);
        $query = $this->db->get($table);
        return $query->row_array();
    }

    function Sommes($table,$condition,$champ){
			$this->db->select_sum($champ);
			$this->db->where($condition);
			$query=$this->db->get($table);
			if ($query) {
            return $query->row_array();
			}
		}

	function insert_batch($table,$data){
      
    $query=$this->db->insert_batch($table, $data);
    return ($query) ? true : false;
    //return ($query)? true:false;

    }

     function List_Order($table,$champs,$champ)
	    {	
	    	$this->db->select('*');
	    	$this->db->select_sum($champ);
	        $this->db->order_by($champs);
	      	$query= $this->db->get($table);
	      	if($query)
	      	{
	          return $query->result_array();
	      	}
	    }

	 function list_Some_like($table,$condition,$champs,$date){
			$this->db->select('*');
			$this->db->where($condition);
			$this->db->where("'$champs' LIKE '%$date'");
			$query=$this->db->get($table);
			if ($query) {
            return $query->result_array();
			}
		}

	function querysql($sql){
		$query=$this->db->query($sql);
		return $query->result_array();
		//return $query->row_array();

	}
	function querysqlrow($sql){
		$query=$this->db->query($sql);
		//return $query->result_array();
		return $query->row_array();

	}
	public function delete($table,$array = array())
    {
       $this->db->where($array);
       $query = $this->db->delete($table);

       if($query){
        return TRUE;
       }
    }


}