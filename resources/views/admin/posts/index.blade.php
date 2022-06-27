@extends('admin.layouts.layout')

@section('title') Статьи @endsection

@section('content')
    <!-- Content Header (Page header) -->
    @include('admin.layouts.page-header')

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Список статей</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            @isset($posts)
                <div class="card-body">
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3"> Добавить статью</a>
{{--                    @if($categories->count())--}}
                    @if(count($posts))
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-wrap">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Наименование</th>
                                    <th>Категория</th>
                                    <th>Теги</th>
                                    <th>Дата</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->category->title }}</td>
                                            <td>{{ $post->tags }}</td>
                                            <td>{{ $post->created_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}" class="btn btn-info btn-sm float-left mr-1">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post" class="float-left">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Подтвердите удаление')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>Статей нет...</p>
                    @endif
                </div>

                <div class="card-footer clearfix">
                    {{ $posts->links('vendor.pagination.my-pagination') }}
                </div>
            @endisset
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection
