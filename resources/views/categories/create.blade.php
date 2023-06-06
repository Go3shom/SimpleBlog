@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8">
            <h1>{{ __('New Category') }}</h1>


            <a href="{{ route('categories.index') }}" class="btn btn-link">
                {{ __('Back') }}
            </a>

            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="categoryName" class="form-label">
                                {{ __('Name') }}
                            </label>

                            <input id="categoryName" name="name" type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="{{ __('Category Name') }}" value="{{ old('name') }}">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="categorySlug" class="form-label">
                                {{ __('Slug') }}
                            </label>

                            <input id="categorySlug" name="slug" type="text"
                                class="form-control @error('slug') is-invalid @enderror"
                                placeholder="{{ __('Category Slug') }}" value="{{ old('slug') }}">

                            @error('slug')
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
