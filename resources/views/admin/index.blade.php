@extends('admin.layouts.layout')

@section('content')

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Главная</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Статистика по опубликованным статьям</h3>

                </div>


                <!-- /.card-header -->
                <div class="card-body">

                    @if (count($posts))
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-nowrap">
                                <thead>
                                <tr>

                                    <th>Количество статей</th>
                                    <th>Количество категорий</th>
                                    <th>Количество тегов</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>{{ count($posts) }}</td>
                                        <td>{{ count($categories) }}</td>
                                        <td>{{ count($tags)}}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>Статистики по статьям пока нет...</p>
                    @endif
                </div>
                <!-- /.card-body -->


                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->

@endsection
