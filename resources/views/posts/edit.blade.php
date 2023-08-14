@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ __($post->title . ' Edit') }}</h1>

                <div class="row">
                    <div class="col-sm-12 col-md-8">
                        <form method="POST" action="{{ route('posts.update', $post) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="postTitle" class="form-label">
                                    {{ __('Title') }}
                                </label>

                                <input id="postTitle" name="title" type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="{{ __('Post Title') }}" value="{{ $post->title }}">

                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="postSlug" class="form-label">
                                    {{ __('Slug') }}
                                </label>

                                <input id="postSlug" name="slug" type="text"
                                    class="form-control @error('slug') is-invalid @enderror"
                                    placeholder="{{ __('Post Slug') }}" value="{{ $post->slug }}">

                                @error('slug')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="postBody" class="form-label">
                                    {{ __('Body') }}
                                </label>

                                <textarea id="postBody" name="body" rows="3" placeholder="{{ __('Post body') }}"
                                    class="form-control @error('body') is-invalid @enderror">{{ $post->body }}</textarea>

                                @error('body')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <select class="form-select @error('category_id') is-invalid @enderror" name="category_id"
                                    aria-label="select category">

                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}" @selected($post->category_id == $category->id)>
                                            {{ $category->name }}
                                        </option>
                                    @empty
                                        <a href="{{ route('categories.create') }}" class="btn btn-primary">
                                            {{ __('New Category') }}
                                        </a>
                                    @endforelse
                                </select>

                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">
                                    {{ __('Back') }}
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
