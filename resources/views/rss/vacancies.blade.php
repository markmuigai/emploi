<?=
    /* Using an echo tag here so the `<? ... ?>` won't get parsed as short tags */
    '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($meta as $key => $metaItem)
        @if($key === 'link')
            <{{ $key }} href="{{ url($metaItem) }}"></{{ $key }}>
        @elseif($key === 'title')
            <{{ $key }}><![CDATA[{{ $metaItem }}]]></{{ $key }}>
        @else
            <{{ $key }}>{{ $metaItem }}</{{ $key }}>
        @endif
    @endforeach
    @forelse($items as $item)
        <url>
            <loc>{{ $item->link }}</loc>
            <id>{{ $item->id }}</id>
            <title>{{ $item->title }}</title>
            <company>{{ $item->company }}</company>
            <category>{{ $item->category }}</category>
            <deadline>{{ $item->deadline }}</deadline>
            <vacancies>{{ $item->vacancies }}</vacancies>
            <updated>{{ $item->updated->toRssString() }}</updated>
        </url>
    @empty
    @endforelse
</urlset>
