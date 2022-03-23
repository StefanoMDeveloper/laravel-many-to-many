@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crea post</h1>

    <form action="{{ route('admin.posts.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo del post">
        </div>
        <div class="form-group">
            <label for="content">Descrizione</label>
            <textarea class="form-control" id="content" name="content"
                placeholder="Inserisci la descrizione del prodotto"></textarea>
        </div>
        <div class="form-group">
            <label for="category_id">Categoria</label>
            <select name="category_id">
                <option value="">-----</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        @foreach ($tags as $elemento)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="tags[]" value="{{$elemento->id}}" id="{{$elemento->slug}}"
                {{ in_array($elemento->id, old('tags', [])) ? " checked" : ""}}>
                <label class="form-check-label" for="{{$elemento->slug}}">
                    {{$elemento->name}}
                </label>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Crea</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection