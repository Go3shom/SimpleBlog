@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col">
                        <h1>{{ __('Categories') }}</h1>
                    </div>

                    @auth
                        <div class="col d-flex align-self-center justify-content-sm-end justify-content-md-center">
                            <a class="btn btn-primary" href="{{ route('categories.create') }}">
                                {{ __('New Category') }}
                            </a>
                        </div>
                    @endauth
                </div>

                <div class="row my-4">
                    @forelse ($categories as $category)
                        <div class="row">
                            <div class="mb-3 border-bottom" style="max-width: 640px;">
                                <div class="d-flex">

                                    <div class="p-2">
                                        <h5>
                                            <a href="{{ route('categories.show', $category) }}">
                                                {{ $category->name }}
                                            </a>
                                        </h5>

                                        <p>{{ $category->slug }}</p>
                                    </div>
                                </div>


                                <div class="row px-2">
                                    <div class="col-9 mb-3">
                                        {{ __('Last updated ' . $category->updated_at->diffForHumans()) }}
                                    </div>


                                    @auth
                                        <div class="col-3">
                                            @can('update', $category)
                                                <a class="btn btn-sm btn-outline-secondary"
                                                    href="{{ route('categories.edit', $category) }}">
                                                    {{ __('Edit') }}
                                                </a>
                                            @endcan

                                            @can('delete', $category)
                                                <a class="btn btn-sm btn-danger" href="#"
                                                    onclick="event.preventDefault();if(confirm('Are you sure to delete?')) { document.getElementById('removeCategory-{{ $loop->iteration }}').submit();}">
                                                    {{ __('Delete') }}
                                                </a>

                                                <form id="removeCategory-{{ $loop->iteration }}"
                                                    action="{{ route('categories.destroy', $category) }}" method="POST">
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
                        <p>{{ __('No categories yet.') }}</p>
                    @endforelse
                </div>
            </div>

            {{-- // TODO --}}
            <div class="col-md-4 my-4">
                <div class="position-sticky mt-5" style="top: 3rem;">
                    <div class="mt-5">
                        <h4 class="fst-italic">
                            {{ __('Recent categories') }}
                        </h4>

                        <ul class="list-group list-group-flush">
                            @foreach ($categories as $category)
                                <a href="{{ route('categories.show', $category) }}"
                                    class="list-group-item list-group-item-action {{ $loop->first ? 'border-top' : '' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </ul>
                    </div>

                    <div class="mt-5">
                        <h4 class="fst-italic">
                            {{ __('Popular categories') }}
                        </h4>

                        <ul class="list-group list-group-flush">
                            @foreach ($categories as $category)
                                <a href="{{ route('categories.show', $category) }}"
                                    class="list-group-item list-group-item-action
                                {{ $loop->first ? 'border-top' : '' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
