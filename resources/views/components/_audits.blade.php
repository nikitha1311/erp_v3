<ul class="audit">
    @forelse ($audits as  $audit)
    <div id="accordion">
        <div class="panel">
        <div class="panel-header" id="{{ $loop->index }}">
            <h5 class="mb-0">
            <button class="btn btn-link" data-toggle="collapse" data-target="#a{{ $loop->index }}" aria-expanded="true" aria-controls="">
                    @lang('article.updated.metadata', $audit->getMetadata())
                </button>
            </h5>
        </div>
        
        <div id="a{{ $loop->index }}" class="collapse fade show" aria-labelledby="{{ $loop->index }}" data-parent="#accordion">
            <div class="panel-body">
                @foreach ($audit->getModified() as $attribute => $modified)
                <ul class="single-audit">
                    <li>
                        @lang($attribute.' has been '.$audit->event.' from <strong> :old </strong> '.'to <strong>:new</strong> ', $modified)
                    </li>
                </ul>
                @endforeach
            </div>
            </div>
        </div>
    </div>  
    @empty
    <p>
        @lang('article.unavailable_audits')
    </p>
    @endforelse
</ul>
