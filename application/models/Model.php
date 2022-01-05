<?php

defined('BASEPATH') or exit("No direct script access allowed");

class Model extends CI_Model{
  function insert($table,$data)
  {
    $query= $this->db->insert($table,$data);
    return($query)? true:false;
  }

  function getRequete($requete){
      $query=$this->db->query($requete);
      if ($query) {
         return true;
      }
    }
  function getRequeteOne($requete){
      $query=$this->db->query($requete);
      if ($query) {
         return $query->row_array();
      }
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
    
  function getDataReporting($where= array(),$criteres,$time='')
    {   
        $this->db->select('DISTINCT(r.ID_RELEVE),r.RELEVE_MONTANT,r.MONTANT_PAYE,r.RELEVE_INDEX');
        $this->db->from('releves r');
        $this->db->join('maison m','m.ID_MAISON = r.ID_MAISON');
        $this->db->join('quartier q','q.ID_QUARTIER = m.ID_QUARTIER');
        $this->db->join('zone z','z.ID_ZONE = q.ID_ZONE');
        $this->db->join('commune c','c.ID_COMMUNE = c.ID_COMMUNE');
        $this->db->join('ville v','v.ID_VILLE = c.ID_VILLE');

        $this->db->where($where);
        foreach ($criteres as $key => $value) {
          if($value > 0)
           $this->db->where($key,$value);
        }
         
        $this->db->where($time);
        $qry= $this->db->get();

        return $qry->result_array();
    }

    public function donne_abonnements_maison($criteres)
    {
        $this->db->select("COUNT(m.ID_MAISON) as maison, m.ID_QUARTIER");
        $this->db->from('maison m');
        $this->db->join('quartier q','q.ID_QUARTIER = m.ID_QUARTIER');
        $this->db->join('zone z','z.ID_ZONE = q.ID_ZONE');
       // $this->db->join('commune c','c.ID_COMMUNE = c.ID_COMMUNE');
       // $this->db->join('ville v','v.ID_VILLE = c.ID_VILLE');

        $this->db->group_by('m.ID_QUARTIER');

        if($criteres != NULL)
         $this->db->where($criteres);

        $qry= $this->db->get();

        return $qry->result_array();
    }

    public function getImpayeQuartier($date,$ID_QUARTIER)
    {
       $this->db->select("COUNT(r.ID_RELEVE) as releve");
       $this->db->from('releves r');
       $this->db->join('maison m','m.ID_MAISON = r.ID_MAISON');
       $this->db->where("r.RELEVE_DATE LIKE '%$date%'");
       $this->db->where('m.ID_QUARTIER',$ID_QUARTIER);

       $query = $this->db->get();
       if($query){
        return $query->row_array();
       }
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

    function getList2($table,$critere= array(),$critere2= array())
    {
        $this->db->where($critere);
        $this->db->where($critere2);
        $qry= $this->db->get($table);
        return $qry->result_array();
    }
    public function get_jointure_distinct($distinct=array(),$condition= array(),$dates= array(),$from,$join_1p,$join_2p,$groupby=array())
    {
        $this->db->select($distinct);
        $this->db->where($dates);
        $this->db->group_by($groupby);
        $this->db->where($condition);
        $this->db->from($from);
        $this->db->join($join_1p,$join_2p);
        $query = $this->db->get();
        if($query){
            return $query->result_array();
        }
    }

    function check2($table, $criteres= array(), $criteres2= array()) {
        $this->db->where($criteres);
        $this->db->where($criteres2);
        $query = $this->db->get($table);
        if($query->num_rows() > 0)
        {
           return true ;
        }
        else{
    return false;
    }
    }


    public function get_Proprio_releves($ID,$TYPE) {
    

        $this->db->select('*');
        $this->db->from('proprietaire p');
        $this->db->join('maison_proprietaire mp', 'mp.ID_PROPRIETAIRE = p.ID_PROPRIETAIRE');
        $this->db->join('maison m', 'm.ID_MAISON = mp.ID_MAISON');
        $this->db->join('releves r', 'm.ID_MAISON = r.ID_MAISON');
       
      
        $this->db->where('p.ID_PROPRIETAIRE', $ID);
        $this->db->where('r.TYPE_RELEVE', $TYPE);
       
        $query = $this->db->get();
        if ($query) {
            return $query->result_array();
        }
    }


}
