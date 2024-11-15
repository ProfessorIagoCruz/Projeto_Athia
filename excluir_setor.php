<?php
include_once 'config.php';

if (isset($_GET['id'])) {
    $id_setor = $_GET['id'];

    $sql = "DELETE FROM setor WHERE id_setor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_setor);

    if ($stmt->execute()) {
        header("Location: index.php?message=Setor excluído com sucesso");
        exit();
    } else {
        echo "Erro ao excluir o setor: " . $stmt->error;
    }
} else {
    header("Location: index.php");
    exit();
}
?>
