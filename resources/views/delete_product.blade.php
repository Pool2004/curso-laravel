@extends('./layout/layout')

@section('title', 'Borrar Producto Página')


@section('body')

    <form action="{{ route('deleteProduct')}}" method="POST"
        style="width: 50%; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px;">
        <h1>Eliminar Producto</h1>
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Id Producto: </label>
            <input type="number" class="form-control" id="exampleInputPassword1" placeholder="1" name="id"
                required>
        </div>
        

        <button type="submit" class="btn btn-primary">Borrar Producto</button>
    </form>

@endsection