<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');
//Helper pour la gestion des uploads
if (!function_exists('helper_desactiver_statut')) {
  function helper_desactiver_statut($table,$condition,$condition_checkvalue, $champ){
    $ci = & get_instance();
    $checkstatut = $ci->Model_Ted->checkvalue($table,$condition_checkvalue);
    if($checkstatut){
      $ci->Model_Ted->update($table,$condition, array($champ =>0));
      $statut = 1;
    }else{
      $ci->Model_Ted->update($table,$condition, array($champ =>1));
      $statut = 0;
    }

    return $statut;

  }
 }
  function helper_session_exist (){
    $ci = & get_instance();
    if(empty($ci->session->userdata('CODE_UTILISATEUR'))){
      redirect(base_url('Login/do_logout'));
    }
  }


    function generate_code($table,$champs,$ext) {
        $ci = & get_instance();
        $table=$table;
        $code=$ext.sha1(md5(uniqid()));
        while(!empty($ci->Model_Ted->list_One($table,array($champs=>$code)))){
          $code=$ext.sha1(md5(uniqid()));
        }

        return $code;   
    }
    function helper_generate_code($table,$champs,$ext) {
        $ci = & get_instance();
        $table=$table;
        $code=$ext.sha1(md5(uniqid()));
        while(!empty($ci->Model_Ted->list_One($table,array($champs=>$code)))){
          $code=$ext.sha1(md5(uniqid()));
        }

        return $code;   
    }


    if (!function_exists('helper_upload')) {

    function helper_upload($location) {
        $ci = & get_instance();
        if($_FILES["fileupload"]["name"] != '')
            {
             $test = explode('.', $_FILES["fileupload"]["name"]);
             $ext = end($test);
             $code2=strtolower(substr((md5(uniqid(rand(0,10000)))), 0,20));
             $name = $code2.'.' . $ext;
             $location = $location.$name;  
             $move = move_uploaded_file($_FILES["fileupload"]["tmp_name"], $location);

             if($move){
                return $location;
             }else{
                return 2;
             }
    
        }else{
          return 0;
        }   
    }

}

function helper_facturation($num){
    if($num<1){
      return "error";
    }
    else{
      if($num>=100.0){
        $somme = ($num*1.8)/100;
      }
      elseif($num>=1.0 && $num<50.0){
        $somme = ($num*1.0)/100;
      }
      elseif($num > 49.0 && $num < 100.0){
        $somme = ($num*1.2)/100;
      }
      elseif($num>500.0){
        $somme = ($num*1.4)/100;
      }
      elseif($num>1000.0){
        $somme = ($num*1.8)/100;
      } 
      $resultat[0] = $num-$somme;
      $resultat[1] = $somme;

      return $resultat;
      
    }

    }


if (!function_exists('Tabmois')) {

    function helper_Tabmois($indice) {
        $ci = & get_instance();
        $TabMois=array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
        return $TabMois[$indice];   
    }

}


if (!function_exists('get_timeago')) {
 function helper_get_timeago( $time )
      {
          $time=strtotime($time);
          $diff_time = time() - $time;
          if($diff_time < 1 )
            {
                return 'A l\'istant';
            }
          $sec = array(
                      12 * 30 * 24 * 60 * 60  =>  'année',
                      30 * 24 * 60 * 60       =>  'mois',
                      24 * 60 * 60            =>  'jour',
                      60 * 60                 =>  'heure',
                      60                      =>  'minute',
                      1                       =>  'seconde'
          );
          foreach( $sec as $sec => $value )
          {
              $div = $diff_time / $sec;

              if( $div >= 1 )
              {   
                  $time_ago = round( $div );
                  $time_type=$value;
                  if ($time_ago>1 && $time_type!='mois') {
                    $time_type.='s';
                  }
                  return 'Il y a '.$time_ago.' '.$time_type;
              }
          }
      }
   }


   function getFortmat($date){
    return 'Le '. date('d/m/Y à H:i:s',strtotime($date));
   }




 ?>