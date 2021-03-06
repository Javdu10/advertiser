@extends('layouts.app')

@section('content')
    <div class="advertList">
        
    @if ( $ads->isNotEmpty() )
        @foreach ($ads as $ad)
            <div class="advertList__item">
                <div class="advertList__itemImage">
                    <img src="{{ asset($ad->img_path) }}" alt="advert-img">
                </div>
                <div class="advertList__itemInfo">
                    <h2>{{ $ad->title }}</h2> 
                    <div class="advertList__itemInfoPrice">{{ $ad->price }} $</div>
                    <span>{{ $ad->created_at->diffForHumans() }}</span>
                </div>
                <a href="{{ route('advertisement.show', $ad->id) }}"></a>
            </div>
        @endforeach
    </div>
    <div class="pagination">
        <div class="paginationPages">
            <a href="{{ $ads->previousPageUrl() }}">
                @lang('pagination.previous')
            </a>
            <span>
                @lang('pagination.paging', ['from' => $ads->currentPage(), 'to' => $ads->lastPage()])
            </span>
            <a href="{{ $ads->nextPageUrl() }}">
                @lang('pagination.next')
            </a>
        </div>
    </div>

    @else
        <div class="content__noResult">
            @lang('content.home_noResults')
        </div>
    @endif
        
@endsection
