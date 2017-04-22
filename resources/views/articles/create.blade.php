@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3" >
            <div class="panel panel-default">
                <div class="panel-heading" >
                Create article
                </div>
                <div class="panel-body">
                    <form action="/articles" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                        <input type="submit" class="btn btn-success center-block">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection