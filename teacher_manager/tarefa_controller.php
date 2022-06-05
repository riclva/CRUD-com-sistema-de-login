<?php 

      require '../../teacher_manager/conexao.php';
      require '../../teacher_manager/professor.model.php';
      require '../../teacher_manager/professor.service.php';
      require '../../teacher_manager/user.model.php';
      require '../../teacher_manager/user.service.php';

      $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

      if ($acao == 'inserir') {
           
            session_start(); 

            $professor = new Professor();
            $professor->__set('nome', $_POST['nome']);
            $professor->__set('materia', $_POST['materia']);
            $professor->__set('sexo', $_POST['sexo']);
            $professor->__set('id_usuario', $_SESSION['id']);                                              
            $conexao = new Conexao();

            $professorService = new ProfessorService($conexao, $professor);
            $professorService->inserir();

            header('Location: professor_registro.php');   
      } else if ($acao == 'consultar') {
            $professor = new Professor();
            $conexao = new Conexao();

            $professorService = new ProfessorService($conexao, $professor);
            $array = $professorService->consultar();
      } else if ($acao == 'editar') {
           
            $professor = new Professor();
            $professor->__set('id', $_POST['id_edit']);
            $professor->__set('nome', $_POST['nome']);
            $professor->__set('materia', $_POST['materia']);
            $professor->__set('sexo', $_POST['sexo']);
            $conexao = new Conexao();

            $professorService = new ProfessorService($conexao, $professor);
            $professorService->editar();
            header('Location: professor_registro.php'); 
      } else if ($acao == 'filtrar') {
            $professor = new Professor();
            $professor->__set('nome', $_POST['nome_filtrado']);
            $professor->__set('materia', $_POST['materia_filtrada']);
            $professor->__set('sexo', $_POST['sexo_filtrado']);
            $professor->__set('id_usuario', $_SESSION['id']);
            $conexao = new Conexao();

            $professorService = new ProfessorService($conexao, $professor);
            $array = $professorService->filtrar();


      } else if ($acao == 'excluir') {
            $professor = new Professor();
            $professor->__set('id', $_GET['id']);

            $conexao = new Conexao();

            $professorService = new ProfessorService($conexao, $professor); 
            $professorService->deletar();
            header('Location: professor_registro.php');
      } else if ($acao == 'cadastrar') {
            $user = new User();
            $user->__set('email', $_POST['email']);
            $user->__set('senha', $_POST['senha']);

            $conexao = new Conexao();
            
            $userService = new UserService($conexao, $user);
            $userService->efetuar_cadastro();
            header('Location: index.php');
      } else if ($acao == 'logar') {
            
            session_start();

            $usuario_id = null; 

            $user = new User();
            $user->__set('email', $_POST['email']);
            $user->__set('senha', $_POST['senha']);

            $conexao = new Conexao();
            
            $userService = new UserService($conexao, $user);
            
            $usuario_autenticado = $userService->verificar_usuario();
            
            

            if ($usuario_autenticado) {
                  
                  foreach ($usuario_autenticado as $key => $user) {
                       $_SESSION['id'] = $user->id;
                  }           
                  $_SESSION['autenticado'] = 'SIM';
                  header('Location: professor_registro.php');
            } else {
                  $_SESSION['autenticado'] = 'NAO';
                  header('Location: index.php');
            }
            
            

      }


      
  
?>