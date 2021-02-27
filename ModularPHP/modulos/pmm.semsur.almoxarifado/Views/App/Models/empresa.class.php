<?php
    /*     Class produtos    */

     require_once 'connect.php';

      class empresa extends Connect
     {
     	
     	public function index()
		{


     		$this->query = "SELECT * FROM `empresa` ORDER BY nomeempresa";
     		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

     		if($this->result){
     		
     			while ($row = mysqli_fetch_array($this->result)) {


     				echo '<li >
           
                      <!-- drag handle -->
                          <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                          </span>
                      <!-- checkbox -->
                   

                      
                      <!-- todo text -->
  <span class="text"> '.$row['nomeempresa'].'  
  <span class="handle">
                            <i class="fa fa-ellipsis-v"></i>
                            <i class="fa fa-ellipsis-v"></i>
                          </span>
  
  CNPJ : '.$row['cnpjempresa'].' </span>
                     
                      <div class="tools right">

                      <a href="editempresa.php?id='.$row['idempresa'].'"><i class="fa fa-edit"></i></a> 
                    
                      <!-- Button trigger modal -->
                    <a href="" data-toggle="modal" data-target="#myModal'.$row['idempresa'].'">';

                    

                    echo '</a> </div>

    <!-- Modal -->


  </li>' ;
                     				
     			}     			
     		}

     	}
//listar empresa
     	public function listempresa($idempresa){

        
     		$this->query = "SELECT * FROM `empresa` WHERE `idempresa` = '$idempresa' ";
     		$this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

     		if($row = mysqli_fetch_array($this->result)){

            $Nomeempresa = $row['nomeempresa'];
            $CNPJempresa = $row['cnpjempresa'];
            $Emailempresa = $row['emailempresa'];
            $Enderecoempresa = $row['enderecoempresa'];
            $Telefoneempresa = $row['telefoneempresa1'];
			
			echo 'listar empresa';

            }
			
			  echo '<div class="content-wrapper">


<!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Adicionar <small>empresa</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="../"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">empresa</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">

		<a href="./" class="btn btn-success">Voltar</a>
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">empresa</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" action="../../App/Database/insertempresa.php" method="POST">
			  <input type="hidden" name="idempresa" value="'.$idempresa.'">
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome da Empresa</label>
                    <input type="text" name="Nomeempresa" value="'.$Nomeempresa.'" class="form-control" id="exampleInputEmail1" placeholder="Nome empresa">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">CNPJ</label>
                    <input type="text" name="CNPJempresa" value="'.$CNPJempresa.'" class="form-control" id="exampleInputEmail1" placeholder="CNPJ">
                  </div>
                  <div class="form-group">
                    <labeel for="exampleInputEmail1">E-mail</label>
                    <input type="text" name="Emailempresa" value="'.$Emailempresa.'" class="form-control" id="exampleInputEmail1" placeholder="E-mail">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Endereco</label>
                    <input type="text" name="Enderecoempresa" value="'.$Enderecoempresa.'" class="form-control" id="exampleInputEmail1" placeholder="Endereço">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Telefone</label>
                    <input type="text" name="Telefoneempresa" value="'.$Telefoneempresa.'" class="form-control" id="exampleInputEmail1" placeholder="Telefone">
                  </div>
                  <hr />
                   
                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" name="update" class="btn btn-primary" value="update">Cadastrar</button>
                  <a class="btn btn-danger" href="../../views/empresa">Cancelar</a>
                </div>
              </form>
            </div>
            <!-- /.box -->
            </div>
  </div></div></div></section></div>';
		}		

		
//listar empresa


//Insert
     	public function Insertempresa($Nomeempresa,$CNPJempresa,$Emailempresa, $Enderecoempresa, $Telefoneempresa)
      {

        $this->query = "SELECT * FROM `empresa` WHERE `nomeempresa` = '$Nomeempresa'";
        $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

        /*--Alteração de codigo para corriguir erro de verificação 
        se empresa existe ou não no DB. */

        $total = mysqli_num_rows($this->result); 

        if($total > 0){       
          $row = mysqli_fetch_array($this->result);

          $idempresa = $row['idempresa'];
		  
		  echo '<br><br>pagina Classe - empresa existe <br><br>';

        }else{

         $query = "INSERT INTO `empresa`(`nomeempresa`,`cnpjempresa`,`emailempresa`,`enderecoempresa`,`telefoneempresa1`) VALUES ('$Nomeempresa','$CNPJempresa','$Emailempresa', '$Enderecoempresa', '$Telefoneempresa')";
        
          $result = mysqli_query($this->SQL, $query) or die(mysqli_error($this->SQL));
          $idempresa = mysqli_insert_id($this->SQL);
        
        }       
          
            
     	}
//Insert


//update

public function UpdateEmpresa($idempresa, $Nomeempresa, $CNPJempresa, $Emailempresa, $Enderecoempresa, $Telefoneempresa)
  {
      if(mysqli_query($this->SQL, "UPDATE `empresa` SET `nomeempresa` = '$Nomeempresa', `cnpjempresa` = '$CNPJempresa', `emailempresa`='$Emailempresa', `enderecoempresa`='$Enderecoempresa', `telefoneempresa1`='$Telefoneempresa'  WHERE `idempresa` = '$idempresa' ") or die(mysqli_error($this->SQL))){


                header('Location: ../../views/empresa/index.php?alert=1');
      }else{
                header('Location: ../../views/empresa/index.php?alert=0');
              }
    
  }//update


  }

     $empresa = new empresa;
