<?php
include_once 'config.php';

if (isset($_GET['id'])) {
    $id_empresa = $_GET['id'];

    $sql = "DELETE FROM empresa WHERE id_empresa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_empresa);

    if ($stmt->execute()) {
        header("Location: index.php?message=Empresa excluída com sucesso");
        exit();
    } else {
        echo "Erro ao excluir a empresa: " . $stmt->error;
    }
} else {
    header("Location: index.php");
    exit();
}
?>
