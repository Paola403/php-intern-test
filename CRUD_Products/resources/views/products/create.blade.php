<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 50px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select { width: 300px; padding: 8px; }
        button { padding: 10px 20px; background: green; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

    <h1>Cadastrar Novo Produto</h1>

    <!-- O action aponta para a rota 'store' que programamos no Controller -->
    <form action="{{ route('products.store') }}" method="POST">
        <!-- @csrf é obrigatório no Laravel para o formulário funcionar com segurança -->
        @csrf 

        <div class="form-group">
            <label>Descrição:</label>
            <input type="text" name="description" required>
        </div>

        <div class="form-group">
            <label>Quantidade:</label>
            <input type="number" name="quantity" required>
        </div>

        <div class="form-group">
            <label>Valor (R$):</label>
            <input type="number" step="0.01" name="value" required>
        </div>

        <div class="form-group">
            <label>Tipo de Produto:</label>
            <select name="product_type_id" required>
                <option value="">Selecione um tipo...</option>
                <!-- Esse loop busca os tipos (Food, Clothing...) que criamos no Seeder -->
                @foreach($productTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Salvar Produto</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">Voltar para a listagem</a>

</body>
</html>
