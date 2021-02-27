  <?php

  /*
   Class produtos
  */

   require_once 'connect.php';

   class Produtos extends Connect
   {
   	
   	public function index($value)
   	{
   		$this->query = "SELECT * FROM `produtos`";
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
          <form class="label" name="ativ'.$row['CodRefProduto'].'" action="../../App/Database/action.php" method="post">
                    <input type="hidden" name="id" id="id" value="'.$row['CodRefProduto'].'">
                    <input type="hidden" name="tabela" id="tabela" value="produtos">                  
                    <input type="checkbox" id="status" name="status" ';

                     
                    
                    echo ' value="" onclick="this.form.submit();" /></form>
          
          <!-- todo text -->
          <span class="text"><span class="badge left">'.$row['CodRefProduto'].'</span> '.$row['NomeProduto'].'</span>
          <!-- Emphasis label -->
          <!-- <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small> -->
          <!-- General tools such as edit or delete-->
          <div class="tools right">
		  
		  
						
						<a href=><i class="fa fa-trash"></i></a>
					
						<a href="" data-toggle="modal" data-target="#myModalup'.$row['CodRefProduto'].'"><i class="fa fa-edit"></i></a> 
                    
                      <!-- Button trigger modal -->
                    <a href="" data-toggle="modal" data-target="#myModal'.$row['CodRefProduto'].'">';



                    echo '</a> </div>

    <!-- Modal -->
  <div class="modal fade" id="myModal'.$row['CodRefProduto'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="delprod'.$row['CodRefProduto'].'" name="delprod'.$row['CodRefProduto'].'" action="../../App/Database/delprod.php" method="post" style="color:#000;">
    
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Você tem serteza que deseja alterar o status deste item na sua lista.</h4>
          </div>
		  
          <div class="modal-body">
            Nome: '.$row['NomeProduto'].'
          </div>
		  
		  <div class="modal-body">
            Descrição: '.$row['DescricaoProduto'].'
          </div>
		  
          <input type="hidden" id="id" name="id" value="'.$row['CodRefProduto'].'">
          <div class="modal-footer">
            <button type="submit" value="Cancelar" class="btn btn-default">Não</button>
            <button type="submit" name="update" value="Cadastrar" class="btn btn-primary">Sim</button>
          </div>
        </div>
      </div>
      </form>
    </div>


      <!-- Modal UPDATE -->
  <div class="modal fade" id="myModalup'.$row['CodRefProduto'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form id="Upprod'.$row['CodRefProduto'].'" name="Upprod'.$row['CodRefProduto'].'" action="../../App/Database/insertprod.php" method="post" style="color:#000;">
    
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Você tem serteza que deseja alterar o status deste item na sua lista.</h4>
          </div>
          <div class="modal-body">
            Nome Atual:
            <input type="text" id="nomeProduto" name="nomeProduto" value="'.$row['NomeProduto'].'">
          </div>
		  
		  <div class="modal-body">
            Descrição Atual:
            <textarea rows="6" size="30" name="DescricaoProduto" class="form-control" >'.$row['DescricaoProduto'].'</textarea>
          </div>
		  
		  
		  
		  
          <input type="hidden" id="id" name="id" value="'.$row['CodRefProduto'].'">
          
          <div class="modal-footer">
            <button type="submit" value="Cancelar" class="btn btn-default">Não</button>
            <button type="submit" name="update" value="Cadastrar" class="btn btn-primary">Sim</button>
          </div>
        </div>
      </div>
      </form>
    </div>
          
        </li>';

      }

    }

  }

  public function listProdutos(){

   $this->query = "SELECT *FROM `produtos`";
   $this->result = mysqli_query($this->SQL, $this->query) or die ( mysqli_error($this->SQL));

   if($this->result){

    while ($row = mysqli_fetch_array($this->result)) {
      if($value == $row['CodRefProduto']){ 
        $selected = "selected";
      }else{
        $selected = "";
      }
      echo '<option value="'.$row['CodRefProduto'].'" '.$selected.' >'.$row['NomeProduto'].'</option>';
    }

  }
  }

  public function InsertProd($nomeProduto, $DescricaoProduto){

   $this->query = "INSERT INTO `produtos`(`CodRefProduto`, `NomeProduto`, `DescricaoProduto`) VALUES (NULL,'$nomeProduto','$DescricaoProduto')";
   if($this->result = mysqli_query($this->SQL, $this->query) or die(mysqli_error($this->SQL))){

    header('Location: ../../views/prod/index.php?alert=1');
  }else{
    header('Location: ../../views/prod/index.php?alert=0');
  }
  }

  public function UpdateProd($id, $nomeProduto, $DescricaoProduto)
  {
      if(mysqli_query($this->SQL, "UPDATE `produtos` SET `NomeProduto` = '$nomeProduto', `DescricaoProduto` = '$DescricaoProduto'  WHERE `CodRefProduto` = '$id'") or die(mysqli_error($this->SQL))){

                header('Location: ../../views/prod/index.php?alert=1');
      }else{
                header('Location: ../../views/prod/index.php?alert=0');
              }
    
  }

  public function DelProdutos($value)
      {

        $this->query = "SELECT * FROM `produtos` WHERE `CodRefProduto` = '$value'";
        $this->result = mysqli_query($this->SQL, $this->query);
        if($row = mysqli_fetch_array($this->result)){

                $id = $row['CodRefProduto'];
                $public = $row['PublicProduto'];

                

                mysqli_query($this->SQL, "UPDATE `produtos` ") or die(mysqli_error($this->SQL));
                header('Location: ../../views/prod/index.php?alert=1');
        }else{
                header('Location: ../../views/prod/index.php?alert=0');
              }
    } 

  }

  $produtos = new Produtos;