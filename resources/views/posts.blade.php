@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="container">
            @include('errors')
        </div>
        <div class="container">
            <form action="{{url('post')}}" method="post" class="form-horizontal">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="name"> Имя: </label>
                    <input type="text" placeholder="Имя" name="name" id="name">
                </div>

                <div class="form-group">
                    <label for="name"> E-mail: </label>
                    <input type="email" placeholder="E-mail" name="email" id="email">
                </div>

                <div class="form-group">
                    <label for="post"> Сообщение: </label>
                    <textarea class="form-control" rows="5" placeholder="Сообщение" name="post" id="post"
                              cols="50"></textarea>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Добавить</button>
                </div>


            </form>
        </div>
        <div class="container">
            @if(count($posts)>0)
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-dark">
                            <thead>
                            <th>Пост</th>
                            <th>&nbsp;</th>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td class="table-text">
                                        <div>{{ $post->name }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $post->post }}</div>
                                    </td>
                                    <td class="table-text">
                                        <div>{{ $post->created_at }}</div>
                                    </td>
                                    <td>
                                        <form action="{{url('post', $post->id)}}" method="POST">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-danger">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </button>
                                        </form>
                                        <form action="{{url('edit', $post->id)}}" method="POST">
                                            {{csrf_field()}}
                                            <button class="btn btn-info">
                                                <i class="glyphicon glyphicon-pencil"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="text-center">
                    {!! $posts->render() !!}
                </div>
            @endif
        </div>
    </div>


@endsection