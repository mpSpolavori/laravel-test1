@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <div class="row p-2">
            <div class="col-8">
                <img src="/storage/{{ $post->image }}" class="w-100">
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

                                <a href="#" class="pl-3">Follow</a>
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
    @endforeach

    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
