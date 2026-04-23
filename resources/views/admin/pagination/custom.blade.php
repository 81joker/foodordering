@if ($paginator->hasPages())
    <div class="blog-pagination mb-30">
        <div class="btn-toolbar justify-content-center mb-15">
            <div class="btn-group">
                
                {{-- Lien "Précédent" --}}
                @if ($paginator->onFirstPage())
                    {{-- Désactivé si on est sur la première page --}}
                    <a class="btn btn-outline-primary prev disabled" aria-disabled="true" href="#">
                        <i class="fa fa-angle-left"></i> </a>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-outline-primary prev" rel="prev">
                        <i class="fa fa-angle-left"></i> </a>
                @endif

                {{-- Éléments de pagination (Numéros) --}}
                @foreach ($elements as $element)
                    
                    {{-- "Three Dots" Separator (...) --}}
                    @if (is_string($element))
                        <span class="btn btn-outline-primary disabled">{{ $element }}</span>
                    @endif

                    {{-- Tableau des liens --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                {{-- Page active (Span avec classe 'current') --}}
                                <span class="btn btn-primary current">{{ $page }}</span>
                            @else
                                {{-- Autres pages (Liens normaux) --}}
                                <a href="{{ $url }}" class="btn btn-outline-primary">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Lien "Suivant" --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-outline-primary next" rel="next">
                        <i class="fa fa-angle-right"></i> </a>
                @else
                    {{-- Désactivé si on est sur la dernière page --}}
                    <a class="btn btn-outline-primary next disabled" aria-disabled="true" href="#">
                        <i class="fa fa-angle-right"></i> </a>
                @endif

            </div>
        </div>
    </div>
@endif