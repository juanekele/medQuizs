<?php


$mysqli = new mysqli('localhost', 'root', '1234', 'medquizs');

$fila = 1;
if (($gestor = fopen("datos.csv", "r")) !== FALSE) {
	$data=array();
    while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
        $numero = count($datos);
       // echo "<p> $numero de campos en la línea $fila: <br /></p>\n";
        if($fila==1)
        {
            $fila++;
            continue;
        }
        $fila++;
        /*for ($c=0; $c < $numero; $c++) {
            echo $datos[$c] . "<br />\n";
        }*/
        $data[$datos[0]]['titulo']=$datos[0];
        $data[$datos[0]]['pregunta']=$datos[1];
        $data[$datos[0]]['ra']=$datos[2];
        $data[$datos[0]]['rb']=$datos[3];
        $data[$datos[0]]['rc']=$datos[4];
        $data[$datos[0]]['rd']=$datos[5];
        $data[$datos[0]]['correcta']=$datos[6];
    }
    
    foreach ($data as $fila) {
        //echo print_r($fila[user],true);
        /*$sql='select user_id from user where nif="'.$fila['user'].'"';
        $res = $mysqli->query($sql);
        //echo print_r($res,true);
        $row = $res->fetch_array(MYSQLI_BOTH);*/
        //echo (print_r($fila,true));
        //echo "USER: ".$row['user_id'];
        //echo print_r($row,true);

          
        $title=$fila['titulo'];
        if(strlen($fila['titulo']==0))
        {
            $title=substr($fila['pregunta'], 0,15);
        }
        $sql="INSERT INTO quiz SET content='$fila[pregunta]', validado=1,publicado=0,correcta='$fila[correcta]',creator_id='', fecha=NOW(), title='$title'";
        $mysqli->query($sql);
        $id=$mysqli->insert_id;
        $update="UPDATE quiz SET name='Q".$id."' WHERE id=$id";
        $mysqli->query($update);
        $correct_A=('A'== $fila['correcta']);
        $insertA="INSERT INTO quiz_hashtag SET id_quiz=$id,value='Q".$id."A ".$fila['ra']."'";
        $insertB="INSERT INTO quiz_hashtag SET id_quiz=$id,value='Q".$id."B ".$fila['rb']."'";
        $insertC="INSERT INTO quiz_hashtag SET id_quiz=$id,value='Q".$id."C ".$fila['rc']."'";
        $insertD="INSERT INTO quiz_hashtag SET id_quiz=$id,value='Q".$id."D ".$fila['rd']."'";
        $mysqli->query($insertA);
        $mysqli->query($insertB);
        $mysqli->query($insertC);
        $mysqli->query($insertD);
		
    }
    fclose($gestor);
    /*foreach ($data as $fila) {
    	select
    }*/
    $mysqli->close();
}

?>
