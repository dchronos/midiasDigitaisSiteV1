<?php

  //Conexao DB
  //Mysql connect
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $db = "midias";


 /*
 * Collect all Details from Angular HTTP Request.
 */
  $postdata = file_get_contents("php://input");
  $request = json_decode($postdata);
  @$email = $request->email;
  @$pass = $request->pass;

  @$nome            = $request->nome;
  @$dataDeNascimento  = $request->dataNascimento;
  @$sexo            = $request->sexo;
  @$login           = $request->login;
  @$senha           = $request->senha;
  //echo $dataNascimento; //this will go back under "data" of angular call.
  /*
   * You can use $email and $pass for further work. Such as Database calls.
  */


  // Create connection
  $conn = new mysqli($servername, $username, $password, $db);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully <br/>";
  //$random = 1;
  $random = rand(0,1000);

  //Login
  //  $sql = "SELECT id, usuario, senha FROM usuarios WHERE usuario = '" .mysql_real_escape_string($_POST['usuario'])."' AND senha = '". mysql_real_escape_string($_POST['senha']) ."'";
  $sql = "INSERT INTO $db.usuarios (id, usuario, senha, dataNascimento, sexo, nome) VALUES (NULL, '$login', '$senha', '$dataDeNascimento', '$sexo', '$nome')";
  echo $sql;
  //$result = $conn->query($sql);

  //echo $result;


  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    $userId = $conn->insert_id;
    //Gera um valor randomico para listar no rank, para cada usuario cadastrado
    $sql2 = "INSERT INTO $db.ranks (id, userId, ponto) VALUES (NULL, '$userId', '$random')";
    $conn->query($sql2);
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();


?>
