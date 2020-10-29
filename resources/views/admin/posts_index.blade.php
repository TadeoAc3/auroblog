@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            Posts
        </div>
        <div class="card-body">
            <a href="{{ route('posts.create') }}" class="btn btn-primary float-right mb-3">Nuevo</a>
            
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Fecha Creación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>
                                <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-light btn-sm"> 
                                    <i class="far fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST" class="btn btn-light btn-sm mr-2"> 
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-outline-danger btn-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    
@endsection