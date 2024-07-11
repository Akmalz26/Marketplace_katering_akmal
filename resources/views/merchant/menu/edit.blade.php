@extends('layout.app')

@section('content')
<div class="container">
    <h1>Edit Menu</h1>
    <form action="{{ route('merchant.menu.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Menu:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $menu->name }}" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $menu->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Harga:</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $menu->price }}" required>
        </div>
        <div class="form-group">
            <label for="image">Gambar:</label>
            <input type="file" class="form-control-file" id="image" name="image">
            @if($menu->image)
                <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" width="100">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Menu</button>
    </form>
</div>
@endsection
