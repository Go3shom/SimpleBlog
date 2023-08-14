@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col">
                        <h1>{{ __('Posts') }}</h1>
                    </div>

                    @auth
                        <div class="col d-flex align-self-center justify-content-sm-end justify-content-md-center">
                            <a class="btn btn-primary" href="{{ route('posts.create') }}">
                                {{ __('New Post') }}
                            </a>
                        </div>
                    @endauth
                </div>

                <div class="row my-4">
                    @forelse ($posts as $post)
                        <div class="row">
                            <div class="mb-3 border-bottom" style="max-width: 640px;">
                                <div class="p-2">
                                    <h2>
                                        <a href="{{ route('posts.show', $post) }}">
                                            {{ $post->title }}
                                        </a>
                                    </h2>

                                    <div class="my-2">
                                        @if ($post->user->is_admin)
                                            {{ __('Written by: ') }}
                                            <span class="badge text-bg-primary">{{ $post->user->username }}</span>
                                            in
                                        @endif

                                        <a href="{{ route('categories.show', $post->category->id) }}">
                                            <span class="badge text-bg-secondary">
                                                {{ $post->category->name }}
                                            </span>
                                        </a>
                                    </div>

                                    <p>{{ Str::words($post->body, 15, '...') }}</p>
                                </div>


                                <div class="row px-2">
                                    <div class="col-9">
                                        <p>
                                            <small class="text-body-secondary">
                                                {{ __('Last updated ' . $post->updated_at->diffForHumans()) }}
                                            </small>
                                        </p>
                                    </div>

                                    @auth()
                                        <div class="col-3">
                                            @can('update', $post)
                                                <a class="btn btn-sm btn-outline-secondary"
                                                    href="{{ route('posts.edit', $post) }}">
                                                    {{ __('Edit') }}
                                                </a>
                                            @endcan


                                            @can('delete', $post)
                                                <a class="btn btn-sm btn-danger" href="#"
                                                    onclick="event.preventDefault(); if(confirm('Are you sure to delete?')) { document.getElementById('removePost-{{ $loop->iteration }}').submit();}">
                                                    {{ __('Delete') }}
                                                </a>

                                                <form id="removePost-{{ $loop->iteration }}"
                                                    action="{{ route('posts.destroy', $post) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            @endcan
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="lead">
                            {{ __('No posts yet.') }}
                        </p>
                    @endforelse
                </div>
            </div>






            {{-- //TODO Sidebar Component --}}
            {{-- <div class="col-md-4 my-4">
                <div class="position-sticky mt-5" style="top: 3rem;">
                    <div>
                        <h4 class="fst-italic">{{ __('Recent categories') }}</h4>
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($post->category as $category)
                            <a href="{{ route('categories.show', $category) }}"
                                class="list-group-item list-group-item-action
                                {{ $loop->first ? 'border-top' : '' }}">
                                {{ $post->category->name }}
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div> --}}

        </div>
    </div>
@endsection
