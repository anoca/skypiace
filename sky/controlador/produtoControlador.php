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
    alert(deletarProduto($id));
    redirecionar("produto/index");
}

function editar($id) {
    if (ehPost()) {
        $nome = $_POST["nmProduto"];
        $preco = $_POST["preco"];
        $descricao = $_POST["descricao"];
        $sabor = $_POST["sabor"];
        alert(editarProduto($nome, $preco, $descricao, $sabor));
        redirecionar("produto/index");
    } else {
        $dados['produto'] = pegarProdutoPorId($id);
        $dados['acao'] = "./produto/editar/$id";
        exibir("produto/formulario", $dados);
    }
}

function visualizar($id) {
    $dados['produto'] = pegarProdutooPorId($id);
    exibir("produto/visualizar", $dados);
}