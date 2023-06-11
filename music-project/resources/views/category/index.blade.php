@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Category</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="" class="btn btn-success float-end">Add new category</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorys as $category)
                            <tr>
                                <td>{{ $category->ma_tloai }}</td>
                                <td>{{ $category->ten_tloai }}</td>
                                <td>
                                    <a href="" class="btn btn-outline-primary"><i class="bi bi-eye"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('category.edit' , $category->ma_tloai) }}" class="btn btn-outline-primary"><i class="bi bi-pencil-square"></i></a>
                                </td>
                                <form action="{{ route('category.destroy' ,  $category->ma_tloai) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <td>
                                        <button type="submit" class="btn btn-outline-primary"><i class="bi bi-trash3"></i></button>
                                    </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
