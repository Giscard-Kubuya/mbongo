<?php

defined('BASEPATH') or exit("No direct script access allowed");

class Map_model extends CI_Model{
	function insert($table,$data)
	{
		$query= $this->db->insert($table,$data);
		return($query)? true:false;
	}

	function check($table, $criteres) {
        $this->db->where($criteres);
        $query = $this->db->get($table);
        if($query->num_rows() > 0)
        {
           return true ;
        }
        else{
    return false;
    }
    }

    public function getOne($table,$array = array())
    {
       $this->db->where($array);
       $query = $this->db->get($table);

       if($query){
        return $query->row_array();
       }
    }

    public function getOneWhere($table, $critere_un,$critere_deux)
    {
      $this->db->where($critere_un);
      $this->db->or_where($critere_deux);
      $query = $this->db->get($table);

      if($query){
        return $query->row_array();
      }
    }

    public function lastOne($table,$array = array(),$champ,$order_by='ASC')
    {  
       if(!empty($champ)){
        $this->db->order_by($champ,$order_by);
       }
       $this->db->where($array);
       $query = $this->db->get($table);

       if($query){
        return $query->row_array();
       }
    }
    function insert_last_id($table, $data) {
                 $this->db->set($data);
        $query = $this->db->insert($table);
       
       if ($query) {
            return $this->db->insert_id();
        }

    }

    public function delete($table,$array = array())
    {
       $this->db->where($array);
       $query = $this->db->delete($table);

       if($query){
        return TRUE;
       }
    }

    public function update($table,$where=array(),$data=array())
    {
       $this->db->where($where);
       $query = $this->db->update($table,$data);
       if($query){
        return TRUE;
       }
    }

    function getList($table,$critere= array())
    {
        $this->db->where($critere);
        $qry= $this->db->get($table);
        return $qry->result_array();
    }

    function getListTime($table,$critere= array(),$time='')
    {
        $this->db->where($critere);
        $this->db->where($time);
        $qry= $this->db->get($table);
        return $qry->result_array();
    }

    function getListOrder($table,$criteres)
    {
        $this->db->order_by($criteres);
      $query= $this->db->get($table);
      if($query)
      {
          return $query->result_array();
      }
    }

    function record_countsome($table, $criteres=array(),$cond=array())
    {
      $this->db->where($criteres);
      $this->db->where($cond);
  
       $query= $this->db->get($table);
       if($query)
       {
           return $query->num_rows();
       }
       
    }

    function getList_distinct($table,$distinct=array(),$critere= array())
    {
        $this->db->select($distinct);
        $this->db->where($critere);

        $qry= $this->db->get($table);
        return $qry->result_array();
    }

    function get_distinct($table,$distinct=array(),$sum=array(),$groupby=array(),$colonne_order,$order,$condition=array(),$dates=array())
    {
      $this->db->select($distinct);
      $this->db->select($sum);
      $this->db->where($dates);
      $this->db->where($condition);
      $this->db->group_by($groupby);
      $this->db->order_by($colonne_order,$order);
      $query= $this->db->get($table);
      if($query){
       return $query->result_array();
      }
    }

    function get_somme($table,$sum=array(),$cond1=array(),$cond2=array()){
      $this->db->select($sum);
      $this->db->where($cond1);
      $this->db->where($cond2);
      $query= $this->db->get($table);
      if($query){
       return $query->row_array();
      }
    }

    function getList_order($table,$cond1=array(),$cond2=array(),$order=array(),$type=array())
    {
      $this->db->where($cond1);
      $this->db->where($cond2);
        $this->db->order_by($order,$type);
      $query= $this->db->get($table);
      if($query)
      {
          return $query->result_array();
      }
    }



    
    public function get_maison_ville($ID) {
    

        $this->db->select('*');
        $this->db->from('ville v');
        $this->db->join('commune c', 'c.ID_VILLE = v.ID_VILLE');
        $this->db->join('zone z', 'z.ID_COMMUNE = c.ID_COMMUNE');
        $this->db->join('quartier q', 'q.ID_ZONE = z.ID_ZONE');
        $this->db->join('maison m', 'm.ID_QUARTIER = q.ID_QUARTIER');
       
      
        $this->db->where('v.ID_VILLE', $ID);
       
        $query = $this->db->get();
        if ($query) {
            return $query->result_array();
        }
    }

  
    public function get_maison_commune($ID) {
    

        $this->db->select('*');
        $this->db->from('commune c');
        $this->db->join('zone z', 'z.ID_COMMUNE = c.ID_COMMUNE');
        $this->db->join('quartier q', 'q.ID_ZONE = z.ID_ZONE');
        $this->db->join('maison m', 'm.ID_QUARTIER = q.ID_QUARTIER');
       
      
        $this->db->where('c.ID_COMMUNE', $ID);
       
        $query = $this->db->get();
        if ($query) {
            return $query->result_array();
        }
    }



    public function get_maison_zone($ID) {
    

        $this->db->select('*');
        $this->db->from('zone z');
        $this->db->join('quartier q', 'q.ID_ZONE = z.ID_ZONE');
        $this->db->join('maison m', 'm.ID_QUARTIER = q.ID_QUARTIER');
       
      
        $this->db->where('z.ID_ZONE', $ID);
       
        $query = $this->db->get();
        if ($query) {
            return $query->result_array();
        }
    }

}
