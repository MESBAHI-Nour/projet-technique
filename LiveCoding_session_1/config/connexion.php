<?php
    try {
        $connexion=new PDO("mysql:host=localhost;dbname=plateforme_streaming;port=3306","root","root");
    } 
    catch (Exeption $e) {
        echo $e;
    }
?>    
    