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
// Função para listar empresas com filtro
function listarEmpresas($filter = '') {
    global $conn;
    // Consulta SQL com filtro
    $sql = "SELECT * FROM empresa WHERE razaosocial LIKE ? OR nome_fantasia LIKE ?";
    $stmt = $conn->prepare($sql);
    $filter = "%$filter%";  // Envolvendo o filtro com '%' para buscar em qualquer parte do nome
    $stmt->bind_param("ss", $filter, $filter); // Binding de parâmetros
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC); // Retorna como um array associativo
}

// Função para listar setores com filtro
function listarSetores($filter = '') {
    global $conn;
    // Consulta SQL com filtro
    $sql = "SELECT * FROM setor WHERE descricao LIKE ?";
    $stmt = $conn->prepare($sql);
    $filter = "%$filter%";  // Envolvendo o filtro com '%' para buscar em qualquer parte da descrição
    $stmt->bind_param("s", $filter); // Binding de parâmetros
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC); // Retorna como um array associativo
}
// Função para listar empresas com filtro
if (!function_exists('listarEmpresas')) {
    function listarEmpresas($filter = '') {
        global $conn;

        // Se não houver filtro, retornamos todas as empresas
        if (empty($filter)) {
            $sql = "SELECT * FROM empresa";
            $stmt = $conn->prepare($sql);
        } else {
            // Consulta SQL com filtro
            $sql = "SELECT * FROM empresa WHERE razaosocial LIKE ? OR nome_fantasia LIKE ?";
            $stmt = $conn->prepare($sql);
            $filter = "%$filter%";  // Envolvendo o filtro com '%' para buscar em qualquer parte do nome
            $stmt->bind_param("ss", $filter, $filter); // Binding de parâmetros
        }

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC); // Retorna como um array associativo
    }
}

// Função para listar setores com filtro
if (!function_exists('listarSetores')) {
    function listarSetores($filter = '') {
        global $conn;

        // Se não houver filtro, retornamos todos os setores
        if (empty($filter)) {
            $sql = "SELECT * FROM setor";
            $stmt = $conn->prepare($sql);
        } else {
            // Consulta SQL com filtro
            $sql = "SELECT * FROM setor WHERE descricao LIKE ?";
            $stmt = $conn->prepare($sql);
            $filter = "%$filter%";  // Envolvendo o filtro com '%' para buscar em qualquer parte da descrição
            $stmt->bind_param("s", $filter); // Binding de parâmetros
        }

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC); // Retorna como um array associativo
    }
}
?>

