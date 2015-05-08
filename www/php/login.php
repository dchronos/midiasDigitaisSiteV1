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
  @$login = $request->login;
  @$senha = $request->senha;


  // Create connection
  $conn = new mysqli($servername, $username, $password, $db);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  //echo "Connected successfully <br/>";

  //Login
  $sql = "SELECT id, usuario, senha, nome FROM usuarios WHERE usuario = '" .mysql_real_escape_string($login)."' AND senha = '". mysql_real_escape_string($senha) ."'";
  //echo $sql;
  $result = $conn->query($sql);

  //echo $result;


  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["id"]. " - Name: " . $row["usuario"]. " senha:" . $row["senha"]. "<br>";
        echo $row["nome"];
        //echo "1";
    }
  } else {
      echo 0;
  }
  $conn->close();

  //echo "oi";

?>
