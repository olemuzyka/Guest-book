@extends('layouts.app')


<div class="container">
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
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{url('/')}}" class="btn btn-info">Назад</a>
    </div>
</div>

