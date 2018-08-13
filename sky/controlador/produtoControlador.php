 <?php

require "modelo/produtoModelo.php";

function index() {
    $dados["produtos"] = pegarTodosProdutos();
    exibir("produto/listar", $dados);
}

function adicionar() {
    if (ehPost()) {
        extract($_POST);
        alert(adicionarProduto($nome, $preco, $descricao, $sabor));
        redirecionar("produto/index");
    } else {
        exibir("produto/formulario");
    }
}

function deletar($id) {
    alert(deletarUsuario($id));
    redirecionar("usuario/index");
}

function editar($id) {
    if (ehPost()) {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        alert(editarUsuario($id, $nome, $email));
        redirecionar("usuario/index");
    } else {
        $dados['usuario'] = pegarUsuarioPorId($id);
        $dados['acao'] = "./usuario/editar/$id";
        exibir("usuario/formulario", $dados);
    }
}

function visualizar($id) {
    $dados['usuario'] = pegarUsuarioPorId($id);
    exibir("usuario/visualizar", $dados);
}