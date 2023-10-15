@if ($paginator->hasPages())
<div class="pagination fwmpag">
    @if ($paginator->onFirstPage())
    @else
    <a href="{{$paginator->previousPageUrl()}}" class="prevposts-link page-item"><i class="fas fa-caret-right"></i><span>السابق</span></a>
    @endif
    @foreach ($elements as $element)
        @if (is_string($element))
            <a href="javascript:void(0)" class="page-item">{{ $element }}</a>
        @endif
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <a href="javascript:void(0)" class="page-item">{{ $page }}</a>
                @else
                    <a href="{{ $url }}" class="page-item">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach
    @if ($paginator->hasMorePages())
    <a href="{{$paginator->nextPageUrl()}}" class="nextposts-link page-item"><span>التالي</span><i class="fas fa-caret-left"></i></a>
    @endif
</div>	

@endif 