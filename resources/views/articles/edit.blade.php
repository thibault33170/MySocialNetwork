@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3" >
            <div class="panel panel-default">
                <div class="panel-heading" >
                    Edit article
                </div>
                <div class="panel-body">
                    <form action="/articles/{{ $article->id }}" method="POST">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control">{{ $article->content }}</textarea>
                        </div>
                        @if ($errors->count() > 0)
                            <div class="help-block alert alert-danger">
                                {{ $errors->first('content') }}
                            </div>
                        @endif
                        <input type="submit" class="btn btn-success pull-right">    
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection