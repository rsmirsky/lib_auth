@extends('app')

@section('content')
    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                @foreach($authors as $author)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="https://cdn3.iconfinder.com/data/icons/education-and-school-8/48/Book-256.png"
                                 alt="">
                           <p>Автор: {{ $author->name }}</p>

                            @foreach($author -> books as $book)
                                <p>Книга: {{ $book -> title }} </p>
                            @endforeach
                            <div class="card-body">
                                <p class="card-text">{{--{{ $post -> title }}--}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <form action="{{ route('books.destroy', $author->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Удалить</button>
                                        </form>
                                        <a href="{{ route('books.edit', $author->id )}}"  class="btn btn-sm btn-outline-secondary">Редактировать</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

