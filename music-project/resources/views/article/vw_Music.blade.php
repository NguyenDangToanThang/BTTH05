@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Article</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="" class="btn btn-success float-end">Add new article</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $article->ma_bviet }}</td>
                                <td>{{ $article->ten_tloai }}</td>
                                <td>{{ $article->ten_tgia }}</td>
                                <td>
                                    <a href="" class="btn btn-outline-primary"><i class="bi bi-eye"></i></a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-outline-primary"><i class="bi bi-trash3"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
