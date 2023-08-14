{{-- // TODO --}}
<div class="col-md-4 my-4">
    <div class="position-sticky mt-5" style="top: 3rem;">
        <div>
            <h4 class="fst-italic">{{ __('Recent categories') }}</h4>
        </div>
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
