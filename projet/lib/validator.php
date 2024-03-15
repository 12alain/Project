<?php 

    function est_vide($valeur):bool{
        return empty($valeur);
    }
    function est_numeric($valeur):bool{
        return is_numeric($valeur);
    }
    function valide_user_name( $number,string $key,array &$arrayError):void{
        if (est_vide($number)) {
            $arrayError[$key]='Champs Obligatoire';
        }
    }
    function controle_traiter_reservation( $number,string $key,array &$arrayError):void{
        if (est_vide($number)) {
            $arrayError[$key]='veillez selectionner un vehicule';
        }
    }
    function pays_ville($valeur,string $key,array &$arrayError){
        if (empty($valeur)){
            $arrayError[$key]='Champs Obligatoire';
        }
    }
    function validefield1($valeur,string $key,array &$arrayError){
        if (empty($valeur)) {
            $arrayError[$key]='Champs Obligatoire';
        }elseif (!est_numeric($valeur)) {
            $arrayError[$key]='saisir des entiers';
        }
    }
    function validefield($valeur,string $key,array &$arrayError){
        if (empty($valeur)) {
            $arrayError[$key]='Champs Obligatoire';
        }elseif (est_numeric($valeur)) {
            $arrayError[$key]='Veillez saisir des lettres';
        }
    }
    function validefield2($valeur,string $key,array &$arrayError){
        if (empty($valeur)) {
            $arrayError[$key]='Champs Obligatoire';
        }elseif (!est_numeric($valeur)) {
            $arrayError[$key]='le code postal est invalide';
        }elseif (!preg_match(VALIDE_POSTAL,$valeur)) {
            $arrayError[$key]='le code est de 5 chiffres';
        }
    }
    function valide_number(string $number,$pattern4):bool{
       /*  $pattern4='#^(\+|00)?(221)?(77|70|75|77|78)[0-9]{7}$#'; */
        if (preg_match($pattern4,$number)) {
           return true;
        }else {
          return false;
        }
    }
    function password_valid_field($password):bool{
        //$pattern='#^[a-zA-Z0-9]{6,10}$#';
        if (preg_match(VALIDE_PASSWORD,$password)) {
            return true;
         }else {
           return false;
         }
    }
    function valide_field_number(string $number,$pattern4,string $key,array &$arrayError):void{
        if (est_vide($number)) {
            $arrayError[$key]='Champs Obligatoire';
        }elseif (!est_numeric($number)) {
            $arrayError[$key]='Veillez Saisir des nombres';
        }elseif (!valide_number($number,$pattern4)) {
            $arrayError[$key]='Le numero n\'est pas valide';
        }
    }
    function valide_email(string $number):bool{
      //  $pattern4='#^[a-zA-Z]{1}\w{4,15}@{1}(gmail|hoymail|yahoo|)\.[a-z]{2,3}$#';
        if (preg_match(VALIDE_EMAIL,$number)) {
            return true;
        }else {
            return false;
        }
    }
    function valide_field_mail(string $number,string $key,array &$arrayError):void{
        if (est_vide($number)) {
            $arrayError[$key]='Champs Obligatoire';
        }elseif (!valide_email($number)) {
            $arrayError[$key]='L\'email n\'est pas valide';
        }
    }
    function validation_password( $valeur,array &$arrayError, string $key ):void{
        if (est_vide($valeur)) {
            $arrayError[$key]= 'le champs est obligatoire';
        }elseif (password_valid_field($valeur)==false) {
            $arrayError[$key]= "la taille est compris entre 6 et 10 ";
        }
      
    }
    function form_valid($arrayError):bool{
        if (count($arrayError)==0) {
            return true;
        }
        return false;
    }
    function genere_reference():int{
        $chiffre='0123456789';
      $number="";
        for ($i=0; $i < 5; $i++) { 
            $number.=$chiffre[rand(0,strlen($chiffre)-1)];
        }
        return $number;
    }
    function genere_matriculation():string{
        $chiffre='0123456789';
        $lettre='QWERTYUIOPLKJHGFDSAZXCVBNM';
      $number=$ltrs1=$ltrs2=$genere="";
        for ($i=0; $i < 4; $i++) { 
            $number.=$chiffre[rand(0,strlen($chiffre)-1)];
        }
        for ($i=0; $i < 2; $i++) { 
            $ltrs1.=$lettre[rand(0,strlen($lettre)-1)];
        }
        for ($i=0; $i < 2; $i++) { 
            $ltrs2.=$lettre[rand(0,strlen($lettre)-1)];
        }
        $genere.=$ltrs1.'-'.$number.'-'.$ltrs2;
        return $genere;
    }
    function total_page($total_records,$nbrPage):int{
        return ceil($total_records/$nbrPage);
    }
    function start_from($page,$nbrPage):int{
        return ($page-1) * ($nbrPage);
    }

    function valide_nom_categorie($valeur,string $key,array &$arrayError):void{
        if (empty($valeur)) {
            $arrayError[$key] = 'Champs obligatoire';
        }
    }
    function valide_nom_marque($valeur,string $key,array &$arrayError):void{
        if (empty($valeur)) {
            $arrayError[$key] = 'Champs obligatoire';
        }elseif (est_numeric($valeur)) {
            $arrayError[$key] = 'saisir des lettres';
        }
    }
    function valide_prix_categorie($valeur,string $key,array &$arrayError):void{
        if (empty($valeur)) {
            $arrayError[$key] = 'Champs obligatoire';
        }elseif (!est_numeric($valeur)) {
            $arrayError[$key] = 'saisir des entiers';
        }elseif ($valeur<=1) {
            $arrayError[$key] = 'sasir une valeur superieur a 0';
        }
    }
    function nombrePageTotal($array, $nombreElement): int {
        $nombrePage = 0;
        $longueurArray = count($array);
        if ($longueurArray % $nombreElement == 0) {
            $nombrePage = $longueurArray / $nombreElement;
        } else {
            $nombrePage = ($longueurArray / $nombreElement) + 1;
        }
        return $nombrePage;
    }

function get_element_to_display(array $array, int $page, int $nombreElement): array {
    $arrayElement = [];
    $indiceDepart = ($page*$nombreElement) - $nombreElement;
    $limitElement = $page * $nombreElement;
    for ($i = $indiceDepart; $i < $limitElement; $i++) {
        if ($i >= count($array)) {
            return $arrayElement;
        } else {
            $arrayElement[] = $array[$i];
        }
    }
    return $arrayElement;
}

function difference_date(DateTime $date1,DateTime $date2):string{
    $diff=date_diff($date1,$date2);
    return $diff -> format("%d");
}
function difference_date_heure(DateTime $date1,DateTime $date2):string{
    $diff=date_diff($date1,$date2);
    return $diff -> format("%h");
}
function compare_date(DateTime $date_fin,DateTime $date_debut,string $key,array &$arrayError):void{
    $date=date_create(); 
    if ($date_debut > $date_fin) {
        $arrayError[$key] = 'la date de fin doit etre superieur au date de debut ou egal';
    }
}
?>