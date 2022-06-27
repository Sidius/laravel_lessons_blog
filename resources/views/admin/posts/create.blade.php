@extends('admin.layouts.layout')

@section('title') {{ $title ?? null }} @endsection

@section('content')
    <!-- Content Header (Page header) -->
    @include('admin.layouts.page-header')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{ $title ?? null }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror"
                                           id="title" placeholder="Название">
                                </div>

                                <div class="form-group">
                                    <label for="description">Цитата</label>
                                    <textarea id="description" name="description" class="form-control" rows="3" placeholder="Цитата ..."></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="content">Контент</label>
                                    <textarea id="content" name="content" class="form-control" rows="7" placeholder="Цитата ..."></textarea>
                                </div>

                                @isset($categories)
                                    <div class="form-group">
                                        <label for="category_id">Категория</label>
                                        <select id="category_id" name="category_id" class="form-control">
                                            <option>Выбор категории</option>
                                            @foreach($categories as $k => $v)
                                                <option value="{{ $k }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endisset

                                @isset($tags)
                                    <div class="form-group">
                                        <label for="tags">Теги</label>
                                        <select id="tags" name="tags[]" class="select2" multiple="multiple" data-placeholder="Выбор тегов" style="width: 100%;">
                                            @foreach($tags as $k => $v)
                                                <option value="{{ $k }}">{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endisset

                                <div class="form-group">
                                    <label for="thumbnail">Изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                                            <label class="custom-file-label" for="thumbnail">Выбрать файл</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
