<?php
    session_start();
    if(!isset($_SESSION['nome']) || !isset($_SESSION['email'])){
        header('Location: ../../../index.php?erro=1');    
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <?php include '../../arquivos-include/head.php';?>
</head> 
    
    
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
<?php
  if(!isset($_SESSION['cliente'])){
    include '../../arquivos-include/menu.php';
  }
  else{
    include '../../arquivos-include/menu_cliente.php';
  }
  
?>  
  <!-- CORPO DA PÁGINA DO PROJETO!!! -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <section class="content container-fluid">
              <div class="box">
                <div class="box-header with-border" style="padding:15px;">
                  <h3 class="box-title">Editar Cadastro de Clientes</h3>
                  <div class="box-tools pull-right">
                    <a href="../../cadastro/clientes/index.php"><button class="btn btn-success">Cadastrar Novo(a) Cliente</button></a>
                    <!-- /.box-tools -->
                  </div>
                  <div class="box-body">
                    <table id="tabela" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Nome</th>
                          <th>E-mail</th>
                          <th>Telefone</th>
                          <th>Área de atuação</th>
                          <th>Visualizar</th>
                          <th>Editar</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        require_once('../../../sistema/php/conectaBd/index.php');
                        $objDb = new db();
                        $link = $objDb->conecta_mysql();
                        $sql = " SELECT * FROM Clientes";
                        $resultado_ids = mysqli_query($link, $sql);
                        if($resultado_ids){
                          while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                            $id = $registros['idClientes'];
                            $nome = $registros['nomeClientes'];
                            $email = $registros['emailClientes'];
                            $telefone = $registros['telefoneClientes'];
                            $areadeatuaçaoFuncionarios = $registros['areadeatuacaoClientes'];
                            echo '<tr>';
                            echo "<td>".$nome."</td>";
                            echo '<td>'.$email.'</td>';
                            echo '<td>'.$telefone.'</td>';
                            echo '<td class="mailbox-subject"><b>'.$areadeatuaçaoFuncionarios.'</b></td>';
                            ?>
                            <td>
                              <div class='item_lista'>
                                <span class="fa fa-eye item_lista" data-toggle="modal" data-target="#seeModal" data-whateverid="<?php echo $registros['idfuncionario']; ?>">
                                </span>
                              </div>
                            </td>
                            <td>
                              <div class='item_lista'>
                                <span class="fa fa-edit item_lista" data-toggle="modal" data-target="#exampleModal" data-whateverid="<?php echo $registros['idfuncionario'];?>">
                                </span>
                              </div>
                            </td>
                            
                            <?php
                            echo '</tr>';
                          }
                        }else{
                          echo 'Erro na consulta dos emails no banco de dados!';
                        }
                        ?>
                      </tbody>
                    </table>


                    <!-- MODAL DE EDIÇÃO -->
                    <div id="exampleModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Atualizar Dados</h4>
                          </div>
                          <div class="modal-body">
                            <div class="box">
                              <!-- FORMS -->
                              
                            </div>
                          </div>

                        </div>

                      </div>

                    </div>

                    <div id="seeModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Visualizar Dados</h4>
                          </div>
                          <div class="modal-body">
                            <div class="box">
                              <!-- FORMS -->
                              
                            </div>
                          </div>

                        </div>

                      </div>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- /.row -->
              
    </section>
</div>
    <?php include '../../arquivos-include/rodape.php';?>
</div>
<?php include '../../arquivos-include/jquery.php';?>  
    
<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      var recipient = button.data('whatever') // Extract info from data-* attributes
      var recipientnome = button.data('whatevernome')
      var recipientid = button.data('whateverid')
      var recipientdetalhes = button.data('whateverdetalhes')
      var recipientnasc = button.data('whatevernasc')
      var recipientcpf = button.data('whatevercpf')
      var recipienttel = button.data('whatevertel')
      var recipientsexo = button.data('whateversexo')
      var recipientcep = button.data('whatevercep')
      var recipientrua = button.data('whateverrua')
      var recipientnumero = button.data('whatevernumero')
      var recipientcomplemento = button.data('whatevercomp')
      var recipientbairro = button.data('whateverbairro')
      var recipientcidade = button.data('whatevercity')
      var recipientestuf = button.data('whateveruf')

      var recipientfuncao = button.data('whatevertelfuncao')
      var recipientingresso = button.data('whateveringresso')

      var recipientfav1 = button.data('whateverfav1')
      var recipientbanco1 = button.data('whateverbanco1')
      var recipientagencia1 = button.data('whateveragencia1')
      var recipientconta1 = button.data('whateverconta1')
      var recipienttipo1 = button.data('whatevertipo1')

      var recipientfav2 = button.data('whateverfav2')
      var recipientbanco2 = button.data('whateverbanco2')
      var recipientagencia2 = button.data('whateveragencia2')
      var recipientconta2 = button.data('whateverconta2')
      var recipienttipo2 = button.data('whatevertipo2')


      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)

      modal.find('#id-curso').val(recipient)
      modal.find('#recipient-name').val(recipientnome)
      modal.find('#recipient-id').val(recipientid)
      modal.find('#detalhes').val(recipientdetalhes)
      modal.find('#nascimento').val(recipientnasc)
      modal.find('#cpf').val(recipientcpf)
      modal.find('#telefone').val(recipienttel)
      modal.find('#sexo').val(recipientsexo)
      modal.find('#cep').val(recipientcep)
      modal.find('#rua').val(recipientrua)
      modal.find('#numero').val(recipientnumero)
      modal.find('#bairro').val(recipientbairro)
      modal.find('#complemento').val(recipientcomplemento)
      modal.find('#cidade').val(recipientcidade)
      modal.find('#uf').val(recipientestuf)
      modal.find('#funcao').val(recipientfuncao)
      modal.find('#ingresso').val(recipientingresso)
      modal.find('#favorecido1').val(recipientfav1)
      modal.find('#banco1').val(recipientbanco1)
      modal.find('#agencia1').val(recipientagencia1)
      modal.find('#conta1').val(recipientconta1)
      modal.find('#tipo1').val(recipienttipo1)
      modal.find('#favorecido2').val(recipientfav2)
      modal.find('#banco2').val(recipientbanco2)
      modal.find('#agencia2').val(recipientagencia2)
      modal.find('#conta2').val(recipientconta2)
      modal.find('#tipo2').val(recipienttipo2)
      
    })

    $('#seeModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      var recipient = button.data('whatever') // Extract info from data-* attributes
      var recipientnome = button.data('whatevernome')
      var recipientid = button.data('whateverid')
      var recipientdetalhes = button.data('whateverdetalhes')
      var recipientnasc = button.data('whatevernasc')
      var recipientcpf = button.data('whatevercpf')
      var recipienttel = button.data('whatevertel')
      var recipientsexo = button.data('whateversexo')
      var recipientcep = button.data('whatevercep')
      var recipientrua = button.data('whateverrua')
      var recipientnumero = button.data('whatevernumero')
      var recipientcomplemento = button.data('whatevercomp')
      var recipientbairro = button.data('whateverbairro')
      var recipientcidade = button.data('whatevercity')
      var recipientestuf = button.data('whateveruf')

      var recipientfuncao = button.data('whatevertelfuncao')
      var recipientingresso = button.data('whateveringresso')

      var recipientfav1 = button.data('whateverfav1')
      var recipientbanco1 = button.data('whateverbanco1')
      var recipientagencia1 = button.data('whateveragencia1')
      var recipientconta1 = button.data('whateverconta1')
      var recipienttipo1 = button.data('whatevertipo1')

      var recipientfav2 = button.data('whateverfav2')
      var recipientbanco2 = button.data('whateverbanco2')
      var recipientagencia2 = button.data('whateveragencia2')
      var recipientconta2 = button.data('whateverconta2')
      var recipienttipo2 = button.data('whatevertipo2')


      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)

      modal.find('#id-curso').val(recipient)
      modal.find('#recipient-name').val(recipientnome)
      modal.find('#recipient-id').val(recipientid)
      modal.find('#detalhes').val(recipientdetalhes)
      modal.find('#nascimento').val(recipientnasc)
      modal.find('#cpf').val(recipientcpf)
      modal.find('#telefone').val(recipienttel)
      modal.find('#sexo').val(recipientsexo)
      modal.find('#cep').val(recipientcep)
      modal.find('#rua').val(recipientrua)
      modal.find('#numero').val(recipientnumero)
      modal.find('#bairro').val(recipientbairro)
      modal.find('#complemento').val(recipientcomplemento)
      modal.find('#cidade').val(recipientcidade)
      modal.find('#uf').val(recipientestuf)
      modal.find('#funcao').val(recipientfuncao)
      modal.find('#ingresso').val(recipientingresso)
      modal.find('#favorecido1').val(recipientfav1)
      modal.find('#banco1').val(recipientbanco1)
      modal.find('#agencia1').val(recipientagencia1)
      modal.find('#conta1').val(recipientconta1)
      modal.find('#tipo1').val(recipienttipo1)
      modal.find('#favorecido2').val(recipientfav2)
      modal.find('#banco2').val(recipientbanco2)
      modal.find('#agencia2').val(recipientagencia2)
      modal.find('#conta2').val(recipientconta2)
      modal.find('#tipo2').val(recipienttipo2)
      
    })
  </script>

  <script>
  $(function () {
    $('#tabela').DataTable()})
  function DataHora(evento, objeto){
        var keypress=(window.event)?event.keyCode:evento.which;
        campo = eval (objeto);
          if (campo.value == '00/00/0000 00:00:00'){
            campo.value=""
          }
          caracteres = '0123456789';
          separacao1 = '/';
          separacao2 = ' ';
          separacao3 = ':';
          conjunto1 = 2;
          conjunto2 = 5;
          conjunto3 = 10;
          conjunto4 = 13;
          conjunto5 = 16;
          if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19)){
            if (campo.value.length == conjunto1 )
            campo.value = campo.value + separacao1;
            else if (campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
            else if (campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
            else if (campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
            else if (campo.value.length == conjunto5)
            campo.value = campo.value + separacao3;
          }else{
            event.returnValue = false;
          }
    }
    $('#ModalApagar').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('id') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-footer #id').val(recipient)
    })
</script>

</body>
</html>
