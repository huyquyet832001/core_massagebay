<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
@foreach($listItems as $item)
<url>
	<loc>{{trim(base_url($item['slug']),'/')}}</loc>
	<lastmod>{{date("Y-m-d\TH:i:sP",$item['update_time'])}}</lastmod>
	<changefreq>{{$configTable['freq']}}</changefreq>
	<priority>{{$configTable['piority']}}</priority>
</url>
@endforeach
</urlset>