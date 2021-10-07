<?php echo '<?xml version="1.0" encoding="UTF-8"?>'?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
@foreach($listSitemaps as $sitemap)
   <sitemap>
      <loc>{{base_url($sitemap)}}</loc>
      <lastmod>{{date("Y-m-d\TH:i:sP",time())}}</lastmod>
   </sitemap>
@endforeach
</sitemapindex>