@extends('layouts.app')
<style>
    .profile-images{
        max-width: 80px;
        border: 4px solid #fff;
        border-radius: 100%;
        box-shadow: 0 2px 2px rgba(0,0,0,0.3);
        margin-bottom: 5px;
    }
</style>
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2" >
            <div class="panel panel-default">
                <div class="panel-heading" >
            	<span>
            		Article by {{ $article->owner }}
                    @if ($article->isOwnedByUser)
                        <a style="margin-left: 10px;" href="/articles/{{ $article->id }}/edit">
                            Edit
                        </a>
                    @endif
            	</span>
                <span class="pull-right">
                    {{ $article->created_at->DiffForHumans() }}
                 </span>
                </div>
                <div class="panel-body">
                    {{ $article->content }}
                </div>
            </div>
        </div>
    </div>

    <hr class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-8 col-xs-offset-2">
    <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
        @foreach($comments as $comment)
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <img class="profile-images" src="/uploads/avatars/{{ $comment->userAvatar }}" alt="error">
                </div>
                <div class="col-lg-9 col-md-9 col-md-offset-1 col-sm-9 col-xs-9 col-xs-offset-1" style="padding: 0">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="/profile/{{ $comment->ownerUsername  }}">{{ $comment->ownerName}}</a>
                        </div>
                        <div class="panel-body">
                            {{ $comment->content }}
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection