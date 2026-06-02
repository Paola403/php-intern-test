<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    </head>
<style>
@import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=DM+Mono:wght@400;500&display=swap');

:root {
  --bg:        #f4f5f7;
  --surface:   #ffffff;
  --border:    #e2e5ea;
  --primary:   #2563eb;
  --primary-h: #1d4ed8;
  --danger:    #dc2626;
  --danger-h:  #b91c1c;
  --success:   #16a34a;
  --success-h: #15803d;
  --text:      #111827;
  --muted:     #6b7280;
  --radius:    10px;
  --shadow:    0 1px 4px rgba(0,0,0,.08), 0 4px 16px rgba(0,0,0,.06);
  --trans:     .18s ease;
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

body {
  font-family: 'DM Sans', sans-serif;
  background: var(--bg);
  color: var(--text);
  min-height: 100vh;
  padding: 48px 24px;
}

.card {
  background: var(--surface);
  border: 1px solid var(--border);
  border-radius: var(--radius);
  box-shadow: var(--shadow);
  max-width: 900px;
  margin: 0 auto;
  padding: 40px 48px;
  animation: fadeUp .3s ease both;
}

@keyframes fadeUp {
  from { opacity: 0; transform: translateY(12px); }
  to   { opacity: 1; transform: translateY(0); }
}

h1 {
  font-size: 1.5rem;
  font-weight: 600;
  letter-spacing: -.02em;
  margin-bottom: 28px;
  padding-bottom: 16px;
  border-bottom: 1px solid var(--border);
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-size: .8rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .06em;
  color: var(--muted);
  margin-bottom: 6px;
}

input[type="text"],
input[type="number"],
select {
  width: 100%;
  max-width: 420px;
  padding: 10px 14px;
  font-family: 'DM Sans', sans-serif;
  font-size: .95rem;
  color: var(--text);
  background: var(--bg);
  border: 1.5px solid var(--border);
  border-radius: 8px;
  outline: none;
  transition: border-color var(--trans), box-shadow var(--trans), background var(--trans);
  appearance: none;
}

input:focus,
select:focus {
  border-color: var(--primary);
  background: #fff;
  box-shadow: 0 0 0 3px rgba(37,99,235,.12);
}

select {
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236b7280' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: right 12px center;
  padding-right: 36px;
}

button,
.btn {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 10px 22px;
  font-family: 'DM Sans', sans-serif;
  font-size: .9rem;
  font-weight: 500;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  text-decoration: none;
  transition: background var(--trans), transform var(--trans), box-shadow var(--trans);
}

button:active,
.btn:active {
  transform: scale(.97);
}

button[type="submit"].btn-success,
form:not(.form-inline) button[type="submit"] {
  background: var(--success);
  color: #fff;
}
form:not(.form-inline) button[type="submit"]:hover {
  background: var(--success-h);
  box-shadow: 0 2px 8px rgba(22,163,74,.3);
}

.btn-primary {
  background: var(--primary);
  color: #fff;
}
.btn-primary:hover {
  background: var(--primary-h);
  box-shadow: 0 2px 8px rgba(37,99,235,.3);
}

.btn-danger,
.form-inline button[type="submit"] {
  background: transparent;
  color: var(--danger);
  border: 1.5px solid var(--danger);
  padding: 6px 14px;
  font-size: .82rem;
}
.form-inline button[type="submit"]:hover {
  background: var(--danger);
  color: #fff;
}

.btn-new {
  background: var(--primary);
  color: #fff !important;
  padding: 10px 20px;
  border-radius: 8px;
  text-decoration: none;
  font-size: .9rem;
  font-weight: 500;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  transition: background var(--trans), box-shadow var(--trans), transform var(--trans);
  margin-bottom: 24px;
}
.btn-new:hover {
  background: var(--primary-h);
  box-shadow: 0 2px 8px rgba(37,99,235,.3);
  transform: translateY(-1px);
}
.btn-new:active { transform: scale(.97); }

.link-back {
  display: inline-block;
  margin-top: 20px;
  font-size: .88rem;
  color: var(--muted);
  text-decoration: none;
  border-bottom: 1px dashed var(--border);
  transition: color var(--trans);
}
.link-back:hover { color: var(--primary); border-bottom-color: var(--primary); }

.table-wrapper {
  overflow-x: auto;
  margin-top: 8px;
  border-radius: var(--radius);
  border: 1px solid var(--border);
}

table {
  width: 100%;
  border-collapse: collapse;
  font-size: .9rem;
}

thead tr {
  background: var(--bg);
}

th {
  padding: 12px 16px;
  font-size: .75rem;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: .06em;
  color: var(--muted);
  text-align: left;
  border-bottom: 1px solid var(--border);
}

td {
  padding: 13px 16px;
  border-bottom: 1px solid var(--border);
  vertical-align: middle;
}

tbody tr:last-child td { border-bottom: none; }

tbody tr {
  transition: background var(--trans);
}
tbody tr:hover { background: #f8f9fc; }

td:first-child {
  font-family: 'DM Mono', monospace;
  font-size: .82rem;
  color: var(--muted);
}

.td-value {
  font-family: 'DM Mono', monospace;
  font-weight: 500;
  color: var(--success);
}

.td-actions {
  display: flex;
  align-items: center;
  gap: 8px;
}

.btn-edit {
  padding: 6px 14px;
  font-size: .82rem;
  background: transparent;
  color: var(--primary);
  border: 1.5px solid var(--primary);
  border-radius: 8px;
  text-decoration: none;
  font-weight: 500;
  transition: background var(--trans), color var(--trans);
}
.btn-edit:hover { background: var(--primary); color: #fff; }

.form-inline {
  display: inline-flex;
}
</style>
<body>
 
    <div class="card">
        <h1>Editar: {{ $product->description }}</h1>
 
        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
 
            <div class="form-group">
                <label>Descrição</label>
                <input type="text" name="description" value="{{ $product->description }}" required>
            </div>
 
            <div class="form-group">
                <label>Quantidade</label>
                <input type="number" name="quantity" value="{{ $product->quantity }}" required>
            </div>
 
            <div class="form-group">
                <label>Valor (R$)</label>
                <input type="number" step="0.01" name="value" value="{{ $product->value }}" required>
            </div>
 
            <div class="form-group">
                <label>Tipo de Produto</label>
                <select name="product_type_id" required>
                    @foreach($types as $type)
                        <option value="{{ $type->id }}" {{ $product->product_type_id == $type->id ? 'selected' : '' }}>
                            {{ $type->name }}
                        </option>
                    @endforeach
                </select>
            </div>
 
            <button type="submit" class="btn-primary">Atualizar Produto</button>
        </form>
 
        <a href="{{ route('products.index') }}" class="link-back">← Cancelar e voltar</a>
    </div>
 
</body>
</html>