 <?php

function pegarTodosProdutos() {
    $sql = "SELECT * FROM produto";
    $resultado = mysqli_query(conn(), $sql);
    $produtos = array();
    while ($linha = mysqli_fetch_array($resultado)) {
        $produtos[] = $linha;
    }
    return $produtos;
}

function pegarProdutoPorId($id) {
    $sql = "SELECT * FROM produto WHERE idProduto= $id";
    $resultado = mysqli_query(conn(), $sql);
    $produto = mysqli_fetch_array($resultado);
    return $produto;
}

function adicionarProduto($nome, $preco, $descricao,$sabor) {
    $sql = "INSERT INTO produto (nmProduto, preco, descricao, sabor) 
			VALUES ('$nome', $preco, '$descricao', '$sabor')";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao cadastrar produto' . mysqli_error($cnx)); }
    return 'Produto cadastrado com sucesso!';
}

function editarProduto($id, $nome, $preco, $descricao, $sabor) {
    $sql = "UPDATE produto SET nmProduto = '$nome', preco = $preco, descricao= '$descricao', sabor= '$sabor' WHERE idProduto = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao alterar produto' . mysqli_error($cnx)); }
    return 'Produto alterado com sucesso!';
}

function deletarProduto($id) {
    $sql = "DELETE FROM produto WHERE idProduto = $id";
    $resultado = mysqli_query($cnx = conn(), $sql);
    if(!$resultado) { die('Erro ao deletar produto' . mysqli_error($cnx)); }
    return 'Produto deletado com sucesso!';
            
}