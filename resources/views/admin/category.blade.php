@extends ('admin.layout')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Создание категории</h1>
            <form action="{{ $action ?? URL::to('categories') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Заголовок</label>
                    <input type="text" class="form-control" name="title" required="">
                </div>
                <div class="form-group">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug" required="">
                </div>
                <button class="btn btn-default" type="submit">Отправить</button>
            </form>
        </div>
    </div>
</div>

@stop
