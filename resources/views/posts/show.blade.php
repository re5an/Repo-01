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
                                <button type="submit" class="btn btn-primary" id="submitBtn">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        {{-- Hidden input element to hold post_id--}}

                        <input type="hidden" id="post_id" name="post_id" value="{{ $post->id }}">


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


    <script>
        /*$(document).ready(function () {
            $('#submitBtn').on('click', function (e) {
                e.preventDefault();
                var name = ('#name').val();
                var body = ('#body').val();
                var post_id = ('#post_id').val();
                //FIXME have to pass postId also
                // var postId = ;
                if (name != "" && body != "")
                {
                    $.ajax({
                        // FIXME fix route
                        url: "{{ route("saveComment") }}",
                        type: "POST",
                        data:{
                            _token: $("#csrf").val(),
                            name: name,
                            body: body,
                            post_id: post_id
                        },
                        cache: false,
                        success: function (data) {
                            alert(data.success);
                            /!*console.log(data);
                            var data = JSON.parse(data);
                            if (data.statusCode == 200){
                                // FIXME fix route
                                winsow.location = "/";
                            }
                            else if(data.statusCode == 201){
                                alert("Error Ocured !!");
                            }*!/
                        }
                    });
                }
                else {
                    alert('Please fill all the fields');
                }
            });
        });*/
    </script>

    <script>
        /*$(document).ready(function (e) {
            $('#submitBtn').on('click', function () {
               $.ajaxSetup({
                   headers:{
                       'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                   }
               });

               e.preventDefault();

               var name = ('#name').val();



            });
        });*/
    </script>

@endsection