<?php

function conectar(){
try {
	$pdo = new PDO('mysql:host=localhost;dbname=cadastro','root','');
	
} catch (PDOException $e) {
	var_dump($e);
}
return $pdo;
}

 function inserir($nome,$idade,$email,$senha){
$q_insert = $pdo->prepare('INSERT INTO PESSOA (NOME,IDADE,EMAIL,SENHA) VALUES (:nome,:idade,:email,:senha)');
$q_insert->bindValue(':nome', $nome);
$q_insert->bindValue(':idade', $idade);
$q_insert->bindValue(':email', $email);
$q_insert->bindValue(':senha', $senha);
$q_insert->execute();
}
