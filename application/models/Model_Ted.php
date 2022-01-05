<?php

class Model_Ted extends CI_Model {
	function join_client_description($critere){
		$req = $this->db->select('*')
						->from('client')
						->join('description','client.CODE_CLIENT=description.CODE_TX')
						->where($critere)
						->get();
		return $req->result_array();

	}
	function rapportPay($critere){
		$req = $this->db->select('*')
						->from('gestionnaire')
						->join('groupe','groupe.CODE_GESTION=gestionnaire.CODE_GESTION')
						->join('module','module.CODE_GROUPE=groupe.CODE_GROUPE')
						->join('pay_module','pay_module.CODE_MODULE=module.CODE_MODULE')
						->join('devise','devise.CODE_DEVISE=pay_module.CODE_DEVISE')
						->where($critere)
						->get();
		return $req->result_array();
	}
	function getGoupInfo($critere){
		$req = $this->db->select('*')
						->from('gestionnaire')
						->join('groupe','groupe.CODE_GESTION=gestionnaire.CODE_GESTION')
						->join('members','members.CODE_GROUPE=groupe.CODE_GROUPE')
						->join('client','client.CODE_CLIENT=gestionnaire.CODE_COMPTE')
						->where($critere)
						->get();
		return $req->result_array();

	}
	function getJoinGuichet($critere){
		$query = $this->db->select('*')
							->from('guichet')
							->join('agent','agent.CODE_AGENT=guichet.CODE_AGENT')
							->join('pays','pays.CODE_PAYS_ALPHA3=guichet.CODE_PAYS_ALPHA3')
							->where($critere)
							->get();
		return $query->row_array();
	}
	function chart($critere,$month){
		$req = $this->db->query("SELECT  MONTH(DATE_RT) AS mois, DATE_FORMAT(DATE_RT,'le %d/%m/%Y à %Hh%imin%ss') AS dayone, MONTANT_RX AS recu, MONTANT_TX AS transmis,ABBR_DEVISE AS devise FROM devise INNER JOIN rec_trans ON devise.CODE_DEVISE=rec_trans.CODE_DEVISE WHERE MONTH(DATE_RT)=$month AND IS_ACTIF_RT=9 AND CODE_TX=? OR CODE_RX=? ORDER BY DATE_RT DESC",array($critere,$critere));
		return $req->result_array();
	}
	function getMonth($critere){
		$query = $this->db->query("SELECT MONTH(DATE_RT) AS fetchMonth FROM rec_trans WHERE CODE_TX =? OR CODE_RX=?",array($critere,$critere));
		return $query->row_array();
	}
	function getHours($critere){
		$query = $this->db->query("SELECT DATE_FORMAT(DATE_RT,'le %d/%m/%Y à %Hh%imin%ss') AS dayone, MONTANT_RX AS montant FROM rec_trans WHERE MONTH(DATE_RT)=?",$critere);
		return $query->result_array();
	}
	function getAmountGroup($critere){
		$req = $this->db->query('SELECT  * FROM groupe INNER JOIN payement ON groupe.CODE_GROUPE=payement.CODE_TX  WHERE IS_ACTIF_PAYEMENT=9 AND CODE_TX=? OR CODE_RX=? ORDER BY DATE_PAYEMENT  DESC LIMIT 5',array($critere,$critere));
		return $req->result_array();
	}
	function getOneJoinMembers($critere){
		$query = $this->db->select('*')
						->from('client')
						->join('members','members.CODE_COMPTE=client.CODE_CLIENT')
						->join('groupe','groupe.CODE_GROUPE=members.CODE_GROUPE')
						->order_by('DATE_CREATION','DESC')
						->where($critere)
						->get();
		return $query->result_array();
	}
	function querygroup($critere){
		$query = $this->db->query('SELECT * FROM groupe INNER JOIN gestionnaire ON groupe.CODE_GESTION=gestionnaire.CODE_GESTION WHERE IS_ACTIF_GESTION=9 AND IS_ACTIF_GROUPE=9 AND groupe.CODE_GESTION =? ORDER BY DATE_CREATION_GR DESC',$critere);
		return $query->result_array();
	}
	function report_agent($critere){
		// $req = $this->db->query('SELECT  * FROM client INNER JOIN rec_trans_systm ON client.CODE_AGENT=rec_trans_systm.CODE_TX OR agent.CODE_AGENT=rec_trans_systm.CODE_RX WHERE IS_ACTIF_RT=9 AND CODE_TX=? OR CODE_RX=? ORDER BY DATE_RT  DESC',array($critere,$critere));
		// return $req->result_array();
		$req = $this->db->query('SELECT  * FROM client INNER JOIN rec_trans_systm ON client.CODE_CLIENT=rec_trans_systm.CODE_RX WHERE IS_ACTIF_RT=9 AND CODE_TX=? OR CODE_RX=? ORDER BY DATE_RT DESC',array($critere,$critere));
		return $req->result_array();
	}
	function report_agent2($critere){
		$req = $this->db->query('SELECT  * FROM agent INNER JOIN rec_trans_systm ON agent.CODE_AGENT=rec_trans_systm.CODE_TX OR agent.CODE_AGENT=rec_trans_systm.CODE_RX WHERE IS_ACTIF_RT=9 AND CODE_TX=? OR CODE_RX=? ORDER BY DATE_RT  DESC',array($critere,$critere));
		return $req->result_array();
		
	}
	// function retrait_depot_client($critere){
	// 	$req = $this->db->query('SELECT  * FROM client INNER JOIN rec_trans_systm ON client.CODE_CLIENT=rec_trans_systm.CODE_TX WHERE IS_ACTIF_RT=9 AND CODE_TX=? OR CODE_RX=? ORDER BY DATE_RT DESC',array($critere,$critere));
	// 	return $req->result_array();
	// }
	function report_client($critere){
		$req = $this->db->query('SELECT  * FROM client INNER JOIN rec_trans ON client.CODE_CLIENT=rec_trans.CODE_TX WHERE IS_ACTIF_RT=9 AND CODE_TX=? OR CODE_RX=? ORDER BY DATE_RT DESC',array($critere,$critere));
		return $req->result_array();
	}
	function list_last_one($critere){
		$req = $this->db->query('SELECT * FROM rec_trans_systm INNER JOIN agent ON agent.CODE_AGENT=agent.CODE_AGENT WHERE rec_trans_systm.CODE_TX=? AND IS_ACTIF_RT=9 ORDER BY DATE_RT DESC LIMIT 1',$critere);

		return $req->row_array();
	}
	function list_last_receive($critere){
		$req = $this->db->select('*')
					->from('agent')
					->join('rec_trans_systm','rec_trans_systm.CODE_RX=agent.CODE_AGENT')
					->join('client','client.CODE_CLIENT=rec_trans_systm.CODE_TX')
					->join('devise','devise.CODE_DEVISE=rec_trans_systm.CODE_DEVISE')
					->where($critere)
					->order_by('rec_trans_systm.DATE_RT','DESC')
					->get();
			return $req->row_array();
	}
	function list_last_act($critere){
		$req = $this->db->select('*')
					->from('agent')
					->join('rec_trans_systm','rec_trans_systm.CODE_TX=agent.CODE_AGENT')
					->join('client','client.CODE_CLIENT=rec_trans_systm.CODE_RX')
					->join('devise','devise.CODE_DEVISE=rec_trans_systm.CODE_DEVISE')
					->where($critere)
					->order_by('rec_trans_systm.DATE_RT','DESC')
					->get();
			return $req->row_array();
	}
	function join_client_solde2($criteres){
		$req = $this->db->query('SELECT * FROM solde INNER JOIN devise ON devise.CODE_DEVISE = solde.CODE_DEVISE WHERE IS_ACTIF_SOLDE=9 AND IS_ACTIF_DEVISE=9 AND solde.CODE_CLIENT=? AND solde.CODE_DEVISE=?',array($criteres));
			return $req->result_array();
	}
	function join_client_solde3($criteres){
		$req = $this->db->query('SELECT * FROM solde,devise WHERE IS_ACTIF_SOLDE=9 AND IS_ACTIF_DEVISE=9 AND solde.CODE_CLIENT=?',array($criteres));
			return $req->result_array();
	}
	function join_solde_agent_devise1($criteres){
		
		 $req = $this->db->select('*')
		 			->from('agent')
		 			->join('solde_system','solde_system.CODE_CLIENT=agent.CODE_AGENT')
		 			->join('devise','devise.CODE_DEVISE=solde_system.CODE_DEVISE')
					->where($criteres)
					->order_by('solde_system.LAST_UPDATE_SOLDE_AT','DESC')
		 			->get();
		 	return $req->result_array();
	}
	function join_solde_agent_devise($criteres){
		$req = $this->db->query('SELECT * FROM solde_system INNER JOIN devise ON devise.CODE_DEVISE = solde_system.CODE_DEVISE WHERE IS_ACTIF_SOLDE=11 AND IS_ACTIF_DEVISE=9 AND solde_system.CODE_CLIENT=? ORDER BY solde_system.LAST_UPDATE_SOLDE_AT DESC',array($criteres));
			return $req->result_array();
		// $req = $this->db->select('*')
		// 			->from('agent')
		// 			->join('solde_system','solde_system.CODE_CLIENT=agent.CODE_AGENT')
		// 			->join('devise','devise.CODE_DEVISE=solde_system.CODE_DEVISE')
		// 			->where($criteres)
		// 			->order_by('solde_system.LAST_UPDATE_SOLDE_AT','DESC')
		// 			->get();
		// 	return $req->result_array();
	}

	function list_Some_amout($critere){
		$req = $this->db->query('SELECT SUM(MONTANT_TX) FROM rec_trans WHERE CODE_TX=?',$critere);
		return $req->result();
	}
		function join_solde_client($criteres){
		$req = $this->db->select('*')
					->from('client')
					->join('solde','solde.CODE_CLIENT=client.CODE_CLIENT')
					->where($criteres)
					->order_by('solde.LAST_UPDATE_SOLDE_AT','DESC')
					->get();
			return $req->row_array();
	}
	function join_solde_system_devise($criteres){
		$req = $this->db->select('*')
					->from('devise')
					->join('solde_system','devise.CODE_DEVISE=solde_system.CODE_DEVISE')
					->where($criteres)
					->order_by('solde_system.LAST_UPDATE_SOLDE_AT','DESC')
					->get();
			return $req->result_array();
	}
	function join_client_solde($criteres){
		$req = $this->db->select('*')
					->from('client')
					->join('solde','solde.CODE_CLIENT=client.CODE_CLIENT')
					->join('devise','devise.CODE_DEVISE=solde.CODE_DEVISE')
					->where($criteres)
					->order_by('solde.LAST_UPDATE_SOLDE_AT','DESC')
					->get();
			return $req->result_array();
	}

	function join_ag_prof_gui($critere){
		$req = $this->db->select('*')
					->from('agent A')
					->join('guichet','guichet.CODE_GUICHET=A.CODE_GUICHET')
					->join('profil_agent','profil_agent.ID_PROFIL_AGENT=A.ID_PROFIL_AGENT')
					->where($critere)
					->order_by('A.CREATED_AGENT_AT','DESC')
					->get();
			return $req->result_array();
	}
	function list_all_join_mod_formateur($critere){
		$req = $this->db->select('*')
					->from('tbl_mod_formateur')
					->join('tbl_utilisateur','tbl_utilisateur.CODE_UTILISATEUR=tbl_mod_formateur.CODE_UTILISATEUR')
					->join('tbl_module','tbl_module.CODE_MODULE=tbl_mod_formateur.CODE_MODULE')
					->where($critere)
					->order_by('DATE_ATTRIBUTION','DESC')
					->get();
			return $req->result_array();
	}

	function list_all_join_module($critere){
		$req = $this->db->select('*')
					->from('tbl_module')
					->join('tbl_utilisateur','tbl_utilisateur.CODE_UTILISATEUR=tbl_module.CODE_UTILISATEUR')
					->join('tbl_formation','tbl_formation.CODE_FORMATION=tbl_module.CODE_FORMATION')
					->where($critere)
					->order_by('DATE_AJOUT_MODULE','DESC')
					->get();
			return $req->result_array();
		}

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
		function count_a_field($table,$field){
			$this->db->select($field);
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
		
	function list_different_champ($table,$champ,$value,$critere){
			$this->db->select('*');
			$this->db->where($champ.'!=',$value);
			$this->db->where($critere);
			$query=$this->db->get($table);
			if ($query) {
            return $query->result_array();
			}
		}

	function list_Some_Order($table, $condition,$champ,$value="ASC") {
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

	function querysql($sql,$critere=array()){
		$query=$this->db->query($sql,$critere);
		return $query->row_array();
		//return $query->row_array();

	}
	function queryprepare($sql,$critere=array()){
		$query=$this->db->query($sql,$critere);
		if ($query) {
			return true;
		}
		else{
			return false;
		}
		//return $query->row_array();

	}
	function querypreparemix($sql,$critere=array()){
		$query=$this->db->query($sql,$critere);
		return $query->result_array();
		//return $query->row_array();

	}
	function querycount($sql,$critere=array()){
		$query=$this->db->query($sql,$critere);
		return $query->num_rows();
		//return $query->row_array();

	}
	function querysql2($sql,$critere=array()){
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