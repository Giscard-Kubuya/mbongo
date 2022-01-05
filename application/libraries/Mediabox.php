<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mediabox
{
  protected $CI;

  public function __construct()
  {
            $this->CI = & get_instance();
            $this->CI->load->library('email');
  }

   function send_mail($emailFrom=array("mail"=>"nocmediabox@mediabox.bi","name"=>"Regideso"),$emailTo = array(), $subjet, $cc_emails = array(), $message, $attach = array()) {

        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://twiga.afriregister.co.ke';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'helpdesk_comesa@mediabox.bi';
        $config['smtp_pass'] = 'mediabox@comesa2018';
        $config['mailtype'] = 'html';
        $config['charset'] = 'UTF-8';
        $config['wordwrap'] = TRUE;
        $config['smtp_timeout'] = 20;
        $config['newline'] = "\r\n";
        $this->CI->email->initialize($config);
        $this->CI->email->set_mailtype("html");

    
        $this->CI->email->from($emailFrom['mail'], $emailFrom['name']);
        $this->CI->email->to($emailTo);
        $this->CI->email->bcc('ismael@mediabox.bi');
        if (!empty($cc_emails)) {
            foreach ($cc_emails as $key => $value) {
                $this->CI->email->cc($value);
            }
        }
        $this->CI->email->subject($subjet);
        $this->CI->email->message($message);

        if (!empty($attach)) {
            foreach ($attach as $att)
                $this->CI->email->attach($att);
        }
        if (!$this->CI->email->send()) {
            show_error($this->CI->email->print_debugger());
        } 
            else;
       // echo $this->CI->email->print_debugger();
    }

   public function send_mail_old($emailFrom=array("mail"=>"nocmediabox@mediabox.bi","name"=>"Regideso"),$emailTo=array(),$subjet,$cc_emails=array(),$message,$attach=array())
   {
        $config['protocol'] = 'sendmail';
        $config['smtp_host'] = '154.117.208.227';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['mailtype'] = 'html';
        $config['priority'] = '1';
        $config['wordwrap'] = TRUE;
        $this->CI->email->initialize($config);

        // Load email library and passing configured values to email library 
        $this->CI->load->library('email', $config);
        $this->CI->email->set_newline("\r\n");

        $this->CI->email->from($emailFrom['mail'], $emailFrom['name']);
        $this->CI->email->to($emailTo);
          if (!empty($cc_emails)) {
          foreach ($cc_emails as $key=>$value) {
        $this->CI->email->cc($value);
        }
          }
         
        $this->CI->email->subject($subjet);
        $this->CI->email->message($message);
        
        if(!empty($attach))
          {
        foreach ($attach as $att) 
        $this->CI->email->attach($att);
         }

        if (!$this->CI->email->send()) {
            show_error($this->CI->email->print_debugger());
        }
   }



   public function sendSms($string_tel,$string_msg)
   {
       $_tel = "tel:".$string_tel;
        $data = '{"urns": ["' . $_tel . '"],"text":"' . $string_msg . '"}';
        $header = array();
        $header [0] = 'Authorization:Token 8ae3e567ec75aeac4fab42a43c64edf52f0eb736';  //pas d'espace entre Authori et : et Token
        $header [1] = 'Content-Type:application/json';
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, 'https://sms.ubuviz.com/api/v2/broadcasts.json');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        $result = curl_exec($curl);
       // $result = json_decode($result);

        return $result;
   }
   
   public function send_sms($destinataires = array(),$msg){
    $feedback = array();
    if(!empty($destinataires)){
      foreach($destinataires as $destinataire){
        $feedback[]=$result = $this->sendSms($destinataire,$msg);
      } 
    }else{
      echo "Can't send sms, no number supplied";
    } 
    return $feedback;
   }

   public function generate_password($taille)
   {
     $Caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMOPQRSTUVXWYZ0123456789,.@{-_/#'; 
      $QuantidadeCaracteres = strlen($Caracteres); 
      $QuantidadeCaracteres--; 

      $Hash=NULL; 
        for($x=1;$x<=$taille;$x++){ 
            $Posicao = rand(0,$QuantidadeCaracteres); 
            $Hash .= substr($Caracteres,$Posicao,1); 
        }
        return $Hash; 
   }

   public function generate_UIID($taille)
   {
     $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789'; 
      $QuantidadeCaracteres = strlen($Caracteres); 
      $QuantidadeCaracteres--; 

      $Hash=NULL; 
        for($x=1;$x<=$taille;$x++){ 
            $Posicao = rand(0,$QuantidadeCaracteres); 
            $Hash .= substr($Caracteres,$Posicao,1); 
        }

        return $Hash; 
   }

      public function generate_smallcode($taille)
   {
     $Caracteres = '0123456789'; 
      $QuantidadeCaracteres = strlen($Caracteres); 
      $QuantidadeCaracteres--; 

      $Hash=NULL; 
        for($x=1;$x<=$taille;$x++){ 
            $Posicao = rand(0,$QuantidadeCaracteres); 
            $Hash .= substr($Caracteres,$Posicao,1); 
        }

        return $Hash; 
   }

}

?>
