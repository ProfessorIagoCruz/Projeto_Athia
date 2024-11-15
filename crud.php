<?php
include_once 'config.php';
function criarEmpresa($razaosocial, $nome_fantasia, $cnpj) {
    global $conn;
    $sql = "INSERT INTO empresa (razaosocial, nome_fantasia, cnpj) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $razaosocial, $nome_fantasia, $cnpj); 
    return $stmt->execute();
}
function criarSetor($descricao) {
    global $conn;
    $sql = "INSERT INTO setor (descricao) VALUES (?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $descricao); 
    return $stmt->execute();
}
function listarEmpresas() {
    global $conn;
    $sql = "SELECT * FROM empresa";
    $result = $conn->query($sql); 
    return $result->fetch_all(MYSQLI_ASSOC);
}
function listarSetores() {
    global $conn;
    $sql = "SELECT * FROM setor";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}
function atualizarEmpresa($id_empresa, $razaosocial, $nome_fantasia, $cnpj) {
    global $conn;
    $sql = "UPDATE empresa SET razaosocial = ?, nome_fantasia = ?, cnpj = ? WHERE id_empresa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $razaosocial, $nome_fantasia, $cnpj, $id_empresa);
    return $stmt->execute();
}
function atualizarSetor($id_setor, $descricao) {
    global $conn;
    $sql = "UPDATE setor SET descricao = ? WHERE id_setor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $descricao, $id_setor);
    return $stmt->execute();
}
function excluirEmpresa($id_empresa) {
    global $conn;
    $sql = "DELETE FROM empresa WHERE id_empresa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_empresa);
    return $stmt->execute();
}
function excluirSetor($id_setor) {
    global $conn;
    $sql = "DELETE FROM setor WHERE id_setor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_setor);
    return $stmt->execute();
}
?>
