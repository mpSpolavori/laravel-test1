@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="data:image/png;base64,{{ $post->image64 }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
            
                <div class="d-flex align-items-center">
                        <div class="pr-3">
                            <a href="/profile/{{ $post->user->id }}">
                                <img src="{{ $post->user->profile->profileImage() }}"
                                    class="w-100 rounded-circle"
                                    style="max-width: 45px;"
                                    alt="">
                            </a>
                        </div>

                        <div>
                            <a href="/profile/{{ $post->user->id }}" class="font-weight-bold text-dark">
                                {{ $post->user->username}}
                            </a>
                        </div>
                </div>

                <hr>

                <p>
                    <span class="font-weight-bold text-dark">{{ $post->user->username}}</span>
                    {{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
