<ul class="audit">
    @forelse ($audits  as $audit)
    <li class="audit-li">
        @lang('article.updated.metadata', $audit->getMetadata())
        @foreach ($audit->getModified() as $attribute => $modified)
        <ul class="single-audit">
            <li>@lang($attribute.' has been '.$audit->event.' from <strong> :old </strong> '.'to <strong>:new</strong> ', $modified)</li>
        </ul>
        @endforeach
    </li>
    @empty
    <p>
        @lang('article.unavailable_audits')
    </p>
    @endforelse
</ul>