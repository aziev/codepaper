@extends ('admin.layout')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Пока только заготовка -->
            <h1>Все категории</h1>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>Заголовок</th>
                    <th>Редактировать</th>
                    <th>Удалить</th>
                </tr>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>
                            <a href='{{ URL::to("categories/$item->id/edit") }}'>
                                <i class="fa fa-pencil" aria-hidden="true"></i>Редактировать
                            </a>
                        </td>
                        <!-- <td>
                            <a href='{{ URL::to("categories/$item->id/edit") }}'>Удалить</a>
                        </td> -->
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@stop
