<?php
      require ('../fpdf/fpdf.php');
      class PDF extends FPDF{
          function header(){
              #
              $this->Image('img/cbta39.png',10,6,35);
              $this->Image('img/dgetaycm.png',165,16,43);
              $this->SetFont('Times','B',14);
              $this->Cell(50);
              $this->Cell(100,10,'CBTa 39',0,0,'C');
              $this->Ln(5);
              $this->Cell(50);
              $this->Cell(100,10,'"Prof. Vinh Flores Laureano"',0,0,'C');
              $this->Ln(10);
              $this->Cell(75);
              $this->Cell(50,10, utf8_decode('Dirección'),0,0,'C');
              $this->Ln(5);
              $this->Cell(75);
              $this->Cell(50,10, utf8_decode('Agrarista S/N Colonia, Benito Juárez, Temoac, Mor.'),0,0,'C');
              $this->Ln(15);
              $this->Cell(75);
              $this->Cell(50,10, utf8_decode('FICHA DE PRE-REGISTRO'),0,0,'C');
              $this->Ln(20);
          }
          function Footer()
          {
              $this->SetY(-15);
              $this->SetFont('Times','I',8);
              $this->Cell(0,10,utf8_decode('n').$this->PageNo().'/m',0,0,'R');
          }
      }
      //PENDIENTE DE CAMBIAR ESTAS VARIABLES    
      session_start();

      /*$host = "sql5c75f.carrierzone.com";
      $user = "cbta39comm156054";
      $pass = "Tamarin123";
      $db = "tama5a_cbta39comm156054";*/

      $host = "localhost";
      $user = "root";
      $pass = "";
      $db = "tama5a";

      $conn = mysqli_connect($host, $user, $pass, $db)or die ("Error en la conexión");
      mysqli_select_db($conn, $db)or die("Problemas al conectar con la base de datos");

      $appat = $_POST['appat'];
      $apmat = $_POST['apmat'];
      $nombres = $_POST['nombres'];
      $sexo = $_POST['sexo'];
      $edad = $_POST['edad'];
      $calle_num = $_POST['calle_num'];
      $colonia = $_POST['colonia'];
      $municipio = $_POST['municipio'];
      $cp = $_POST['cp'];
      $tel_casa = $_POST['tel_casa'];
      $tel_tutor = $_POST['tel_tutor'];
      $tel_alumno = $_POST['tel_alumno'];
      $num_fam = $_POST['num_fam'];
      $beca = $_POST['beca'];
      $email = $_POST['email'];
      $trab_alumno = $_POST['trab_alumno'];
      $trab_madre = $_POST['trab_madre'];
      $trab_padre = $_POST['trab_padre'];
      $transporte = $_POST['transporte'];
      $esc_ant = $_POST['esc_ant'];
      $ubi_esc = $_POST['ubi_esc'];
      $prom_sec = $_POST['prom_sec'];
      $opcion_1 = $_POST['opcion_1'];
      $opcion_2 = $_POST['opcion_2'];
      $opcion_3 = $_POST['opcion_3'];
      $fecha = $_POST['fecha'];
      $hora = $_POST['hora'];
      $ficha_gratis = $_POST['ficha_gratis'];

      $sql = "INSERT INTO tama5a_fichas (appat, apmat, nombres, sexo, edad, calle_num, colonia, 
      municipio, cp, tel_casa, tel_tutor, tel_alumno, num_fam, beca, email, trab_alumno, trab_madre, 
      trab_padre, transporte, esc_ant, ubi_esc, prom_sec, opcion_1, opcion_2, opcion_3, fecha, hora, ficha_gratis) 
      VALUES ('$appat', '$apmat', '$nombres', '$sexo', '$edad', '$calle_num', '$colonia', '$municipio', 
      '$cp', '$tel_casa', '$tel_tutor', '$tel_alumno', '$num_fam', '$beca', '$email', '$trab_alumno', 
      '$trab_madre', '$trab_padre', '$transporte', '$esc_ant', '$ubi_esc', '$prom_sec', '$opcion_1', 
      '$opcion_2', '$opcion_3', '$fecha', '$hora', '$ficha_gratis')"; 

      $result = mysqli_query($conn, $sql);

      if(!$result){
        echo "<h1>Hubo algun error</h1> <a href='index.html'>Volver al inicio</a>";
      }

      //header("Location: index.html");

      $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('times','',12);

        $pdf->Cell(80);
        $pdf->Ln(3);
        $pdf->Cell(0,5,utf8_decode("Estimado(a):  ".$nombres." ".$appat." ".$apmat),0,1,'C',0);
        $pdf->Ln(10);
        $pdf->Cell(16);
        $pdf->Cell(15,7,utf8_decode("Como tus tres primeras opciones para la carrera técnica"),0,1,'L',0);
        $pdf->Cell(16);
        $pdf->Cell(15,7,utf8_decode("que cursarás en segundo semestre, has elegido"),0,1,'L',0);
        $pdf->Cell(15);
        $pdf->Cell(15,10,utf8_decode("Opción 1:  ".$opcion_1),0,1,'L',0);
        $pdf->Cell(15);
        $pdf->Cell(15,10,utf8_decode("Opción 2:  ".$opcion_2),0,1,'L',0);
        $pdf->Cell(15);
        $pdf->Cell(15,10,utf8_decode("Opción 3:  ".$opcion_3),0,1,'L',0);
        $pdf->Ln(10);
    
        $pdf->Cell(0,7,utf8_decode("Para recibir su ficha, acuda al plantel el día:  ".$fecha),0,1,'C',0);
        $pdf->Cell(0,7,utf8_decode("Presentarse con antelacion a la siguiente hora:  ".$hora),0,1,'C',0);
        $pdf->Ln(10);

        $pdf->Cell(0,7,utf8_decode("Requisitos para obtener su ficha"),0,1,'C',0);
        $pdf->Cell(0,7,utf8_decode("1. Realizar el pago de $ en la cuenta 99999 y presentar comprobante"),0,1,'C',0);
        $pdf->Cell(0,7,utf8_decode("2. Entregar este comprobante personal"),0,1,'C',0);
        $pdf->Cell(0,7,utf8_decode("3. Entregar constancia de estudios de secundaria con promedio"),0,1,'C',0);
        $pdf->Cell(0,7,utf8_decode("4. Entregar 2 fotografías tamaño infantil en blanco y negro"),0,1,'C',0);

        $pdf->Ln(10);
        $pdf->Cell(0,7,utf8_decode("Nombre y firma del aspirante"),0,1,'C',0);
        $pdf->Ln(10);
        $pdf->Cell(0,7,utf8_decode("_____________________________________"),0,1,'C',0);
        $pdf->Ln(20);

        $pdf->Cell(0,7,utf8_decode("Orgullosamente CBTA 39"),0,1,'C',0);
        
        $pdf->Output();

      mysqli_close($conn);
?>