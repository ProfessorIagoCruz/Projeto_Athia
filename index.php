<?php
include_once 'crud.php';
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$empresas = listarEmpresas($filter);
$setores = listarSetores($filter);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Empresa e Setor</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <nav class="bg-blue-600 p-4">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-white text-2xl font-semibold">
                <a href="#">Minha Empresa</a>
            </div>
            <div class="flex space-x-4 items-center">
                <form method="GET" class="flex items-center space-x-2">
                    <input type="text" name="filter" value="<?= htmlspecialchars($filter) ?>" class="p-2 rounded-md border border-gray-300" placeholder="Filtrar por nome..." />
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Pesquisar</button>
                </form>
                <div class="space-x-2">
                    <a href="adicionar_empresa.php" class=" text-white px-4 py-2 rounded-md hover:bg-yellow-600">Adicionar Empresa</a>
                    <a href="adicionar_setor.php" class=" text-white px-4 py-2 rounded-md hover:bg-yellow-600">Adicionar Setor</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Empresas</h1>
        <div class="overflow-x-auto bg-white shadow-md rounded-lg mb-8">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Razão Social</th>
                        <th class="px-4 py-2">Nome Fantasia</th>
                        <th class="px-4 py-2">CNPJ</th>
                        <th class="px-4 py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($empresas as $empresa): ?>
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2"><?= $empresa['id_empresa'] ?></td>
                            <td class="px-4 py-2"><?= $empresa['razaosocial'] ?></td>
                            <td class="px-4 py-2"><?= $empresa['nome_fantasia'] ?></td>
                            <td class="px-4 py-2"><?= $empresa['cnpj'] ?></td>
                            <td class="px-4 py-2">
                                <a href="editar_empresa.php?id=<?= $empresa['id_empresa'] ?>" class="text-blue-500 hover:text-blue-700">Editar</a> |
                                <a href="excluir_empresa.php?id=<?= $empresa['id_empresa'] ?>" class="text-red-500 hover:text-red-700">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <h1 class="text-3xl font-bold text-center text-gray-800 mt-8 mb-6">Setores</h1>
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Descrição</th>
                        <th class="px-4 py-2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($setores as $setor): ?>
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2"><?= $setor['id_setor'] ?></td>
                            <td class="px-4 py-2"><?= $setor['descricao'] ?></td>
                            <td class="px-4 py-2">
                                <a href="editar_setor.php?id=<?= $setor['id_setor'] ?>" class="text-blue-500 hover:text-blue-700">Editar</a> |
                                <a href="excluir_setor.php?id=<?= $setor['id_setor'] ?>" class="text-red-500 hover:text-red-700">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
