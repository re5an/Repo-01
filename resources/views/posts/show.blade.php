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

                <hr>

                <div>
                    <div>Enter Your Comment</div>

                    <form action="{{ route("saveComment", ['id'=>$post->id]) }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">You'r Name: </label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('body') }}</label>

                            <div class="col-md-6">
                                <textarea id="body" cols="50" rows="4" class="form-control @error('title') is-invalid @enderror" name="body">{{ old('body') }}</textarea>

                                @error('body')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>


                    </form>

                </div>

                <hr>

                <div>
                    <h2>Comments:</h2>

                    <ul>
                        @foreach($post->comments as $comment)
                            <li> {{ $comment->name }} : {{ $comment->body }}</li>
                        @endforeach
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection