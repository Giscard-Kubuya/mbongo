<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {
	protected $tbl='';
        
    public function index() {  
    		$criteres['client.CODE_CLIENT'] = $this->session->userdata('CODE');
    		$criteres['IS_ACTIF_DEVISE'] = 9;
    		$this->tbl = 'client';

	    	$data['devise'] = $this->getDevise($criteres);

        // 	$getClient = $this->Model_Ted->list_Some('client',array('IS_ACTIF_CLIENT'=>9));
        
        // $html_client = '';
        // foreach($getClient as $key){
        // 	if($key['CODE_CLIENT']==$this->session->userdata('CODE')){

        // 	}

        // 	else{
        // 	 $html_client .= '<option value="'.$key['CODE_CLIENT'].'">'.$key['PSEUDO_CLIENT'].'</option>';
        // 	}
        // }

        // $data['data'] = $html_client;
        $this->load->view('Dashboard_View', $data);

	}
	private function getModule($codeGroupe){
		$fetchModule = $this->Model_Ted->list_Some('module',array('IS_ACTIF_MODULE'=>9,'CODE_GROUPE'=>$codeGroupe));
		$html ='';
		foreach($fetchModule as $key){
			$devise = $key['CODE_DEVISE'];
			$dev = $this->Model->getOne('devise',array('IS_ACTIF_DEVISE'=>9,'CODE_DEVISE'=>$devise));
			$html.='<option  value="'.$key['CODE_MODULE'].'">'.$key['NOM_MODULE'].'('.$key['PRIX_MODULE'].''.$dev['ABBR_DEVISE'].')</option>';
		}
		return $html;
	}

	public function Localisation(){

		$guichet = $this->Model_Ted->querysql2("SELECT * FROM guichet INNER JOIN agent ON agent.CODE_AGENT=guichet.CODE_AGENT WHERE IS_ACTIF_GUICHET=9 AND IS_ACTIF_AGENT=15");

		//$criteres['client.CODE_CLIENT'] = $this->session->userdata('CODE');
		// echo "<pre>";
		// print_r($guichet);
		// exit();
		$html_guichet = '';
		
		foreach($guichet as $key){
			$codePays = $key['CODE_PAYS_ALPHA3'];
			$pays = $this->Model->getOne('pays',array('CODE_PAYS_ALPHA3'=>$codePays));
			$html_guichet.= '<li class="card-body">
                                            <a href="#" class="m-b-0 p-0" data-toggle="modal" data-target="#my_groupe'.$key['ID_GUICHET'].'">
                                                <div class="d-flex no-block">
                                                    <i  class="fa fa-check-circle w-30px m-t-5"></i>
                                                    <div>
														<div data-toggle="tooltip" title="Cliquer pour voir le details de '.$key['NOM_GUICHET'].'" >
                                                        <span class="font-bold">Guichet '.$key['NOM_GUICHET'].'
                                                        </span> responsabilisé par '.$key['PRENOM_AGENT'].' '.$key['PSEUDO_AGENT'].' '.$key['NOM_AGENT'].' 
                                                        </span>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </a>
                                                       
                                        </li>

                            <div class="modal fade mine_pay" id="my_groupe'.$key['ID_GUICHET'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content text-center">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">'.$key['NOM_GUICHET'].'</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div id="less">
                                  		<li class="card-body">
                                                <div class="d-flex no-block">
                                                    <i  class="fa fa-location-arrow w-30px m-t-5"></i>
                                                    <div>
														
                                                         Description du guichet :  <span class="font-bold">'.$key['DESCRIPTION_GUI'].' </span>
                                                       
                                                        
                                                    </div>
                                                </div>
                                          
                                                       
                                        </li>
                                  
                                        <li class="card-body">
                                                <div class="d-flex no-block">
                                                    <i  class="fa fa-compass w-30px m-t-5"></i>
                                                    <div>
														
                                                         Adresse :  <span class="font-bold">'.$pays['NOM_FR_FR'].'/'.$key['ADDRESSE_GUI'].' </span>
                                                       
                                                        
                                                    </div>
                                                </div>
                                          
                                                       
                                        </li>
                                        <li class="card-body">
                                                <div class="d-flex no-block">
                                                    <i  class="fa fa-phone w-30px m-t-5"></i>
                                                    <div>
														
                                                         Télephone :  <span class="font-bold">'.$key['TELEPHONE_GUI'].' </span>
                                                       
                                                        
                                                    </div>
                                                </div>
                                          
                                                       
                                        </li>
                                        <li class="card-body">
                                                <div class="d-flex no-block">
                                                    <i  class="fa fa-envelope w-30px m-t-5"></i>
                                                    <div>
														
                                                         Mail :  <span class="font-bold">'.$key['EMAIL_GUI'].' </span>
                                                       
                                                        
                                                    </div>
                                                </div>
                                          
                                                       
                                        </li>
                                        <p class="help-block"><i class="fa fa-clock"></i> Existe '.helper_get_timeago($key['CREATED_GUICHET_AT']) .'</p>
                                  

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                  </div>
								</div>



                                </div>
                              </div>
                            </div>';
		}



		

		$dt['guichet'] = $html_guichet; 

		$this->load->view('Geo_View',$dt);

	}

	public function Rapport2(){
		$fetchRapport = $this->Model_Ted->rapportPay(array('IS_ACTIF_PAY'=>9,'pay_module.CODE_CLIENT'=>$this->session->userdata('CODE')));
		$html_rapport='';
		$compteur=1;
		foreach ($fetchRapport as $key) {
			$html_rapport.='<tr class="">
	                
	                <td>
	                    '.$compteur++.'
	                </td>
	                <td>
	                    '.$key['NOM_GROUPE'].'
	                </td>
	                <td class="center">
	                   '.$key['NOM_MODULE'].'
	                </td>
	                <td>
	                    '.$key['MONTANT_TX'].''.$key['ABBR_DEVISE'].'
	                </td>
	                <td class="center">
	                    '.$key['DATE_PAY'].'
	                </td>
	            </tr>';
		}
		$dt['repport'] = $html_rapport;
		$this->load->view('Rapport_List_Pay_View',$dt);
	}

	public function pay(){
		
		$this->form_validation->set_rules('modPay','Module','trim|required');
		$this->form_validation->set_rules('montantPay','Montant','required|trim');
		$this->form_validation->set_rules('DevPay','Devise','required|trim');
		$this->form_validation->set_rules('mdppay','Mot de passe','required|trim');
		$this->form_validation->set_rules('descriptionPay','Description','required|trim');
		$this->form_validation->set_rules('Manager','Manager','required|trim');
	


		if($this->form_validation->run()){
			$groupeManager=html_escape($this->security->xss_clean($this->input->post('Manager')));
			$amount=html_escape($this->security->xss_clean($this->input->post('montantPay')));
			$module = html_escape($this->security->xss_clean($this->input->post('modPay')));

			$montant = preg_replace("/\s+/"," ",$amount);
			$devise =html_escape($this->security->xss_clean($this->input->post('DevPay')));
			$description =html_escape($this->security->xss_clean($this->input->post('descriptionPay')));
			$mdp = html_escape($this->security->xss_clean($this->input->post('mdppay')));
			$montant = floatval($montant);

			$montantRX = helper_facturation($montant);
		if(password_verify($mdp, $this->session->userdata('MDP'))){

		if($montantRX=='error'){
			echo  'Erreur#Veuillez entrer un nombre valide et superieur à 1#error';
		}
		else{
		$check_my_amount = $this->Model_Ted->join_solde_client(array('IS_ACTIF_CLIENT'=>9,'solde.CODE_CLIENT'=>$this->session->userdata('CODE'),'IS_ACTIF_SOLDE'=>9,'solde.CODE_DEVISE'=>$devise));
		if(!$check_my_amount){
			echo  'Desolé#Il n\'ya pas de solde disponible';
			}
			else{
					$checkModule = $this->Model->getOne('module',array('IS_ACTIF_MODULE'=>9,'CODE_MODULE'=>$module));
				if ($devise!=$checkModule['CODE_MODULE']) {
				if($montant < $check_my_amount['MONTANT_SOLDE']-$montantRX[1]){

					$sommes_me = $check_my_amount['MONTANT_SOLDE']-$montant;

					$code_transaction=generate_code('pay_module','CODE_PAY','paymt');

					$data = array('CODE_PAY'=>$code_transaction,'CODE_MODULE'=>$module,'CODE_CLIENT'=>$this->session->userdata('CODE'),'CODE_DEVISE'=>$devise,'MONTANT_TX'=>$montant,'DESCRIPTION_PAY'=>$description);
				


		

					if($this->available_amount_when_pay($devise,$groupeManager,$montant,$data)==true){
						// $systm = $this->Model->getOne('solde',array('IS_ACTIF_SOLDE'=>9,'CODE_DEVISE'=>$devise,'CODE_CLIENT'=>$this->session->userdata('CODE')));
						//  $dt_update['MONTANT_SOLDE'] = $systm['MONTANT_SOLDE'] - $montant;
						//  $dt_update['LAST_UPDATE_SOLDE_AT'] =date('Y-m-d H:i:s');
						// $dt['MONTANT_SOLDE'] = $systm['MONTANT_SOLDE'] + $montantRX[1];
						// $dt['CODE_DEVISE'] = $devise; 
						// $dt['LAST_UPDATE_SOLDE_AT'] =date('Y-m-d H:i:s');

						

						$this->Model_Ted->update(
							'solde',
							array(
								'CODE_DEVISE'=>$devise,
								'solde.CODE_CLIENT'=>$this->session->userdata('CODE'),
								'IS_ACTIF_SOLDE'=>9
							),
							array(
								'MONTANT_SOLDE'=>$sommes_me,
								'LAST_UPDATE_SOLDE_AT'=> date('Y-m-d H:i:s')
							));
						$getDev = $this->Model->getOne('devise',array('IS_ACTIF_DEVISE'=>9,'CODE_DEVISE'=>$devise));
						$getRx = $this->Model->getOne('module',array('IS_ACTIF_MODULE'=>9,'CODE_MODULE'=>$module));
						echo  'Transaction reussie#'.$montant.''.$getDev['ABBR_DEVISE'].' payé au module '.$getRx['NOM_MODULE'].' #success';

					}else{
						echo  'Erreur#Une erreur lors de la transaction#error';
					}
				}
				else{
					echo  'Erreur#Le solde est insuffisant pour faire cette transaction#error';
				}
			}
			else{
				echo  'Erreur#Ce devise n\'est pas requiert pour ce module#error';
			}

			}
		
	

		}
	}
	else{
	echo  'Erreur#L\'identifiant est incorrect#error';
}


		}
		else{
			echo  'Erreur#Tous les champs sont requis#error';
		}


	


	}
	private function available_amount_when_pay($devise,$code,$montant,$data){
		$check_amount = $this->Model->getOne('solde',array('CODE_CLIENT'=>$code,'IS_ACTIF_SOLDE'=>9,'CODE_DEVISE'=>$devise));
		

			if(empty($check_amount && $montant>0)){
				$code_solde=generate_code('solde','CODE_SOLDE','sld');
				$this->Model_Ted->register('solde',array('CODE_CLIENT'=>$code,'CODE_DEVISE'=>$devise,'CODE_SOLDE'=>$code_solde,'MONTANT_SOLDE'=>$montant));
				$this->Model_Ted->register('pay_module',$data);
				return true;
				
			}
			elseif($check_amount && $montant>0){
				$condition = array('IS_ACTIF_SOLDE'=>9,'CODE_DEVISE'=>$devise,'CODE_CLIENT'=>$code);
				// $this->Model_Ted->update('solde',$data,array('MONTANT_SOLDE'=>$sommes));
				$sommes =$check_amount['MONTANT_SOLDE'] + $montant;

				if($this->Model_Ted->update('solde',$condition,array('CODE_DEVISE'=>$devise,'MONTANT_SOLDE'=>$sommes,'LAST_UPDATE_SOLDE_AT'=> date('Y-m-d H:i:s')))){
					$this->Model_Ted->register('pay_module',$data);
					return true;
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		
		
	}

	public function Payement(){

		$groupShow = $this->Model_Ted->getGoupInfo(array('members.CODE_COMPTE'=>$this->session->userdata('CODE'),'IS_ACTIF_MEMBER'=>9));
		$criteres['client.CODE_CLIENT'] = $this->session->userdata('CODE');
		
		$html_groupe = '';
		foreach($groupShow as $key){
			$html_groupe.= '<li class="card-body">
                                            <a href="#" class="m-b-0 p-0" data-toggle="modal" data-target="#my_groupe'.$key['ID_GROUPE'].'">
                                                <div class="d-flex no-block">
                                                    <i class="fa fa-check-circle w-30px m-t-5"></i>
                                                    <div>
                                                        <span class="font-bold">'.$key['NOM_GROUPE'].'</span> Administré par '.$key['PRENOM_CLIENT'].' '.$key['PSEUDO_CLIENT'].' <span class="font-bold">.Contact :'.$key['TELEPHONE'].'</span>
                                                    </div>
                                                </div>
                                            </a>
                                                        <span>Existe '.helper_get_timeago($key['CREATED_CLIENT_AT']).'</span>
                                        </li>
                            <div class="modal fade mine_pay" id="my_groupe'.$key['ID_GROUPE'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">'.$key['NOM_GROUPE'].'</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div id="bodyDescription">Description du groupe:
                                   '.$key['DESCRIPTION'].'<hr><br>
                                   Description qui m\'est affectée :
                                   '.$key['DESCRIPTION_MEMBRE'].'<hr><br>
                                  

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    
                                    <button type="button" class="btn btn-primary" id="showForm">Faire un payement</button>
                                  </div>
								</div>



                                  <div class="card" id="paybody">

                                        <form class="form-horizontal" id="payment" name="payment">
                                            <div class="card-body">
                                                
                                                
                                                <div class="form-group row">
                                                    <label for="modPay" class="col-sm-3 text-right control-label col-form-label">Module</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="modPay" id="modPay">
                                                            <option value="">---Choisir un module---</option>
                                                            '.$this->getModule($key['CODE_GROUPE']).'
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="montantPay" class="col-sm-3 text-right control-label col-form-label">Montant</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" name="montantPay" id="montantPay" placeholder="Montant">
                                                        <input type="hidden" value="'.$key['CODE_CLIENT'].'" name="Manager" id="Manager" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="DevPay" class="col-sm-3 text-right control-label col-form-label">Devise</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control" name="DevPay" id="DevPay">
                                                            <option value="">---Selectionnez un devise---</option>
                                                            '.$this->getDevise($criteres).'
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="descriptionPay" class="col-sm-3 text-right control-label col-form-label">Description du paiement</label>
                                                    <div class="col-sm-9">
                                                        <textarea id="descriptionPay" name="descriptionPay" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="mdppay" class="col-sm-3 text-right control-label col-form-label">Mot de passe</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control" name="mdppay" id="mdppay" placeholder="****">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                    			<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    			<button type="button" class="btn btn-primary" id="showDescription">Descrition</button>
                                    			<button type="button" class="btn btn-primary" id="sendPay">Envoyer</button>
                                  			</div>
                                        </form>
                                    </div>




                                </div>
                              </div>
                            </div>';
		}



		

		$dt['groupe'] = $html_groupe; 

		$this->load->view('Payement_View',$dt);
	}

	public function Stat(){
		$fetchMoth = $this->Model_Ted->getMonth($this->session->userdata('CODE'));
		// $mois = $this->Model_Ted->getHours($date);


		

		#$mois = $this->Model_Ted->querysql2('SELECT TIME(DATE_RT) AS heure,MONTANT_TX AS montant FROM rec_trans');
		$ind = (int)$fetchMoth['fetchMonth']-1;
		$myTraffic = $this->Model_Ted->chart($this->session->userdata('CODE'),$ind);
		
		


		$dt['month'] = helper_Tabmois($ind);
		$dt['data'] = $myTraffic;

		$this->load->view('Statistic_View',$dt);
	}

	public function Groupe(){
		$response['status'] = false;
		$data = $this->Model_Ted->getAmountGroup($this->session->userdata('CODE'));
		$num = 1;
		$html = ' <thead>
                    <tr class="bg-warning">
                        <th>Action#1</th>
                        <th>Montant envoie</th>
                        <th>Action#2</th>
                        <th>Montant reçu</th>
                        <th>Date d\'action</th>
                    </tr>
                </thead>';
		foreach($data as $key){
		$response['status'] = true;
		$dev['CODE_DEVISE'] = $key['CODE_DEVISE'];
		$dev['IS_ACTIF_DEVISE'] = 9;
		$devise = $this->Model->getOne('devise',$dev);
		if ($key['CODE_TX']==$this->session->userdata('CODE')) {
			$transmetteur = 'Moi';
		}
		else{
			$transmetteur =$key['NOM_GROUPE'];
		}
		if ($key['CODE_RX']==$this->session->userdata('CODE')) {
			$recepteur = 'Moi';
		}
		else{
			$transmetteur =$key['NOM_GROUPE'];
		}
		$html.='<tr class="">
	                
	                <td>
	                    '.$transmetteur.'
	                </td>
	                <td>
	                    '.$key['MONTANT_TX'].''.$devise['ABBR_DEVISE'].'
	                </td>
	                <td class="center">
	                    '.$recepteur.'
	                </td>
	                <td class="center">
	                    '.$key['MONTANT_RX'].''.$devise['ABBR_DEVISE'].'
	                </td>
	                <td class="center">
	                    '.getFortmat($key['DATE_PAYEMENT']).'
	                </td>
	            </tr>';
	}
	$response['html'] = $html;
	echo json_encode($response);
}
public function updateSeen(){
	$this->Model_Ted->update('description',array('CODE_RX'=>$this->session->userdata('CODE'),'IS_ACTIF_DESCRIPTION'=>9),array('SEEN'=>7));
}
public function Description(){

		$seen = $this->Model_Ted->join_client_description(array('CODE_RX'=>$this->session->userdata('CODE'),'IS_ACTIF_DESCRIPTION'=>9,'SEEN'=>0));
		
		$COUNT = $this->Model_Ted->count_number('description',array('IS_ACTIF_DESCRIPTION'=>9,'CODE_RX'=>$this->session->userdata('CODE'),'SEEN'=>0));
		$all = $this->Model_Ted->join_client_description(array('CODE_RX'=>$this->session->userdata('CODE'),'IS_ACTIF_DESCRIPTION'=>9));
		$html_seen = '';
		$html_all = '';
if ($COUNT) {
		foreach ($seen as $key) {
			
			if ($key['PSEUDO_CLIENT']!=$this->session->userdata('PSEUDO')) {
			$html_seen .= '
			<a id ="'.$key['ID_DESCRIPTION'].'"  class="link border-top">
	            <div class="d-flex no-block align-items-center p-10">
	                <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
	                <div class="m-l-10">
	                    <h5 class="m-b-0">'.$key['PSEUDO_CLIENT'].' '.$key['PRENOM_CLIENT'].'</h5> 
	                    <span class="mail-desc">'.$key['DESCRIPTION'].'</span> 
	                </div>
	            </div>
	        </a>
			';
			}
			else{

			}
		}
}else{
	$html_seen .='<a href="#" class="link border-top">
	            <div class="d-flex no-block align-items-center p-10">
	                <span class="btn btn-success btn-circle"><i class="ti-calendar"></i></span>
	                <div class="m-l-10">
	                    <h5 class="m-b-0">Description</h5> 
	                    <span class="mail-desc">Aucune nouvelle description </span> 
	                </div>
	            </div>
	        </a>';

}
		foreach ($all as $key) {
			$html_all .= '';
		}
		$response['count'] = $COUNT;

		$response['seen'] = $html_seen;
		$response['all'] = $html_all;
		echo json_encode($response);
}
	// solde for report on dashboard client
	public function devise(){
		$count = $this->Model_Ted->count_number('solde',array('CODE_CLIENT'=>$this->session->userdata('CODE')));
		$countDev = $this->Model_Ted->count_number('devise',array('IS_ACTIF_DEVISE'=>9));
		#$req = ('SELECT * FROM devise INNER JOIN solde ON devise.CODE_DEVISE!=solde.CODE_DEVISE WHERE IS_ACTIF_DEVISE=9 AND CODE_CLIENT = ?');
		$critere =array($this->session->userdata('CODE'));
		$sent = ('SELECT MAX(MONTANT_TX) AS maxAmount,MIN(MONTANT_TX) AS minAmount,ABBR_DEVISE FROM rec_trans INNER JOIN devise ON devise.CODE_DEVISE=rec_trans.CODE_DEVISE WHERE CODE_TX=?');
		$received = ('SELECT MAX(MONTANT_RX) AS maxAmount,MIN(MONTANT_RX) AS minAmount,ABBR_DEVISE FROM rec_trans INNER JOIN devise ON devise.CODE_DEVISE=rec_trans.CODE_DEVISE WHERE CODE_RX=?');
		$getReceived = $this->Model_Ted->querypreparemix($received,$critere);
		$getSent = $this->Model_Ted->querypreparemix($sent,$critere);


		$html_sent = '';
		$html_received = '';
		foreach ($getReceived as $key) {
			$html_received .= ' <div class="bg-dark p-10 text-white text-center">
                                   <i class="fa fa-plus m-b-5 font-16"></i>
                                   <h5 class="m-b-0 m-t-5">'.$key['maxAmount'].''.$key['ABBR_DEVISE'].'</h5>
                                   <small class="font-light">Great amout received</small>
                                </div>
                                <div class="bg-dark p-10 text-white text-center">
                                   <i class="fa fa-plus m-b-5 font-16"></i>
                                   <h5 class="m-b-0 m-t-5">'.$key['minAmount'].''.$key['ABBR_DEVISE'].'</h5>
                                   <small class="font-light">Less amout received</small>
                                </div>';
		}

		foreach ($getSent as $key) {
			$html_sent .= ' <div class="bg-dark p-10 text-white text-center">
	                           <i class="fa fa-plus m-b-5 font-16"></i>
	                           <h5 class="m-b-0 m-t-5">'.$key['maxAmount'].''.$key['ABBR_DEVISE'].'</h5>
	                           <small class="font-light">Great amout sent</small>
	                        </div>
	                        <div class="bg-dark p-10 text-white text-center">
                                   <i class="fa fa-plus m-b-5 font-16"></i>
                                   <h5 class="m-b-0 m-t-5">'.$key['minAmount'].''.$key['ABBR_DEVISE'].'</h5>
                                   <small class="font-light">Less amout received</small>
                                </div>';
		}

		// $deviseEmpty = $this->Model_Ted->querypreparemix($req,$critere);
		// echo "<pre>";
		// print_r($deviseEmpty);
		// exit();
		$htmlDevise = '';
		

		$devEmp = $this->Model_Ted->list_Some('devise',array('IS_ACTIF_DEVISE'=>9));
		foreach ($devEmp as $cle) {
			$dev = $cle['CODE_DEVISE'];
			#$solde = $this->Model_Ted->join_client_solde2($this->session->userdata('CODE'),$dev);
			$solde2 = $this->Model->getOne('solde',array('CODE_CLIENT'=>$this->session->userdata('CODE'),'CODE_DEVISE'=>$dev));
			
			if ($solde2['CODE_DEVISE']==$dev) {
				$htmlDevise.= '<div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-cash-multiple"></i></h1>
                                <h6 class="text-white" >'.$solde2['MONTANT_SOLDE'].''.$cle['ABBR_DEVISE'].'</h6>
                            </div>
                        </div>
                    </div> ';
			}
			else{
				$htmlDevise.= '<div class="col-md-6 col-lg-4 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-cash-multiple"></i></h1>
                                <h6 class="text-white" >0'.$cle['ABBR_DEVISE'].'</h6>
                            </div>
                        </div>
                    </div> ';
			}
			
		}
		



		
		$response['sent'] = $html_sent;
		$response['received'] = $html_received;
		$response['html'] = $htmlDevise;

        echo json_encode($response);

	}
	public function listAgent(){
		$agents = $this->Model_Ted->querysql('SELECT * FROM agent WHERE IS_ACTIF_AGENT=15 ORDER BY RAND()');
    	$html='';
    	foreach($agents as $key){
    			$html.='<option value="'.$key['CODE_AGENT'].'">'.$key['MATRICULE_AGENT'].'</option>';
    		
    	}
    	$data['code_agent'] = $html;
    	$this->load->view('Retrait_View',$data);
	}
	public function formAgent(){
    		$criteres['client.CODE_CLIENT'] = $this->session->userdata('CODE');
    		$criteres['IS_ACTIF_DEVISE'] = 9;
    		$this->tbl = 'agent';
    		
    		$agent_critere['CODE_AGENT'] = trim($this->input->post('get_beneficiaire'));
    		$agent_critere['IS_ACTIF_AGENT'] = 15;
	    	$data['devise'] = $this->getDevise($criteres);
	    	$data['data'] = $this->getOne($agent_critere);
	    	
	    	$this->load->view('Client_Retrait_View',$data);

    }
	public function list(){
    $data['code_client'] = $this->get_all();

	$this->load->view('Client_Search_View',$data);

    }
    private function get_all(){
    	$clients = $this->Model_Ted->querysql('SELECT * FROM client WHERE IS_ACTIF_CLIENT=9 ORDER BY RAND()');
    	$html='';
    	foreach($clients as $key){
    		if($key['CODE_CLIENT']==$this->session->userdata('CODE')){}
    		else{
    			$html.='<option value="'.$key['CODE_CLIENT'].'">'.$key['MATRICULE_CLIENT'].'</option>';
    		}
    	}
    	return $html;
    }
    public function form(){
    		$criteres['client.CODE_CLIENT'] = $this->session->userdata('CODE');
    		$criteres['IS_ACTIF_DEVISE'] = 9;
    		$this->tbl = 'client';
    		
    		$client_critere['CODE_CLIENT'] = trim($this->input->post('get_beneficiaire'));
    		$client_critere['IS_ACTIF_CLIENT'] = 9;
	    	$data['devise'] = $this->getDevise($criteres);
	    	$data['data'] = $this->getOne($client_critere);
	    	
	    	$this->load->view('Search_Found_Client',$data);

    }
    private function getDevise($critere=array()){
		$all = $this->Model_Ted->join_client_solde($critere);
		$html ='';
		foreach($all as $key){
			$html.='<option  value="'.$key['CODE_DEVISE'].'">'.$key['NOM_DEVISE'].'('.$key['ABBR_DEVISE'].')</option>';
		}
		return $html;
	}

	private function getOne($critere=array()){
		$one = $this->Model->getOne($this->tbl,$critere);
		return $one;
	}
	public function check(){
		$nameAgent = html_escape($this->input->post('codeAgent'));
		$nameSecureAgent = $this->security->xss_clean($nameAgent);
		$checkExistAgent = $this->Model->getOne('agent',array('IS_ACTIF_AGENT'=>15,'MATRICULE_AGENT'=>$nameSecureAgent));



		$name = html_escape($this->input->post('code'));
		$nameSecure = $this->security->xss_clean($name);
		$checkExist = $this->Model->getOne('client',array('IS_ACTIF_CLIENT'=>9,'MATRICULE_CLIENT'=>$nameSecure));
		 $nameGetAgent = '';
		$nameGet = '';
		#CLIENT CHECK MATRICULE
		if ($checkExist) {
			if($checkExist['CODE_CLIENT']== $this->session->userdata('CODE')){
				$nameGet .='<b style="font-style:italic;" class="alert alert-danger">Impossible de faire l\'auto transaction</b>';
				
			}
			else{

			$nameGet .='<b style="font-style:italic;">'.$checkExist['PSEUDO_CLIENT'].' '.strtoupper($checkExist['NOM_CLIENT']).'</b>';
			
			}
		}
		else{
			$nameGet .='<b class="alert alert-warning">Code pas correct!!!</b>';
		}

		#AGENT CHECK MATRICULE

		if ($checkExistAgent) {
			$nameGetAgent .='<b style="font-style:italic;">'.$checkExistAgent['PSEUDO_AGENT'].' '.strtoupper($checkExistAgent['NOM_AGENT']).'</b>';
			
		}
		else{
			$nameGetAgent .='<b class="alert alert-warning">Code pas correct!!!</b>';
		}
		
		$response['existAgent'] = $nameGetAgent;
		$response['exist'] = $nameGet;
		echo json_encode($response);
	}
	public function checkPin(){
		$checkExist = $this->Model->getOne('gestionnaire',array('IS_ACTIF_GESTION'=>9,'CODE_GESTION'=>$this->session->userdata('GESTION')));
		
		$message = '';
		$response['status'] = 9;
		if (empty($checkExist['PIN'])) {
			$response['status'] = 7;
			$message .='<b style="font-style:italic;" >Veuillez définir un code PIN en cliquant <a href="#" id="createPin" onclick="pin()">Ici</a></b>';
			
			
		}
		

		$response['noexist'] = $message;
		
		echo json_encode($response);
	}
	private function checkStatusManage(){
	  $gestion = $this->session->userdata('GESTION');

	  $getOneManage = $this->Model->getOne('gestionnaire',array('CODE_GESTION'=>$gestion));
	  return $getOneManage['IS_ACTIF_GESTION'];
	}
	public function New(){
		$this->form_validation->set_rules('pin1','PIN1','required|trim');
		$this->form_validation->set_rules('pin2','pin2','required|trim');

		if ($this->form_validation->run()) {
				if ($this->checkStatusManage()==5) {
					echo "Echec#Votre comptre est blouqué...Veuillez contacter l'équipe téchnique#error";
				}
				else{
				$pin1 = $this->security->xss_clean(html_escape($this->input->post('pin1')));
				$pin2 = $this->security->xss_clean(html_escape($this->input->post('pin2')));
				
				
					if (strlen($pin1)>3 && strlen($pin2>3)) {
						$pin1 = (int)$pin1;
						$pin2 = (int)$pin2;
						if (is_int($pin1) && is_int($pin2) && $pin1!=0 && $pin2!=0) {
						if ($pin1==$pin2) {
							$criteres['IS_ACTIF_GESTION'] = 9;
							$criteres['CODE_GESTION'] = $this->session->userdata('GESTION');
							$data['PIN'] = $pin1;
							$in = $this->Model_Ted->update('gestionnaire',$criteres,$data);
							if($in){
								echo "Reussi#Le PIN enregistré avec succès#success";
							}
							else{
								echo "Echec#Erreur lors de l'enregistrement#error";
							}
						}
						else{
							echo "Echec#Les deux PINs doivent être les mêmes#error";
						}
					}
					else{
						echo "Echec#Le code PIN doit être composé des chiffres uniquement#error";
					}
				}
				else{
					echo "Echec#Veuillez inserer un code de 4 caractères#error";
				}
			}
		}

		else{
			echo "Echec#Vous devez remplir tous ces champs#error";
		}
	}

	public function Gestion(){
		$this->form_validation->set_rules('pin','PIN','required|trim');
		if ($this->form_validation->run()) {
			$pin = $this->security->xss_clean(html_escape($this->input->post('pin')));
			$number = (int)$pin;

			if (strlen($pin)>3 && $number!=0) {
				$fetchDta = $this->Model->getOne('gestionnaire',array('IS_ACTIF_GESTION'=>9,'CODE_GESTION'=>$this->session->userdata('GESTION'),'PIN'=>$number));
				if ($fetchDta) {
					$sess['ID_GESTION'] = $fetchDta['ID_GESTION'];
					$this->session->set_userdata($sess);
					$redirect="Manage/Manage";
					echo "ressui#".$redirect."#success";
				}
				else{
					echo "Echec#PIN incorrect#error";
				}
			}
			else{
				echo "Echec#Vous devez inserer un nombre entier et superier à 3 caractères#error";
			}
		}else{
			echo "Echec#Vous devez remplir ce champs#error";
		}
	}
	

public function Rapport(){
	$data = $this->Model_Ted->report_client(array('CODE_CLIENT'=>$this->session->userdata('CODE')));
	$html ='';
	$num = 1;
	foreach($data as $key){
		$dev['CODE_DEVISE'] = $key['CODE_DEVISE'];
		$dev['IS_ACTIF_DEVISE'] = 9;
		$devise = $this->Model->getOne('devise',$dev);
		if ($key['CODE_TX']==$this->session->userdata('CODE')) {
			$transmetteur = 'Moi';
		}
		else{
			$transmetteur =$key['NOM_CLIENT'].' '.$key['PSEUDO_CLIENT'];
		}
		if ($key['CODE_RX']==$this->session->userdata('CODE')) {
			$recepteur = 'Moi';
		}
		else{
			$recepteur =$key['NOM_CLIENT'].' '.$key['PSEUDO_CLIENT'];
		}
		$html.='<tr class="">
	                <td>
	                   '.$num++.'
	                </td>
	                <td>
	                    '.$transmetteur.'
	                </td>
	                <td>
	                    '.$key['MONTANT_TX'].''.$devise['ABBR_DEVISE'].'
	                </td>
	                <td class="center">
	                    '.$recepteur.'
	                </td>
	                <td class="center">
	                    '.$key['MONTANT_RX'].''.$devise['ABBR_DEVISE'].'
	                </td>
	                <td class="center">
	                    '.$key['FRAIS_TX'].''.$devise['ABBR_DEVISE'].'
	                </td>
	                <td class="center">
	                    '.getFortmat($key['DATE_RT']).'
	                </td>
	            </tr>';
	}
	$response['repport'] = $html;

	$this->load->view('Rapport_View',$response);
}
public function Rra(){
	$data = $this->Model_Ted->report_agent2($this->session->userdata('CODE'));
			$count_matricule = $this->Model_Ted->count_a_field('client','MATRICULE_CLIENT');
            $random = random_string('alpha',4);
            //$incr = $count_matricule++;
            // $new_matricule = 'KBY_'.$random.'-'.$count_matricule;
            $date =(int) date('my');
            $new_matricule = 'KBY'.$date.'_'.$random;
           
			$matricule =strtoupper(increment_string($new_matricule,'_',$count_matricule));
			
	
	$html ='';
	$num = 1;
	foreach($data as $key){
		$dev['CODE_DEVISE'] = $key['CODE_DEVISE'];
		$dev['IS_ACTIF_DEVISE'] = 9;
		$devise = $this->Model->getOne('devise',$dev);
		if ($key['CODE_TX']==$this->session->userdata('CODE')) {
			$transmetteur = 'Retrait';
		}
		else{
			$transmetteur =$key['MATRICULE_AGENT'];
		}
		if ($key['CODE_RX']==$this->session->userdata('CODE')) {
			$recepteur = 'Reçu';
		}
		else{
			$recepteur =$key['MATRICULE_AGENT'];
		}
		$html.='<tr class="">
	                <td>
	                   '.$num++.'
	                </td>
	                <td>
	                    '.$transmetteur.'
	                </td>
	                <td>
	                    '.$key['MONTANT_TX'].''.$devise['ABBR_DEVISE'].'
	                </td>
	                <td class="center">
	                    '.$recepteur.'
	                </td>
	                <td class="center">
	                    '.$key['MONTANT_RX'].''.$devise['ABBR_DEVISE'].'
	                </td>
	                <td class="center">
	                    '.$key['FRAIS_TX'].''.$devise['ABBR_DEVISE'].'
	                </td>
	                <td class="center">
	                    '.getFortmat($key['DATE_RT']).'
	                </td>
	            </tr>';
	}
	$response['repport'] = $html;

	$this->load->view('Rapport_Retrait_View',$response);
}


	public function sendToClient(){
		// echo "<pre>";
		// var_dump($this->input->post());
		// exit();
		$this->form_validation->set_rules('amount','Montant','trim|required');
		$this->form_validation->set_rules('message','Montant','trim');
		$this->form_validation->set_rules('code_client','code','required|trim');
		$this->form_validation->set_rules('devise','Devise','required|trim');
		$this->form_validation->set_rules('mdp','Mot de passe','required|trim');
		if($this->form_validation->run()){
			$message=html_escape($this->security->xss_clean($this->input->post('message')));
			$montant=html_escape($this->security->xss_clean($this->input->post('amount')));
			$matricule = html_escape($this->security->xss_clean($this->input->post('code_client')));
			$devise =html_escape($this->security->xss_clean($this->input->post('devise')));
			$mdp = $this->input->post('mdp');
			$montant = floatval($montant);
			$montantRX = helper_facturation($montant);

		if(password_verify($mdp, $this->session->userdata('MDP'))){

		if($montantRX=='error'){
			echo  'Erreur#Veuillez entrer un nombre valide et superieur à 1#error';
		}
		else{
			if($matricule!=$this->session->userdata('MATRICULE')){
		$checkMatricule = $this->Model->getOne('client',array('IS_ACTIF_CLIENT'=>9,'MATRICULE_CLIENT'=>$matricule));
		if($checkMatricule){
		$code = $checkMatricule['CODE_CLIENT'];

		$check_my_amount = $this->Model_Ted->join_solde_client(array('IS_ACTIF_CLIENT'=>9,'solde.CODE_CLIENT'=>$this->session->userdata('CODE'),'IS_ACTIF_SOLDE'=>9,'solde.CODE_DEVISE'=>$devise));
		if(!$check_my_amount){
			echo  'Erreur#Il n\'ya pas de solde disponible';
			}
			else{
				if($montant < $check_my_amount['MONTANT_SOLDE']-$montantRX[1]){

					$sommes_me = $check_my_amount['MONTANT_SOLDE']-$montant;

					$code_transaction=generate_code('rec_trans','CODE_RT','trans');

					$data = array('CODE_RT'=>$code_transaction,'CODE_RX'=>$code,'CODE_TX'=>$this->session->userdata('CODE'),'CODE_DEVISE'=>$devise,'MONTANT_TX'=>$montant,'MONTANT_RX'=>$montantRX[0],'FRAIS_TX'=>$montantRX[1]);

		

					if($this->available_amount_when_receive($devise,$code,$montantRX[0],$data)==true){
						$systm = $this->Model->getOne('solde_system',array('IS_ACTIF_SOLDE'=>10,'CODE_DEVISE'=>$devise,'CODE_CLIENT'=>$this->session->userdata('CODE_SYSTM')));
						 $dt_update['MONTANT_SOLDE'] = $systm['MONTANT_SOLDE'] + $montantRX[1];
						 $dt_update['LAST_UPDATE_SOLDE_AT'] =date('Y-m-d H:i:s');
						// $dt['MONTANT_SOLDE'] = $systm['MONTANT_SOLDE'] + $montantRX[1];
						// $dt['CODE_DEVISE'] = $devise; 
						// $dt['LAST_UPDATE_SOLDE_AT'] =date('Y-m-d H:i:s');

						if(!$systm){
							$code_frais=generate_code('solde_system','CODE_SOLDE','trclsys');
							$this->Model_Ted->register(
								'solde_system',
								array(
									'CODE_SOLDE'=>$code_frais,
									'CODE_CLIENT'=>$this->session->userdata('CODE_SYSTM'),
									'CODE_DEVISE'=>$devise,
									'MONTANT_SOLDE'=>$systm['MONTANT_SOLDE'] + $montantRX[1],
									'IS_ACTIF_SOLDE'=>10
								));

						}
						else{
							$this->Model_Ted->update(
								'solde_system',
								array(
									'CODE_DEVISE'=>$devise,
									'CODE_SOLDE'=>$systm['CODE_SOLDE'],
									'CODE_CLIENT'=>$this->session->userdata('CODE_SYSTM')),
								$dt_update);
					
						}

						$this->Model_Ted->update(
							'solde',
							array(
								'CODE_DEVISE'=>$devise,
								'solde.CODE_CLIENT'=>$this->session->userdata('CODE'),
								'IS_ACTIF_SOLDE'=>9
							),
							array(
								'MONTANT_SOLDE'=>$sommes_me,
								'LAST_UPDATE_SOLDE_AT'=> date('Y-m-d H:i:s')
							));
						$getDev = $this->Model->getOne('devise',array('IS_ACTIF_DEVISE'=>9,'CODE_DEVISE'=>$devise));
						$getRx = $this->Model->getOne('client',array('IS_ACTIF_CLIENT'=>9,'CODE_CLIENT'=>$code));
						echo  'Transaction reussie#'.$montant.''.$getDev['ABBR_DEVISE'].' virés à '.$getRx['PSEUDO_CLIENT'].' '.$getRx['NOM_CLIENT'].'#success';
						$codeDescr = generate_code('description','CODE_DESCRIPTION','desc');
						$data = array('CODE_DESCRIPTION'=>$codeDescr,'CODE_TX'=>$this->session->userdata('CODE'),'CODE_RX'=>$code,'DESCRIPTION'=>$message);
						if ($message) {
							$this->Model_Ted->register('description',$data);
						}

					}else{
						echo  'Erreur#Une erreur lors de la transaction#error';
					}
				}
				else{
					echo  'Erreur#Le solde est insuffisant pour faire cette transaction#error';
				}

			}
		}
		else{
			echo  'Erreur#Erreur du code beneficiaire#error';
		}
	}
	else{
		echo  'Echec#Impossible de faire l\'auto-transaction#error';
	} 

		}
	}
	else{
	echo  'Erreur#L\'identifiant est incorrect#error';
}


		}
		else{
			echo  'Erreur#Tous les champs sont requis#error';
		}


	}

	public function Retrait(){

		
		$this->form_validation->set_rules('amount','Montant','trim|required');
		$this->form_validation->set_rules('code_agent','code','required|trim');
		$this->form_validation->set_rules('devise','devise','required|trim');
		$this->form_validation->set_rules('mdp','Mot de passe','required|trim');

		if($this->form_validation->run()){


			$montant=html_escape($this->security->xss_clean($this->input->post('amount')));
			$matricule = html_escape($this->security->xss_clean($this->input->post('code_agent')));
			$devise =html_escape($this->security->xss_clean($this->input->post('devise')));
			$mdp = $this->input->post('mdp');
			$montant = floatval($montant);
			$montantRX = helper_facturation($montant);

				if(password_verify($mdp, $this->session->userdata('MDP'))){
					if($montantRX=='error'){
						echo "Desolé#Veuillez entrer un nombre valide et superieur à 1#warning";
					}
					else{
						$checkMatricule = $this->Model->getOne('agent',array('IS_ACTIF_AGENT'=>15,'MATRICULE_AGENT'=>$matricule));
						if($checkMatricule){
							$code_agent = $checkMatricule['CODE_AGENT'];
						$check_my_amount = $this->Model_Ted->join_solde_client(array('IS_ACTIF_CLIENT'=>9,'solde.CODE_CLIENT'=>$this->session->userdata('CODE'),'IS_ACTIF_SOLDE'=>9));
						if(!$check_my_amount){
							echo "Desolé#Votre solde est insuffisant#warning";
						}
						else{
							if($montant < $check_my_amount['MONTANT_SOLDE']){
								
								$code_transaction=generate_code('rec_trans_systm','CODE_RT','tranSys');
								$data = array('CODE_RT'=>$code_transaction,'CODE_RX'=>$code_agent,'CODE_TX'=>$this->session->userdata('CODE'),'CODE_DEVISE'=>$devise,'MONTANT_TX'=>$montant,'MONTANT_RX'=>$montant);
								if($this->available_amount_when_receive_systm($devise,$code_agent,$montant,$data)==true){
									$client_check = $this->Model->getOne('solde',array('IS_ACTIF_SOLDE'=>9,'CODE_CLIENT'=>$this->session->userdata('CODE'),'CODE_DEVISE'=>$devise));

									$dt_update['MONTANT_SOLDE'] = $client_check['MONTANT_SOLDE'] - $montant;
									$dt_update['LAST_UPDATE_SOLDE_AT'] =date('Y-m-d H:i:s');

									if($client_check){
										$this->Model_Ted->update(
										'solde',
										array(
											'IS_ACTIF_SOLDE'=>9,
											'CODE_DEVISE'=>$devise,
											'CODE_SOLDE'=>$client_check['CODE_SOLDE'],
											'CODE_CLIENT'=>$this->session->userdata('CODE')),
										$dt_update);
							
										echo "Reussie#Retrait éffectué avec succès#success";
										}
										else{
											echo "Erreur#Un probleme avec le devise#error";
										}
										
								}
								else{
									echo "Erreur#Une erreur lors de transaction#error";
								}
							}
							else{
								echo "Erreur#Votre solde est insuffisant pour faire cette transaction#error";
							}
						}
					}
					else{
						echo  'Erreur#Erreur du code beneficiaire#error';
					}
					}
				}
				else{
					echo 'Erreur#Veuillez inserer les identifiants corrects#error';
				}
			

		}
		else{
			echo 'Attention#Tous les champs sont requis#warning';
		}


		#$this->Model_Ted->insert('solde',$data2);
}
	#for a receiver who is an agent or admin
	private function available_amount_when_receive_systm($devise,$code,$montant,$data){
		$check_amount = $this->Model->getOne('solde_system',array('CODE_CLIENT'=>$code,'IS_ACTIF_SOLDE'=>11));
		
		
			if(empty($check_amount && $montant>0)){
				$code_solde=generate_code('solde','CODE_SOLDE','sldagt');
				$this->Model_Ted->register('solde_system',array('CODE_CLIENT'=>$code,'CODE_DEVISE'=>$devise,'CODE_SOLDE'=>$code_solde,'MONTANT_SOLDE'=>$montant));
				$this->Model_Ted->register('rec_trans_systm',$data);
				return true;
				
			}
			elseif($check_amount && $montant>0){
				$condition = array('IS_ACTIF_SOLDE'=>11,'CODE_CLIENT'=>$check_amount['CODE_CLIENT'],'CODE_DEVISE'=>$devise);
				// $this->Model_Ted->update('solde',$data,array('MONTANT_SOLDE'=>$sommes));
				$sommes_tot_agent =$check_amount['MONTANT_SOLDE'] + $montant;

				if($this->Model_Ted->update('solde_system',$condition,array('MONTANT_SOLDE'=>$sommes_tot_agent,'LAST_UPDATE_SOLDE_AT'=> date('Y-m-d H:i:s')))){
					$this->Model_Ted->register('rec_trans_systm',$data);
					return true;
				}
				else{
					return false;
				}
			}
		
		
	}


	private function available_amount_when_receive($devise,$code,$montant,$data){
		$check_amount = $this->Model->getOne('solde',array('CODE_CLIENT'=>$code,'IS_ACTIF_SOLDE'=>9));

			if(empty($check_amount && $montant>0)){
				$code_solde=generate_code('solde','CODE_SOLDE','sld');
				$this->Model_Ted->register('solde',array('CODE_CLIENT'=>$code,'CODE_DEVISE'=>$devise,'CODE_SOLDE'=>$code_solde,'MONTANT_SOLDE'=>$montant));
				$this->Model_Ted->register('rec_trans',$data);
				return true;
				
			}
			elseif($check_amount && $montant>0){
				$condition = array('IS_ACTIF_SOLDE'=>9,'CODE_DEVISE'=>$devise,'CODE_CLIENT'=>$check_amount['CODE_CLIENT']);
				// $this->Model_Ted->update('solde',$data,array('MONTANT_SOLDE'=>$sommes));
				$sommes =$check_amount['MONTANT_SOLDE'] + $montant;

				if($this->Model_Ted->update('solde',$condition,array('CODE_DEVISE'=>$devise,'MONTANT_SOLDE'=>$sommes,'LAST_UPDATE_SOLDE_AT'=> date('Y-m-d H:i:s')))){
					$this->Model_Ted->register('rec_trans',$data);
					return true;
				}
				else{
					return false;
				}
			}
		
		
	}



	public function sohw_solde(){
    	$solde_all_divice = $this->Model_Ted->join_client_solde(array('IS_ACTIF_CLIENT'=>9,'solde.IS_ACTIF_SOLDE'=>9,'solde.CODE_CLIENT'=>$this->session->userdata('CODE')));
    	$html ='';
    	foreach($solde_all_divice as $key){
    			$html.=' <button >'.$key['MONTANT_SOLDE'].' '.$key['ABBR_DEVISE'].'</button>';
    		
	    }
	    $response['html'] = $html;
	    echo json_encode($response);
	 
	}



    public function __construct() {
	parent::__construct();
	$data = array(
					'IS_ACTIF_CLIENT'=>9,
					'CODE_CLIENT'=>$this->session->userdata('CODE'),
				);
	$data_redirect = $this->Model->getOne('client',$data);
		 if (!$this->session->userdata('ID') || !$data_redirect || $data_redirect['CODE_CLIENT'].'client'!=$this->session->userdata('STATIC')) {
		 	$this->session->sess_destroy();
		 	redirect('Authentification');
		 	exit();
		 }
	}
}
