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


  // Create connection
  $conn = new mysqli($servername, $username, $password, $db);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  //echo "Connected successfully <br/>";

  //Login
  //$sql = "SELECT id, usuario, senha, nome FROM usuarios WHERE usuario = '" .mysql_real_escape_string($login)."' AND senha = '". mysql_real_escape_string($senha) ."'";
  $sql = "SELECT r.*, u.* FROM ranks r inner join usuarios u on r.userId = u.id";
  //echo $sql;
  $result = $conn->query($sql);
  $rows = array();
  //echo $result;


  if ($result->num_rows > 0) {
    // output data of each row
    //echo $result;
    //echo "[";
    while($row = $result->fetch_assoc()) {
        //echo '{"nome":"' . $row["nome"] . '","pontos":"' . $row["ponto"] . '"}';
        //echo $row["no"];
        //echo "1";
        $rows[] = $row;
    }
    print json_encode($rows);
    //echo "]";
  } else {
      echo 0;
  }
  $conn->close();


?>
