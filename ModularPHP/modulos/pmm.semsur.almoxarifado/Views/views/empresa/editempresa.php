  <?php
  if(isset($_GET['id'])){
	  $idempresa = $_GET['id'];
	  
	  echo "$idempresa" ;	  
  }
  
  require_once '../../App/auth.php';
  require_once '../../layout/script.php';
  require_once '../../App/Models/empresa.class.php';

  echo $head;
  echo $header;
  echo $aside;


 $empresa->listempresa($idempresa);



  echo  $footer;
  echo $javascript;
  ?>