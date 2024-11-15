<?php
include_once 'crud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $razaosocial = $_POST['razaosocial'];
    $nome_fantasia = $_POST['nome_fantasia'];
    $cnpj = $_POST['cnpj'];
    if (criarEmpresa($razaosocial, $nome_fantasia, $cnpj)) {
        header('Location: index.php');
        echo "Erro ao adicionar a empresa.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Empresa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Adicionar Empresa</h1>
        <form method="POST" class="bg-white shadow-md rounded-lg p-6 space-y-4">
            <div>
                <label for="razaosocial" class="block text-gray-700">Razão Social</label>
                <input type="text" name="razaosocial" id="razaosocial" class="mt-2 p-3 w-full border border-gray-300 rounded-lg" required>
            </div>
            <div>
                <label for="nome_fantasia" class="block text-gray-700">Nome Fantasia</label>
                <input type="text" name="nome_fantasia" id="nome_fantasia" class="mt-2 p-3 w-full border border-gray-300 rounded-lg" required>
            </div>
            <div>
                <label for="cnpj" class="block text-gray-700">CNPJ</label>
                <input type="text" name="cnpj" id="cnpj" class="mt-2 p-3 w-full border border-gray-300 rounded-lg" required>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-lg hover:bg-blue-600">Adicionar Empresa</button>
            </div>
        </form>
        <div class="text-center mt-4">
            <a href="index.php" class="text-blue-500 hover:text-blue-700">Voltar para a página inicial</a>
        </div>

    </div>

</body>
</html>
