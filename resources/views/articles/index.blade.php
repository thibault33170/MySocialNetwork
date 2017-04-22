@extends('layouts.app')

@section('content')
    <div class="row">
        @forelse($articles as $article)
            <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12" >
                <div class="panel panel-default">
                    <div class="panel-heading" >
                        <span>{{ $article->owner }}</span>
                        <span class="pull-right">
                            {{ $article->created_at->diffForHumans() }}
                        </span>
                    </div>
                    <div class="panel-body">
                        {{ $article->shortContent }} ...
                        <a href="/articles/{{ $article->id }}">Read more</a>
                    </div>
                    <div class="panel-footer form-inline clearfix" style="background-color : white">
                        @if($article->user_id == Auth::id())
                            <trash :article="{{ $article->id }}"></trash>
                        @endif
                        <span class="pull-left"><a style="color: grey" href="/articles/{{ $article->id }}">{{ $article->commentsNumber }}</a></span>
                            <heart class="pull-right" :article="{{ $article->id }}"></heart>
                            <comment :article="{{ $article->id }}" :user="{{ Auth::id() }}"></comment>
                    </div>
                </div>
            </div>
        @empty
            No articles.
        @endforelse
    </div>
    <div class="row">
        <div class="col-lg-offset-5 col-md-offset-5 col-sm-offset-5 col-xs-offset-4">
            {{ $articles->links() }}
        </div>
    </div>

@endsection