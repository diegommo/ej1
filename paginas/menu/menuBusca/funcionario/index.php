<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema Clifops</title>
  <link rel="stylesheet" href="../../../../sistema/adminlte/plugins/iCheck/square/blue.css">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../../../../sistema/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../../../sistema/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../../../sistema/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../../../../sistema/adminlte/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../../../../sistema/adminlte/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../../../../sistema/css/cadastro/convenio.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
  select {
    width: 100%;
    padding: 4px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }
  </style>

  <script type="text/javascript" >

    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }

    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    };

    </script>
</head>

<body class="hold-transition skin-purple sidebar-mini">

<div class="wrapper">

   <header class="main-header">

  <!-- Cabeçalho da página -->
     <!-- Logo -->
    <a href="../../menuPrincipal/principal/index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>F</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Cli<b>Fops</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"></span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="../../../../sistema/adminlte/dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="../../../../sistema/adminlte/dist/img/avatar5.png" class="img-circle" alt="User Image">

                <p>
                  <small>Sistema Clifops</small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="alterar.php" class="btn btn-default btn-flat">Alterar Senha</a>
                </div>
              </li>
              <li class="user-footer">
                <div class="pull-right">
                  <a href="sair.php" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>

  </header>
  
 <?php
        include('../../menuLateral/menu/busca.php');
    ?>

    
    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Gerencie os seus Funcionários</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Calendar</li>
      </ol>
    </section>
    <section class="content container-fluid">
        <div class="box">
          <div class="box-header with-border" style="padding:15px;">
            <h3 class="box-title">Editar Cadastro de Pacientes</h3>     
            <!-- /.box-tools -->
          </div>
              <div class="box-body">
              <table id="tabela" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>Telefone</th>
                  <th>CPF</th>
                  <th>Editar</th>
                  <th>Visualizar</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                    require_once('../../../../sistema/php/conectaBd/index.php');
                    $objDb = new db();
                    $link = $objDb->conecta_mysql();
                    $sql = " SELECT * FROM funcionario";
                    $resultado_ids = mysqli_query($link, $sql);
                      if($resultado_ids){
                      while($registros = mysqli_fetch_array($resultado_ids, MYSQLI_ASSOC)){
                      $id = $registros['idfuncionario'];
                      $nome = $registros['nome'];
                      $telefone = $registros['telefone'];
                      $cpf = $registros['cpf'];
                      echo '<tr>';
                      echo "<td>$nome</td>";
                      echo '<td>'.$registros['telefone'].'</td>';
                      echo '<td class="mailbox-subject"><b>'.$registros['cpf'].'</b></td>';
                      ?>
                      <td><div class='item_lista'><span class="fa fa-edit item_lista" data-toggle="modal" data-target="#exampleModal" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whatevercep="<?php echo $registros['cep']; ?>" data-whateverrua="<?php echo $registros['rua']; ?>" data-whatevernumero="<?php echo $registros['numero']; ?>" data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelfuncao="<?php echo $registros['funcao']; ?>" data-whateveringresso="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whateverfav1="<?php echo $registros['favorecido1']; ?>" data-whateverbanco1="<?php echo $registros['banco1']; ?>" data-whateveragencia1="<?php echo $registros['agencia1']; ?>" data-whateverconta1="<?php echo $registros['conta1']; ?>" data-whatevertipo1="<?php echo $registros['tipo_conta1']; ?>" data-whateverfav2="<?php echo $registros['favorecido2']; ?>" data-whateverbanco2="<?php echo $registros['banco2']; ?>" data-whateveragencia2="<?php echo $registros['agencia2']; ?>" data-whateverconta2="<?php echo $registros['conta2']; ?>" data-whatevertipo2="<?php echo $registros['tipo_conta2']; ?>"></span></div></td>
                      <td><div class='item_lista'><span class="fa fa-eye item_lista" data-toggle="modal" data-target="#seeModal" data-whatevernome="<?php echo $registros['nome']; ?>" data-whateverdetalhes="<?php echo $registros['email']; ?>" data-whatevertel="<?php echo $registros['telefone']; ?>" data-whatevercpf="<?php echo $registros['cpf']; ?>" data-whateversexo="<?php echo $registros['sexo']; ?>" data-whatevernasc="<?php echo date('d/m/Y', strtotime($registros['nascimento'])); ?>" data-whatevercep="<?php echo $registros['cep']; ?>" data-whateverrua="<?php echo $registros['rua']; ?>" data-whatevernumero="<?php echo $registros['numero']; ?>" data-whatevercomp="<?php echo $registros['complemento']; ?>" data-whateverbairro="<?php echo $registros['bairro']; ?>" data-whatevercity="<?php echo $registros['cidade']; ?>" data-whateveruf="<?php echo $registros['uf']; ?>" data-whatevertelfuncao="<?php echo $registros['funcao']; ?>" data-whateveringresso="<?php echo date('d/m/Y', strtotime($registros['ingresso'])); ?>" data-whateverfav1="<?php echo $registros['favorecido1']; ?>" data-whateverbanco1="<?php echo $registros['banco1']; ?>" data-whateveragencia1="<?php echo $registros['agencia1']; ?>" data-whateverconta1="<?php echo $registros['conta1']; ?>" data-whatevertipo1="<?php echo $registros['tipo_conta1']; ?>" data-whateverfav2="<?php echo $registros['favorecido2']; ?>" data-whateverbanco2="<?php echo $registros['banco2']; ?>" data-whateveragencia2="<?php echo $registros['agencia2']; ?>" data-whateverconta2="<?php echo $registros['conta2']; ?>" data-whatevertipo2="<?php echo $registros['tipo_conta2']; ?>"></span></div></td>
                     <?php
                      echo '</tr>';
                        }
                      }else{
                          echo 'Erro na consulta dos emails no banco de dados!';
                        }
                  ?>
              </tbody>
            </table>            <!-- Modal de adição -->
            <div id="exampleModal" class="modal fade" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Atualizar Dados</h4>
                  </div>
                  <div class="modal-body">
                    <div class="box">
                      <div class="box-header with-border" style="padding:15px;">
                      <h5 class="box-title">Editar Cadastro</h5>
                      <!-- /.box-tools -->
                      </div>
                  <!-- /.box-header -->
                      <form action="../../../../sistema/php/apresentaDados/paciente/insert.php" method="POST"> 
                      <div class="box-body">
                        <div class="row">
                          <div class="form-group col-lg-12">
                          <h5>Nome do Paciente</h5>
                              <input type="text" name= "nome" class="form-control" placeholder="Nome" id="recipient-name">
                          </div>
                          <div class="form-group col-lg-6">
                                <h5>Sexo</h5>
                                <select class="form-control" name="sexo" id="sexo">
                                  <option value="#" id ="sexo ">Selecione...</option>                      
                                  <option value="feminino">Feminino</option>
                                  <option value="masculino">Masculino</option>
                                </select>
                          </div>
                          <div class="form-group col-lg-6">
                                <h5>Data de Nascimento</h5>
                                <input type="nascimento" name= "nascimento" class="form-control" placeholder="Data de Nascimento" OnKeyPress="formatar('##/##/####', this)" maxlength="10" id="nascimento">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-12">
                          <h5>Email</h5>
                              <input type="email" name= "email" class="form-control" placeholder="Email" id="detalhes">
                          </div>
                          <div class="form-group col-lg-6">
                          <h5>Telefone</h5>
                            <input name="telefone" type="text" class="form-control" placeholder="Telefone" OnKeyPress="formatar('##-#####-####', this)" maxlength="13" id="telefone">
                          </div>
                          <div class="form-group col-lg-6">
                          <h5>CPF</h5>
                            <input name="cpf" type="text" class="form-control" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" id="cpf">
                          </div>
                          <div class="row">
                          <div class="form-group col-lg-4">
                          <h5>CEP</h5>
                            <input name="cep" type="text" id="cep" value="" size="60" maxlength="8" onblur="pesquisacep(this.value);" class="form-control" placeholder="CEP"/>
                          </div>
                          <div class="form-group col-lg-8">
                          <h5>Rua</h5>
                            <input name="rua" type="text" id="rua" size="60" class="form-control" placeholder="Rua">
                          </div>
                          <div class="form-group col-lg-6">
                            <h5>Número</h5>
                            <input type="text" name= "numero" class="form-control" placeholder="Número" id="numero">
                          </div>
                          <div class="form-group col-lg-6">
                            <h5>Complemento</h5>
                            <input type="text" name= "complemento" class="form-control" placeholder="Complemento" id="complemento">
                          </div>
                          <div class="form-group col-lg-6">
                          <h5>Bairro</h5>
                            <input name="bairro" type="text" id="bairro" size="60" class="form-control" placeholder="Bairro">
                          </div>
                          <div class="form-group col-lg-3">
                          <h5>Cidade</h5>
                            <input name="cidade" type="text" id="cidade" size="60" class="form-control" placeholder="Cidade">
                          </div>
                          <div class="form-group col-lg-3">
                          <h5>UF</h5>
                            <input name="uf" type="text" id="uf" size="60" class="form-control" placeholder="UF">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-6">
                          <h5>Função</h5>
                          <input name="funcao" type="text" id="funcao" value="" class="form-control" placeholder="Função"/>
                          </div>
                          <div class="form-group col-lg-6">
                            <h5>Ingresso</h5>
                            <input name="ingresso" type="text" id="ingresso" value="" class="form-control" placeholder=""/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-12">
                            <h5>Favorecido</h5>
                            <input name="favorecido1" type="text" id="favorecido1" value="" class="form-control" placeholder="Favorecido"/>
                          </div>
                          <div class="form-group col-lg-3">
                            <h5>Banco</h5>
                            <input name="banco1" type="text" id="banco1" value="" class="form-control" placeholder="Banco"/>
                          </div>
                          <div class="form-group col-lg-3">
                            <h5>Agência</h5>
                            <input name="agencia1" type="text" id="agencia1" value="" class="form-control" placeholder="Agência"/>
                          </div>
                          <div class="form-group col-lg-3">
                            <h5>Conta</h5>
                            <input name="conta1" type="text" id="conta1" value="" class="form-control" placeholder="Conta"/>
                          </div>
                          <div class="form-group col-lg-3">
                            <h5>Tipo</h5>
                            <input name="tipo1" type="text" id="tipo1" value=""class="form-control" placeholder=""/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-12">
                            <h5>Favorecido</h5>
                            <input name="favorecido2" type="text" id="favorecido2" value="" class="form-control" placeholder="Favorecido"/>
                          </div>
                          <div class="form-group col-lg-3">
                            <h5>Banco</h5>
                            <input name="banco2" type="text" id="banco2" value="" class="form-control" placeholder="Banco"/>
                          </div>
                          <div class="form-group col-lg-3">
                            <h5>Agência</h5>
                            <input name="agencia2" type="text" id="agencia2" value="" class="form-control" placeholder="Agência"/>
                          </div>
                          <div class="form-group col-lg-3">
                            <h5>Conta</h5>
                            <input name="conta2" type="text" id="conta2" value="" class="form-control" placeholder="Conta"/>
                          </div>
                          <div class="form-group col-lg-3">
                            <h5>Tipo</h5>
                            <input name="tipo2" type="text" id="tipo2" value="" class="form-control" placeholder=""/>
                          </div>
                        </div>
                      </div>
                    
                      <div class="modal-footer">
                        <input type="submit" class="btn btn-alert" value="Cancelar" name="submit">
                        <input type="submit" class="btn btn-primary" value="Atualizar Funcionário" name="submit">
                      </div>
                    </div>
                    </form>
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
                  <!-- /.box-header -->
                      <form action="../../../../sistema/php/apresentaDados/paciente/insert.php" method="POST"> 
                      <div class="box-body">
                        <div class="row">
                          <div class="form-group col-lg-12">
                          <h5>Nome do Paciente</h5>
                              <input disabled type="text" name= "nome" class="form-control" placeholder="Nome" id="recipient-name">
                          </div>
                          <div class="form-group col-lg-6">
                                <h5>Sexo</h5>
                                <select disabled class="form-control" name="sexo" id="sexo">
                                  <option value="#" id ="sexo ">Selecione...</option>                      
                                  <option value="feminino">Feminino</option>
                                  <option value="masculino">Masculino</option>
                                </select>
                          </div>
                          <div class="form-group col-lg-6">
                                <h5>Data de Nascimento</h5>
                                <input disabled type="nascimento" name= "nascimento" class="form-control" placeholder="Data de Nascimento" OnKeyPress="formatar('##/##/####', this)" maxlength="10" id="nascimento">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-12">
                          <h5>Email</h5>
                              <input disabled type="email" name= "email" class="form-control" placeholder="Email" id="detalhes">
                          </div>
                          <div class="form-group col-lg-6">
                          <h5>Telefone</h5>
                            <input disabled name="telefone" type="text" class="form-control" placeholder="Telefone" OnKeyPress="formatar('##-#####-####', this)" maxlength="13" id="telefone">
                          </div>
                          <div class="form-group col-lg-6">
                          <h5>CPF</h5>
                            <input disabled name="cpf" type="text" class="form-control" placeholder="CPF" OnKeyPress="formatar('###.###.###-##', this)" maxlength="14" id="cpf">
                          </div>
                          <div class="row">
                          <div class="form-group col-lg-4">
                          <h5>CEP</h5>
                            <input disabled name="cep" type="text" id="cep" value="" size="60" maxlength="8" onblur="pesquisacep(this.value);" class="form-control" placeholder="CEP"/>
                          </div>
                          <div class="form-group col-lg-8">
                          <h5>Rua</h5>
                            <input disabled name="rua" type="text" id="rua" size="60" class="form-control" placeholder="Rua">
                          </div>
                          <div class="form-group col-lg-6">
                            <h5>Número</h5>
                            <input disabled type="text" name= "numero" class="form-control" placeholder="Número" id="numero">
                          </div>
                          <div class="form-group col-lg-6">
                            <h5>Complemento</h5>
                            <input disabled type="text" name= "complemento" class="form-control" placeholder="Complemento" id="complemento">
                          </div>
                          <div class="form-group col-lg-6">
                          <h5>Bairro</h5>
                            <input disabled name="bairro" type="text" id="bairro" size="60" class="form-control" placeholder="Bairro">
                          </div>
                          <div class="form-group col-lg-3">
                          <h5>Cidade</h5>
                            <input disabled name="cidade" type="text" id="cidade" size="60" class="form-control" placeholder="Cidade">
                          </div>
                          <div class="form-group col-lg-3">
                          <h5>UF</h5>
                            <input disabled name="uf" type="text" id="uf" size="60" class="form-control" placeholder="UF">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-6">
                          <h5>Função</h5>
                          <input disabled name="funcao" type="text" id="funcao" value="" class="form-control" placeholder="Função"/>
                          </div>
                          <div class="form-group col-lg-6">
                            <h5>Ingresso</h5>
                            <input disabled name="ingresso" type="text" id="ingresso" value="" class="form-control" placeholder=""/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-12">
                            <h5>Favorecido</h5>
                            <input disabled name="favorecido1" type="text" id="favorecido1" value="" class="form-control" placeholder="Favorecido"/>
                          </div>
                          <div class="form-group col-lg-3">
                            <h5>Banco</h5>
                            <input disabled name="banco1" type="text" id="banco1" value="" class="form-control" placeholder="Banco"/>
                          </div>
                          <div class="form-group col-lg-3">
                            <h5>Agência</h5>
                            <input disabled name="agencia1" type="text" id="agencia1" value="" class="form-control" placeholder="Agência"/>
                          </div>
                          <div class="form-group col-lg-3">
                            <h5>Conta</h5>
                            <input disabled name="conta1" type="text" id="conta1" value="" class="form-control" placeholder="Conta"/>
                          </div>
                          <div class="form-group col-lg-3">
                            <h5>Tipo</h5>
                            <input disabled name="tipo1" type="text" id="tipo1" value=""class="form-control" placeholder=""/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-lg-12">
                            <h5>Favorecido</h5>
                            <input disabled name="favorecido2" type="text" id="favorecido2" value="" class="form-control" placeholder="Favorecido"/>
                          </div>
                          <div class="form-group col-lg-3">
                            <h5>Banco</h5>
                            <input disabled name="banco2" type="text" id="banco2" value="" class="form-control" placeholder="Banco"/>
                          </div>
                          <div class="form-group col-lg-3">
                            <h5>Agência</h5>
                            <input disabled name="agencia2" type="text" id="agencia2" value="" class="form-control" placeholder="Agência"/>
                          </div>
                          <div class="form-group col-lg-3">
                            <h5>Conta</h5>
                            <input disabled name="conta2" type="text" id="conta2" value="" class="form-control" placeholder="Conta"/>
                          </div>
                          <div class="form-group col-lg-3">
                            <h5>Tipo</h5>
                            <input disabled name="tipo2" type="text" id="tipo2" value="" class="form-control" placeholder=""/>
                          </div>
                        </div>
                      </div>
                    </div>
                    </form>
                    </div>   
                  </div>
                  
                </div>
                  
              </div>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
</div>
  </div>
      <!-- /.row -->
  </section>

    
    
    
    
    
    
  <!-- Main Footer -->
  <footer class="main-footer">

      <!-- Rodapé da pagina -->
      <!-- To the right -->
    <div class="pull-right hidden-xs">
      EngNet Consultoria e Implementação
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="../../index.php">CliFops</a>.</strong> Todos os Direitos Reservados.

  </footer>
</div>

<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../../../sistema/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../../../sistema/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../../../sistema/adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="../../../../sistema/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../../../sistema/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../../../sistema/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../../../sistema/adminlte/dist/js/demo.js"></script>
''
<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal

      var recipient = button.data('whatever') // Extract info from data-* attributes
      var recipientnome = button.data('whatevernome')
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

</body>
</html>
