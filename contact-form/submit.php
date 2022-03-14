<?php
//  var_dump($_POST);
   
if(!empty($_POST) && isset($_POST)){

    $errors = array();

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];  
    
    $from = "$email";
    $to = "izlhkrxvkirkyz@cutradition.com";
    $sujetSend = "Le sujet . $sujet";
    $message = "Le message . $message";
 
    if(empty($_POST['nom']) && isset($_POST['nom'])){

        $errors["nom"] = 'champ obligatoire';
       
    }else if(!preg_match("([a-zA-Z]{3,30}\s*)", $nom)){

        $errors["nomregex"] = 'champ invalide';

    }if(empty($_POST['email']) && isset($_POST['email'])){

        $errors["mail"] = 'champ obligatoire';
        // echo "test email";

    }else if(!preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/',$email)){

        $errors["emailregex"] = 'champ invalide';

    }
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        
    }else {
        $errors["email"] = 'non valide'; 
    }   
    if(empty($_POST['sujet']) && isset($_POST['sujet'])){ 

        $errors["sujet"] = 'champ obligatoire';

    }else if(!preg_match('/^[a-zA-ZÀ-ÿ\s]*$/',$sujet)){

        $errors["sujet"] = 'champ invalide';

    }if(empty($_POST['message']) && isset($_POST['message'])){ 

        $errors["message"] = 'champ obligatoire';

    }else if(!preg_match('/^[a-zA-ZÀ-ÿ\s]/',$message)){

        $errors["message"] = 'champ invalide';

    }
    
    if(empty($errors)){
        mail($from,$to,$email,$sujet,$message);
    }else{
        $errors['Pas bon'] = 'Pas bon toto';
    }

    echo json_encode($errors);
  
}


// echo "couuuuuuuuuuuuuuuuuuuuuuuuuuuuuuucouuuuuuuuuuuuuuuuuuuuuuuuuuuuuuuu";


