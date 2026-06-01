<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <!-- Adicionei uma folha de estilo rápida para a tabela não ficar feia -->
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>CRUD de Produtos</h1>
    
    <!-- Link para a tela de cadastro que faremos a seguir -->
    <a href="{{ route('products.create') }}" style="padding: 10px; background: blue; color: white; text-decoration: none;">Cadastrar Novo Produto</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th>Valor</th>
                <th>Tipo de Produto</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <!-- Esse loop do Blade vai passar por cada produto vindo do banco -->
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->quantity }}</td>
                <td>R$ {{ number_format($product->value, 2, ',', '.') }}</td>
                <!-- Lembra do relacionamento? Buscamos o nome do tipo direto aqui: -->
                <td>{{ $product->type->name }}</td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}">Editar</a>
                    <!-- O botão de deletar precisa de um formulário por segurança no Laravel -->
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Deseja deletar?')">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
