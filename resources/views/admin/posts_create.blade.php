@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ $post->id ? 'Editar Post' : 'Nuevo Post' }}
        </div>
        <div class="card-body">
            <form class="form-horizontal" method="POST" action="{{ $post->id == null ? route('posts.store') : route('posts.update', ['post' => $post]) }}" enctype="multipart/form-data">
                @csrf
                @isset($post->id)
                    @method('PATCH')
                    <input type="hidden" name="id" value="{{ $post->id }}">
                @endisset

                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Título:</label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ old('title') ?: $post->title }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Slug:</label>
                            <input class="form-control @error('slug') is-invalid @enderror" type="text" name="slug" value="{{ old('slug') ?: $post->slug }}">
                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="control-label" for="content_id">Descripción:</label>
                            <textarea rows="6" id="content_id" name="content" class="form-control @error('content') is-invalid @enderror">{{ old('description') ?: $post->content }}</textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer text-right mt-3">
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-primary mr-3">Regresar</a>
                    <input type="submit" class="btn btn-primary" value="{{ $post->id ? 'Actualizar' : 'Guardar'}}" />
                </div>
            </form>
        </div>
    </div>

@endsection