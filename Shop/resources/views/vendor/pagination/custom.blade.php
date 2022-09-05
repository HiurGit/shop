@if ($paginator->hasPages())
<div class="biolife-panigations-block">
    <ul class="panigation-contain">

        @if ($paginator->onFirstPage())
        <li class="link-page next"><i class="fa fa-angle-left" aria-hidden="true"></i></li>


        @else
        <li><a href="{{ $paginator->previousPageUrl() }}" class="link-page next"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>


        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="link-page">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

        @else
            <li class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></li>
        @endif
    </ul>
</div>
@endif
