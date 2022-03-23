@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('admin.posts.create') }}"><button type="button" class="btn btn-success">aggiungi</button></a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Slug</th>
                <th scope="col">Category</th>
                <th scope="col">Tags</th>
                <th scope="col">Buttons</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->title }}</th>
                    <td>{{ $post->content }}</th>
                    <td>{{ $post->slug }}</th>
                    <td>{{ $post->category ? $post->category->name : 'No category'}}</td>
                    <td>
                        @foreach ($post->tags as $tag)
                            {{ $tag->name }}
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('admin.posts.show', $post->id) }}"><button type="button"
                                class="btn btn-primary">vedi</button></a>
                        <a href="{{ route('admin.posts.edit', $post->id) }}"><button type="button"
                                class="btn btn-warning">edit</button></a>
                        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger">delete</button>
                        </form>
                        </th>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection