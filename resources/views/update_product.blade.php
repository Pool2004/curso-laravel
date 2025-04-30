@extends('./layout/layout')

@section('title', 'Actualizar Producto Página')


@section('body')

    <form action="{{ route('updateProduct')}}" method="POST"
        style="width: 50%; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
        <h1>Actualizar Producto</h1>
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Id Producto: </label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="1" name="id"
                required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Nombre Producto: </label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Producto..." name="nombre"
                required max="255">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Descripción Producto: </label>
            <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Producto de color x..."
                name="descripcion" required max="1000">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Precio Producto: </label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="$145000" min="0" step="1000"
                name="precio" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Cantidad Producto: </label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="50" min="0" step="1"
                name="stock" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    </form>

@endsection