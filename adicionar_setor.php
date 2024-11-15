<?php
include_once 'crud.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descricao = $_POST['descricao'];

    if (criarSetor($descricao)) {
        header('Location: index.php');
    } else {
        echo "Erro ao adicionar o setor.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Setor</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Adicionar Setor</h1>
        <form method="POST" class="bg-white shadow-md rounded-lg p-6 space-y-4">
            <div>
                <label for="descricao" class="block text-gray-700">Descrição</label>
                <input type="text" name="descricao" id="descricao" class="mt-2 p-3 w-full border border-gray-300 rounded-lg" required>
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-green-500 text-white py-2 px-6 rounded-lg hover:bg-green-600">Adicionar Setor</button>
            </div>
        </form>
        <div class="text-center mt-4">
            <a href="index.php" class="text-blue-500 hover:text-blue-700">Voltar para a página inicial</a>
        </div>

    </div>

</body>
</html>
