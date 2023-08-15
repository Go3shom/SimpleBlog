@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row my-3">
                    <div class="col">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                            {{ __('Back') }}
                        </a>
                    </div>
                    @auth
                        <div class="col">
                            <div class="d-flex justify-content-end">
                                <div class="px-0">
                                    <a class="btn btn-link" href="{{ route('posts.edit', $post) }}">
                                        {{ __('Edit') }}
                                    </a>
                                    <a class="btn btn-danger" href="#"
                                        onclick="event.preventDefault(); if(confirm('Are you sure to delete?')) { document.getElementById('removepost').submit(); }">
                                        {{ __('Delete') }}
                                    </a>
                                    <form id="removepost" action="{{ route('posts.destroy', $post) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>

                    @endauth
                </div>

                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <h1>
                                {{ $post->title }}
                            </h1>
                            <div class="my-2">
                                <a href="{{ route('categories.show', $post->category->id) }}">
                                    <span class="badge text-bg-secondary">
                                        {{ $post->category->name }}
                                    </span>
                                </a>
                            </div>

                        </div>

                        <div class="my-2">
                            <small class="text-body-secondary">
                                @if ($post->updated_at != null)
                                    {{ __('Last updated ' . $post->updated_at->diffForHumans()) }}
                                @endif
                            </small>
                        </div>

                        <p>{{ $post->body }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
