@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="mb-3">
                        <a href="{{ route('categories.index') }}" class="btn btn-link">
                            {{ __('Back') }}
                        </a>
                    </div>
                </div>

                <div class="mb-3" style="max-width: 640px;">
                    <div class="d-flex">
                        <div class="p-2 flex-grow-1">
                            <h1>
                                {{ $category->name }}
                            </h1>

                            <p>
                                {{ $category->slug }}
                            </p>

                            <p>
                                <small class="text-body-secondary">
                                    {{-- //FIXME
                                         Call to a member function diffForHumans() on null
                                    --}}
                                    @if ($category->updated_at != null)
                                        {{ __('Last updated ' . $category->updated_at->diffForHumans()) }}
                                    @endif
                                </small>
                            </p>
                        </div>


                        <div class="p-2 mt-auto">
                            {{-- //BUG --}}
                            {{-- @auth
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('categories.edit', $category) }}">
                                    {{ __('Edit') }}
                                </a>


                                <a class="btn btn-sm btn-danger" href="#"
                                    onclick="event.preventDefault();if(confirm('Are you sure to delete?')) {document.getElementById('removeCategory').submit();}">
                                    {{ __('Delete') }}
                                </a>

                                <form id="removeCategory" action="{{ route('categories.destroy', $category) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            @endauth --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
