<?php 
    require "../../../app_lista_tarefa/tarefa.model.php"; 
    require "../../../app_lista_tarefa/tarefa.service.php"; 
    require "../../../app_lista_tarefa/conexao.php";
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : $acao;
    if( $acao == 'inserir') {
    $tarefa = new Tarefa(); 
    $tarefa->__set('tarefa', $_POST['tarefa']); 
    $conexao = new Conexao(); 
    $tarefaService = new TarefaService($conexao, $tarefa);
    $tarefaService->inserir();
    header('Location: nova_tarefa.php?inclusao=1');
    }
    else if($acao=='recuperar') {
        $tarefa = new Tarefa(); 
        $conexao = new Conexao(); 
        $tarefaService = new TarefaService($conexao, $tarefa); 
        $tarefas = $tarefaService->recuperar();
    }
    else if($acao=='atualizar') { 
        $tarefa = new Tarefa(); 
        $tarefa->__set('id', $_POST['id']) ;
        $tarefa->__set('tarefa', $_POST['tarefa']); 
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService ->atualizar();
        if($tarefaService -> atualizar()) {
            header('Location: todas_tarefas.php');
        }
    }
    else if ($acao== 'remover') { 
        $tarefa = new Tarefa(); 
        $tarefa->__set('id', $_GET['id']) ;
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService ->remover();
        header('location: todas_tarefas.php');
    }
    else if ($acao == 'concluir') {
        $tarefa = new Tarefa(); 
        $tarefa->__set('id', $_GET['id']) ;
        $conexao = new Conexao();
        $tarefaService = new TarefaService($conexao, $tarefa);
        $tarefaService ->concluir();
        header('location: todas_tarefas.php');
    }

?>