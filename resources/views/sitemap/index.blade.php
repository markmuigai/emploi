<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if(count(\App\Post::all()) > 0)
    <sitemap>
        <loc>{{ url('/sitemap/posts.xml') }}</loc>
        <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    @endif
    @if(count(\App\Blog::all()) > 0)
    <sitemap>
        <loc>{{ url('/sitemap/blogs.xml') }}</loc>
        <lastmod>{{ $blog->created_at->tz('UTC')->toAtomString() }}</lastmod>
    </sitemap>
    @endif
</sitemapindex>