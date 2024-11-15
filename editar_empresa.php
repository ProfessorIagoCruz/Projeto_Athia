<?php
include_once 'config.php';
include_once 'crud.php';

if (isset($_GET['id'])) {
    $id_empresa = $_GET['id'];
    $sql = "SELECT * FROM empresa WHERE id_empresa = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_empresa);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $empresa = $result->fetch_assoc();
    } else {
        die("Empresa não encontrada!");
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $razao_social = $_POST['razao_social'];
    $nome_fantasia = $_POST['nome_fantasia'];
    $cnpj = $_POST['cnpj'];
    $sql_update = "UPDATE empresa SET razaosocial = ?, nome_fantasia = ?, cnpj = ? WHERE id_empresa = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("sssi", $razao_social, $nome_fantasia, $cnpj, $id_empresa);
    
    if ($stmt_update->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao atualizar os dados da empresa: " . $stmt_update->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Empresa</title>
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
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Editar Empresa</h1>
        <form action="editar_empresa.php?id=<?= $empresa['id_empresa'] ?>" method="POST" class="max-w-3xl mx-auto bg-white p-8 shadow-md rounded-md">
            <div class="mb-4">
                <label for="razao_social" class="block text-sm font-medium text-gray-700">Razão Social</label>
                <input type="text" name="razao_social" id="razao_social" value="<?= htmlspecialchars($empresa['razaosocial']) ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>
            <div class="mb-4">
                <label for="nome_fantasia" class="block text-sm font-medium text-gray-700">Nome Fantasia</label>
                <input type="text" name="nome_fantasia" id="nome_fantasia" value="<?= htmlspecialchars($empresa['nome_fantasia']) ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>
            <div class="mb-4">
                <label for="cnpj" class="block text-sm font-medium text-gray-700">CNPJ</label>
                <input type="text" name="cnpj" id="cnpj" value="<?= htmlspecialchars($empresa['cnpj']) ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" required>
            </div>
            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">Salvar Alterações</button>
            </div>
        </form>
    </div>

</body>
</html>
