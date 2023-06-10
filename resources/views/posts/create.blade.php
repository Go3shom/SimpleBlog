@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8">
            <h1>{{ __('New Post') }}</h1>


            <a href="{{ route('posts.index') }}" class="btn btn-link">
                {{ __('Back') }}
            </a>

            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <form method="POST" action="{{ route('posts.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="postTitle" class="form-label">
                                {{ __('Title') }}
                            </label>

                            <input id="postTitle" name="title" type="text"
                                class="form-control @error('title') is-invalid @enderror"
                                placeholder="{{ __('Post Title') }}" value="{{ old('title') }}">

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
                                class="form-control @error('slug') is-invalid @enderror" placeholder="{{ __('Post Slug') }}"
                                value="{{ old('slug') }}">

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
                                class="form-control @error('body') is-invalid @enderror">{{ old('body') }}</textarea>

                            @error('body')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <select class="form-select @error('category_id')is-invalid @enderror" name="category_id"
                                aria-label="select category">
                                @forelse ($categories as $category)
                                    <option value="{{ $category->id ?? 1 }}" @selected(old('category_id') == $category->id)>
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

                        <button type="submit" class="btn btn-primary">
                            {{ __('Save') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
