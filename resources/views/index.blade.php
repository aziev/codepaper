@extends ('layout')

@section ('content')

<div class="container">
    <div class="col-xs-12 col-md-8 col-md-offset-2">
        <div class="row">
            <article class="article">
                <a href="{{ URL::to('article/1') }}">
                    <img src="http://placehold.it/500x300/ffd640" alt="">
                </a>
                <h2>Разработка на Laravel с нуля</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio non quam blanditiis, modi commodi excepturi impedit laudantium consequatur tempora dolorem obcaecati quasi, sunt dolorum magni nisi possimus fuga! Non, dolores!</p>
                <div class="info">
                    <span class="date">29.11.2016</span>
                    <span class="views">
                        <i class="fa fa-eye" aria-hidden="true"></i>13
                    </span>
                    <span class="comments">
                        <i class="fa fa-comments-o" aria-hidden="true"></i>20
                    </span>
                </div>
            </article>
            <article class="article">
                <img src="http://placehold.it/500x300/09b5df" alt="">
                <h2>Разработка на Laravel с нуля</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio non quam blanditiis, modi commodi excepturi impedit laudantium consequatur tempora dolorem obcaecati quasi, sunt dolorum magni nisi possimus fuga! Non, dolores!</p>
                <div class="info">
                    <span class="date">13.11.2016</span>
                    <span class="views">
                        <i class="fa fa-eye" aria-hidden="true"></i>29
                    </span>
                    <span class="comments">
                        <i class="fa fa-comments-o" aria-hidden="true"></i>30
                    </span>
                </div>
            </article>
        </div>
    </div>
</div>

@stop
