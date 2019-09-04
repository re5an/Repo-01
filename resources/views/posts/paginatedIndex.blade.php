@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div>
                    <h2> List of all posts </h2>
                </div>

                <div>
                    @foreach($posts as $post)
                        <li> <a href="{{ route("showPost", ['id'=>$post->id]) }}"> {{ $post->title }} </a> <small> By </small>  {{ $post->user->name }}</li>
                    @endforeach
                </div>

                {{ $posts->links() }}




            </div>
        </div>
    </div>
@endsection