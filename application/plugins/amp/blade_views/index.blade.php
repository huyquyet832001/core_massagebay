<!doctype html>
<html amp>
	<head>
		<meta charset="utf-8">
		<script async src="https://cdn.ampproject.org/v0.js"></script>
		{%HEADER%}
		{!!$_meta_noindex or ''!!}
		<link rel="canonical" href="{{base_url()}}">
		<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
		<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
		
		<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
		<script async custom-element="amp-accordion" src="https://cdn.ampproject.org/v0/amp-accordion-0.1.js"></script>
		<script async custom-element="amp-font" src="https://cdn.ampproject.org/v0/amp-font-0.1.js"></script>
		<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
		<script async custom-element="amp-iframe" src="https://cdn.ampproject.org/v0/amp-iframe-0.1.js"></script>
		<script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
	
		@include('amp::css')
	</head>
	<body>
		<amp-sidebar id="sidebar" layout="nodisplay" side="right">
			<button class="close-sb" type="button" on="tap:sidebar.close" role="button" tabindex="0">&times;</button>
			<!--DBS-menu.1|where:group_id = 1,act = 1 -->
			<!--DBE-menu.1-->
		</amp-sidebar>
		<div class="wrapper">
			<header>
				<a class="logo" href="{{base_url()}}amp" title="Trang chủ">
					<amp-img src="{[#i#logo#path]}{[#i#logo#file_name]}" alt="logo" height="38" width="42"></amp-img>
				</a>
				<button on="tap:sidebar.toggle" class="show-sidebar"><i></i></button>
			</header>
			<div class="header box">
				<div class="line">
					<span><i class="ic ic-phone"></i>&nbsp; Hotline: <a class="smooth" href="tel:{[HOTLINE]}" title="{[HOTLINE]}">{[HOTLINE]}</a></span>
					<span><i class="ic ic-email"></i>&nbsp; {[EMAIL]}</span>
				</div>
				<form class="search-form" method="get" action="tim-kiem" target="_top">
					<input type="text" name="s" class="input" placeholder="" value="{@ if($this->CI->input->get('s')){echo $this->CI->input->get('s');} @}">
					<input type="submit" class="submit" name="" value="">
				</form>
				<div class="h-ctrl">
					
						<a class="ctrl" href="{{base_url()}}" title="Tài khoản - đăng nhập"><i class="ic ic-user"></i>
							<strong>Tài khoản</strong>
							<span>Đăng nhập, đăng ký</span>
						</a>
					
					
						<a class="ctrl" href="{{base_url()}}" title="Giỏ hàng - vận chuyển"><i class="ic ic-cart"></i>
							<strong>Giỏ hàng của bạn</strong>
							<span>Vận chuyển toàn quốc</span>
							<em>0</em>
						</a>
					
				</div>
			</div>
			<div class="box">
				<amp-accordion disable-session-states>
					<section class="h-cate">
						<h3 class="i-title"><i></i> Toàn bộ danh mục</h3>
						<amp-accordion class="nested-accordion sub">
							<!--DBS-loop.pro_categories.1|where:act = 1,slide = 1-->
							<section>
								<h4 class="s-title"><a href="{(itempro_categories1.slug)}" title="{(itempro_categories1.name)}">
									<amp-img class="img img-center" src="[[itempro_categories1.icon.-1]]" width="16" height="16"  alt="i"></amp-img>
									{(itempro_categories1.name)}</a> <button></button>
								</h4>
								<ul>
									<!--DBS-loop.pro_categories.2|where:act = 1,parent = $itempro_categories1['id']-->
									<li><a href="{(itempro_categories2.slug)}" title="{(itempro_categories2.name)}">{(itempro_categories2.name)}</a></li>
									<!--DBE-loop.pro_categories.2-->
								</ul>
							</section>
							<!--DBE-loop.pro_categories.1-->
						</amp-accordion>
					</section>
				</amp-accordion>
			</div>
			<amp-carousel class="slider" id="slider" controls loop autoplay delay="3000" width="768" height="240" layout="responsive" type="slides">
				<!--DBS-loop.slides.1|where:act = 1|limit:0,10-->
				<div class="item">
					<amp-img src="[[itemslides1.img.-1]]" width="768" height="240"  alt="{(itemslides1.#i#img#alt)}"></amp-img>
				</div>
				<!--DBE-loop.slides.1-->
			</amp-carousel>
			<!--DBS-loop.pro_categories.3|where:act = 1,parent = 0,home = 1-->
			<div class="box">
				<h2 class="h-title"><a class="smooth" href="{(itempro_categories3.slug)}" title="{(itempro_categories3.name)}">
					<span>
						<amp-img class="img-center" src="[[itempro_categories3.icon_hover.-1]]" width="20" height="20"  alt="i"></amp-img>
					</span> {(itempro_categories3.name)}</a><i>{{$ipro_categories3 + 1}}</i>
				</h2>
				{@ 
				$products = $this->CI->Dindex->getDataFindInSet($itempro_categories3['id'],'pro',' and home = 1',3);
				if(count($products)>0) {
				foreach($products as $pro) {
				@}
				<div class="h-product">
					<a class="img" href="{(pro.slug)}">
					<amp-img class="img-center" src="[[pro.img.-1]]" width="300" height="140"  alt="{(pro.#i#img#alt)}"></amp-img>
					</a>
					<h3 class="title"><a href="{(pro.slug)}" title="{(pro.name)}">{(pro.name)}</a></h3>
					<div class="price">
					{@
						if($pro['price'] > 0 && $pro['price_sale'] > 0){
					        if($pro['price_sale'] < $pro['price']){
					            echo number_format((double)$pro['price_sale'],0,',','.');
					        }else{
					            echo number_format((double)$pro['price'],0,',','.');
					        }
					    }
					    else{
					        if($pro['price_sale'] > 0){
					            echo number_format((double)$pro['price_sale'],0,',','.');
					        }
					        elseif($pro['price'] > 0){
					            echo number_format((double)$pro['price'],0,',','.');
					        }
					        else{
					            echo "Liên hệ";
					        }
					    }
					@}
					</div>
				</div>
				{@ }} @}
				<div class="h-banner">
					<amp-img src="[[itempro_categories3.img_ads_2.-1]]" width="768" height="80" layout="responsive" alt="i"></amp-img>
				</div>
			</div>
			<!--DBE-loop.pro_categories.3-->
			<!--DBS-loop.news_categories.1|where:act = 1,id = 5-->
			<div class="box">
				<div class="table bottom-10">
					<div class="cell"><h2 class="faq-title"><i class="ic ic-comment"></i> {(itemnews_categories1.name)}</h2></div>
					<div class="cell text-right"><a class="smooth view-all" href="{(itemnews_categories1.slug)}" title="Xem tất cả">Xem tất cả</a></div>
				</div>
				<div class="faq-item">
					<!--DBS-loop.news.1|where:act = 1,FIND_IN_SET(\''.$itemnews_categories1['id'].'\';parent) > 0,home = 1|limit:0,4-->
					<h3 class="title"><a class="smooth" href="{{base_url()}}amp/{{$itemnews1['slug']}}" title="{(itemnews1.name)}">{(itemnews1.name)}</a></h3>
					<div class="info">
						<span><i class="fa fa-user"></i> {(itemnews1.publish_by)}</span>
						<span><i class="fa fa-comments"></i> <label class="fb-comments-count" data-href="{{base_url()}}amp/{{$itemnews1['slug']}}"></label></span>
						<span><i class="fa fa-eye"></i> {(itemnews1.count)} lượt xem</span>
					</div>
					<!--DBE-loop.news.1-->
				</div>
			</div>
			<!--DBE-loop.news_categories.1-->
			<div class="box">
				<h2 class="hpost-title"><i class="ic ic-news"></i> Tin tức</h2>
				<!--DBS-loop.news.2|where:act = 1,FIND_IN_SET(6;parent) > 0,home = 1|limit:0,1-->
				<div class="f-post clearfix">
					<a class="img" href="{{base_url()}}amp/{{$itemnews2['slug']}}" title="{(itemnews2.name)}">
						<amp-img src="[[itemnews2.img.-1]]" width="115" height="85" alt="{(itemnews2.#i#img#alt)}"></amp-img>
					</a>
					<div class="ct">
						<h3 class="title"><a class="smooth" href="{{base_url()}}amp/{{$itemnews2['slug']}}" title="{(itemnews2.name)}">{(itemnews2.name)}</a></h3>
						<p>{{wlimit($itemnews2['content'],100)}}</p>
					</div>
				</div>
				<!--DBE-loop.news.2-->
				<div class="post-list">
					<!--DBS-loop.news.3|where:act = 1,FIND_IN_SET(6;parent) > 0,home = 1|limit:1,3-->
					<div class="item">
						<h3 class="title"><a class="smooth" href="{{base_url()}}amp/{{$itemnews3['slug']}}" title="{(itemnews3.name)}">{(itemnews3.name)}</a></h3>
						<time>{{date('d/m/Y',$itemnews3['create_time'])}}</time>
					</div>
					<!--DBE-loop.news.3-->
				</div>
			</div>
			<br>
			<div class="box h-policy bg">
				<!--DBS-loop.policy.1|where:act = 1|limit:0,4-->
				<div class="policy table mid">
					<div class="img cell">
						<amp-img src="[[itempolicy1.img.-1]]" width="50" height="50" alt="{(itempolicy1.#i#img#alt)}"></amp-img>
					</div>
					<div class="cell">
						{(itempolicy1.name)}
					</div>
				</div>
				<!--DBE-loop.policy.1-->
			</div>
			<div class="box testimonial">
				<h2 class="i-title"><span>Khách hàng <i class="ic ic-smile"></i></span> Nói về {[NAME_COMPANY]}</h2>
				<div class="testi-cas">
					<amp-carousel id="testi-cas" width="auto" height="150" layout="fixed-height" type="slides">
						<!--DBS-loop.custom_talk.1|where:act = 1-->
						<div class="testi">
							<h3 class="name">{(itemcustom_talk1.name)}</h3>
							<p>{(itemcustom_talk1.content)}</p>
							<span>{(itemcustom_talk1.create_time)}</span>
						</div>
						<!--DBE-loop.custom_talk.1-->
					</amp-carousel>
				</div>
				<!-- <div class="testi-dots">
					<amp-carousel class="carousel-preview" width="auto" height="30" layout="fixed-height" type="carousel">
						<button on="tap:testi-cas.goToSlide(index=0)">1</button>
						<button on="tap:testi-cas.goToSlide(index=1)">2</button>
						<button on="tap:testi-cas.goToSlide(index=2)">3</button>
					</amp-carousel>
				</div> -->
				
				<h2 class="i-title"><a class="smooth" href="mailto:{[EMAIL]}" title="{[EMAIL]}"><span>Viết cảm nhận về </span>{[NAME_COMPANY]} <i class="ic ic-comments2"></i></a></h2>
			</div>
			<div class="box h-partner">
				<amp-carousel width="auto" height="85" layout="fixed-height" type="carousel">
					<!--DBS-loop.partner.1|where:act = 1-->
					<a class="partner" href="{(itempartner1.link)}" title="{(itempartner1.name)}">
						<amp-img class="img-center" src="[[itempartner1.img.126x0]]" width="140" height="85" alt="{(itempartner1.#i#img#alt)}"></amp-img>
					</a>
					<!--DBE-loop.partner.1-->
				</amp-carousel>
			</div>
			<footer class="bg">
				<div class="box">
					<!--DBS-loop.menu.1|where:act = 1,group_id = 3,parent = 0|limit:0,3-->
					<h4 class="f-title">{(itemmenu1.name)}</h4>
					<ul>
						<!--DBS-loop.menu.2|where:act = 1,group_id = 3,parent = $itemmenu1['id']-->
						<li><a class="smooth" href="{(itemmenu2.link)}" title="{(itemmenu2.name)}">{(itemmenu2.name)}</a></li>
						<!--DBE-loop.menu.2-->
					</ul>
					<!--DBE-loop.menu.1-->
					<h4 class="f-title">ĐĂNG KÝ NHẬN TIN KHUYẾN MẠI</h4>
					<!-- <form class="subs-form" method="post" action="Vindex/registerReceiveNews" target="_top">
						<input type="text" class="input" placeholder="Mời bạn nhập email" name="email">
						<input type="submit" class="submit" name="" value="Đăng ký">
					</form> -->
					<br>
					<div class="text-center">
						<a class="logo" href="{{base_url()}}amp" title="Trang chủ">
							<amp-img class="img-center" src="{[#i#logo_footer#path]}{[#i#logo_footer#file_name]}" width="108" height="97" alt="{[#i#logo_footer#alt]}"></amp-img>
						</a>
					</div>
					<br>
					<div class="f-line"><i class="fa fa-map-marker"></i> {[ADDRESS]}</div>
					<div class="f-line"><i class="fa fa-phone"></i> {[HOTLINE]}</div>
					<div class="f-line"><i class="fa fa-envelope"></i> {[EMAIL]}</div>
					<h4 class="f-title">Fanpage</h4>
					<amp-iframe width="auto" title="" height="250" layout="fixed-height" sandbox="allow-scripts allow-same-origin allow-popups" allowfullscreen frameborder="0" src="https://www.facebook.com/plugins/page.php?href={[fb]}&tabs=timeline&width=290&height=250&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"></amp-iframe>
				</div>
				<div class="copyright">
					{[COPYRIGHT]}
				</div>
				
			</footer>
			
		</div>
		<a class="back-to-top" href="#" title=""></a>
	</body>
</html>