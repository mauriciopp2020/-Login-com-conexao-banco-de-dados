<?php
   session_start();
   include('verifica_login.php');
   
   $usuario = $_GET['usuario'];
   $senha = $_GET['senha'];
   
   include('conexao.php');
   
   // Check connection
   if ($conexao->connect_error) {
     die("Connection failed: " . $conexao->connect_error);
   }
   
   $sql = "INSERT INTO login (usuario,senha) VALUES ('$usuario', '$senha')";
   
   if (mysqli_query($conexao, $sql)) {
         header('Location: login_adm.php');
       exit();
   } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
   }
   mysqli_close($conexao);
   
   ?>