@extends ('admin.layout')

@section ('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Создание статьи</h1>
            <form action="{{ $action ?? URL::to('article') }}" method="post" enctype="multipart/form-data" class="article-form">
                {{ csrf_field() }}
                @if (isset($article))
                    {{ method_field('PUT') }}
                @endif
                <div class="form-group">
                    <label for="">Заголовок</label>
                    <input type="text" class="form-control" name="title" required="" value="{{ $article->title ?? '' }}">
                </div>
                @if (isset($article))
                    <img src="{{ $article->picture->path }}" width="300" alt="">
                @endif
                <div class="form-group">
                    <label for="">Изображение</label>
                    <input type="file" name="image" {{ isset($article) ? '' : 'required' }}>
                    <p class="help-block">Рекомендуемая ширина: >700px</p>
                </div>
                <div class="form-group">
                    <label for="">Текст</label>
                    <textarea class="form-control" name="text" id="editor1" required="">{{ $article->text ?? '' }}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Ссылка на оригинал</label>
                    <input type="text" class="form-control" name="original_url" value="{{ $article->original_url ?? '' }}">
                </div>
                <div class="form-group">
                    @foreach (App\Tag::all() as $tag)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ isset($article) && $article->tags->contains($tag) ? 'checked' : '' }}>
                                <span>{{ $tag->title }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="">Категория</label>
                    <select class="form-control" name="category_id" required="">
                        @foreach (App\Category::all() as $category)
                            <option value="{{ $category->id }}" {{ isset($article) && $article->category_id == $category->id ? 'selected' : '' }}>{{ $category->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="hidden" name="published" value="0">
                            <input type="checkbox" name="published" value="1"
                            {{ isset($article) && $article->published == true ? 'checked' : '' }}>
                            <span>Опубликовать</span>
                        </label>
                    </div>
                </div>
                <button class="btn btn-default" type="submit">Отправить</button>
            </form>
        </div>
    </div>
</div>

@stop
