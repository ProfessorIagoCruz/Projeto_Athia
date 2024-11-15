<?php
include_once 'config.php';
include_once 'crud.php';
if (isset($_GET['id'])) {
    $id_setor = $_GET['id'];
    $sql = "SELECT * FROM setor WHERE id_setor = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_setor);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $setor = $result->fetch_assoc();
    } else {
        die("Setor não encontrado!");
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];
    $sql_update = "UPDATE setor SET descricao = ? WHERE id_setor = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("si", $descricao, $id_setor);
    
    if ($stmt_update->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao atualizar os dados do setor: " . $stmt_update->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Setor</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <nav class="bg-blue-600 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-white text-2xl font-semibold">
                <a href="#">Minha Empresa</a>
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Editar Setor</h1>

        <form action="editar_setor.php?id=<?= $setor['id_setor'] ?>" method="POST" class="max-w-3xl mx-auto bg-white p-8 shadow-md rounded-md">
            <div class="mb-4">
                <label for="descricao" class="block text-sm font-medium text-gray-700">Descrição do Setor</label>
                <input type="text" name="descricao" id="descricao" value="<?= htmlspecialchars($setor['descricao']) ?>"
                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Salvar Alterações</button>
            </div>
        </form>
    </div>

</body>
</html>
