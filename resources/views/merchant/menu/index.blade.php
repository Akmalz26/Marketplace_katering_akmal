@extends('layout.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Manage Menu') }}</div>
            <div class="card-body">
                <a href="{{ route('merchant.menu.create') }}" class="btn btn-primary mb-3">Add New Menu</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $menu)
                            <tr>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->description }}</td>
                                <td>{{ $menu->price }}</td>
                                <td>
                                    @if($menu->image)
                                        <img src="{{ asset('storage/' . $menu->image) }}" alt="{{ $menu->name }}" width="100">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('merchant.menu.edit', $menu->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('merchant.menu.destroy', $menu->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
