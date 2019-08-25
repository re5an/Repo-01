@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div>
                    <h2> {{ $post->title }}</h2>
                </div>

                <div>
                    {{ $post->body }}
                </div>

                <div>

                </div>

            </div>
        </div>
    </div>
@endsection