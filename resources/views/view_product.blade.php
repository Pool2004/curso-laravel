@extends('./layout/layout')

@section('title', 'vER Producto Página')


@section('body')

    <form action="{{ route('find_product')}}" method="POST"
        style="width: 50%; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
        <h1>Ver Producto</h1>
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Id Producto: </label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="1" name="id"
                required>
        </div>
        

        <button type="submit" class="btn btn-primary">Buscar Producto</button>
    </form>

    @if(isset($producto))
        <div style="background-color: gray; width: 50%; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
            <h1>Información Producto</h1>
            <br>
            <h3>Nombre: {{$producto->nombre}}</h3>
            <h3>Descripcion: {{$producto->descripcion}}</h3>
            <h3>Precio: {{$producto->precio}}</h3>
            <h3>Cantidad: {{$producto->stock}}</h3>
        </div>
    

    @endif

@endsection