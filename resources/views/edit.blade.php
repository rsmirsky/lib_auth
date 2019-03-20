@extends('app')

@section('content')

    <form role="form" action="{{ route('books.update',$author->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
         {{ method_field('PATCH') }}
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <label for="exampleFormControlInput1">Отредактируйте имя автора</label>
                    <input type="text" class="form-control" id="name" placeholder="Имя" name="name" value="{{ old('name', $author -> name) }}">
                </div>
                <div class="col-md-6" >
                    <h4 class="mb">Книги этого автора</h4>
                    <select multiple class="form-control" >
                        @foreach($author->books as $book)
                            <option>{{ $book->title }}</option>
                        @endforeach
                    </select>

                    <h4 class="mb">Выберите новую книгу для автора</h4>
                    <select multiple class="form-control" name="book_ids[]">
                        @foreach($freebooks as $book)
                                    <option value="{{$book->id}}">{{ $book->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('books.index')}}"  class="btn btn-sm btn-outline-secondary">На главную</a>
                </div>
            </div>
        </div>

    </form>
@endsection


