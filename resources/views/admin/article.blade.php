@extends ('admin.layout')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Создание статьи</h1>
            <form action="{{ URL::to('article') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="">Заголовок</label>
                    <input type="text" class="form-control" name="title" required="">
                </div>
                <div class="form-group">
                    <label for="">Изображение</label>
                    <input type="file" name="image" required="">
                    <p class="help-block">Рекомендуемая ширина: >700px</p>
                </div>
                <div class="form-group">
                    <label for="">Текст</label>
                    <textarea class="form-control" name="text" required=""></textarea>
                </div>
                <div class="form-group">
                    <label for="">Ссылка на оригинал</label>
                    <input type="text" class="form-control" name="original_url">
                </div>
                <div class="form-group">
                    <label for="">Категория</label>
                    <select class="form-control" name="category_id" required="">
                        @foreach (App\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-default" type="submit">Отправить</button>
            </form>
        </div>
    </div>
</div>

@stop
