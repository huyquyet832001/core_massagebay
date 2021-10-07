<!doctype html>

<html amp lang="vi">

    <head>

    	<?php $contents = ampContent($dataitem['content']);$content = $contents["content"];$images = $contents["images"] ?>

        <meta charset="utf-8">

        <script async src="https://cdn.ampproject.org/v0.js"></script>

        {!!ampHeader(isset($dataitem)?$dataitem:Null)!!}

        <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

        <link rel="canonical" href="{{ampOriginUrl()}}">

        <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style>

        <script type="application/ld+json">

	      {

	        "@context": "http://schema.org",

	        "@type": "NewsArticle",

	        "headline": "{(dataitem.name)}",

            "datePublished": "{{date(\DateTime::ISO8601,$dataitem['create_time'])}}",

	        "dateModified": "{{date(\DateTime::ISO8601,$dataitem['update_time'])}}",

	        "image": [

	        {!!sprintf('"%s"', implode('","', $images ) )!!}

	        ],

            "publisher": {

                "@type": "Organization",

                "name": "{[STRUCT_ORG]}",

                "logo": {

                  "@type": "ImageObject",

                  "url": "{<logo.1.-1>}"

                }

              },

              "mainEntityOfPage": {

                "@type": "WebPage",

                "@id": "{{ampOriginUrl()}}"

              },

            "author": {

                "@type": "Organization",

                "name": "{[STRUCT_ORG]}"

              },

               "description": "{{ampShortContent($dataitem)}}"

	      }

    	</script>

        <noscript>

            <style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style>

        </noscript>

        <style amp-custom>

            /* any custom style goes here */

            *{

            margin: 0;

            padding: 0;

            }

            

            html

            {

            font-family: Helvetica, Arial, Tahoma, sans-serif;

            font-size: 10px;

            }

            header{

            height: 50px;

            background: #41b75e;

            padding: 10px 0px;

            }

            .wp-amp-header {

            height: 100%;

            }

            .logo

            {

            display: block;

            max-width: 210px;

            height: 100%;

            }

            amp-img{

                max-width: 100%;

                max-height: 100%;

            }

            .content

            {

            width: 100%;

            padding-right: 15px;

            padding-left: 15px;

            margin-right: auto;

            margin-left: auto;

            max-width: 1200px;

            position: relative;

            }

            p.create-time {

            margin: 0 0px 10px 0px;

            color: #a9a9a9;

            display: flex;

            align-items: center;

            font-size: 1.4rem;

            }

            p.create-time > amp-img {margin-right: 5px;}

            .tag {

            width: 100%;

            }

            .tag > a {

            text-decoration: none;

            display: inline-block;

            padding: 5px 10px;

            border: dashed thin #80808066;

            margin-bottom: 5px;

            color: black;

            transition: .3s;

            font-size: 1.4rem;

            margin-top: 10px;

            }

            .tag > span

            {

            display: inline-block;

            background: red;

            padding: 10px;

            color: #fff;

            background: black;

            margin-right: 10px;

            }

            .tag > a:hover

            {

            background: orange;

            }

            .title {text-transform: uppercase;margin: 10px 0px;}

            .new-more {

            margin-top: 10px;

            margin-bottom: 10px;

            }

            .news

            {

            margin-left: -15px;

            margin-right: -15px;

            margin-top: 20px;

            display: flex;

            width: 100%;

            flex-wrap: wrap;

            box-sizing: border-box;

            }

            .news .new-item {

            flex: 0 0 33%;

            max-width: 33.33%;

            padding-left: 15px;

            padding-right: 15px;

            width: 100%;

            position: relative;

            margin-bottom: 10px;

            box-sizing: border-box;

            }

            .news .new-item .img-main > a

            {

            overflow: hidden;

            }

            .news .new-item .img-main > a > amp-img

            {

            transform: scale(1);

            transition: 1.5s;

            }

            .news .new-item:hover > .img-main > a > amp-img

            {

            transform: scale(1.2);

            }

            .title-bar {

            border-bottom: solid thin orange;

            }

            .title-bar > h2 {

            display: inline-block;

            text-transform: uppercase;

            background: #ef3030;

            color: #fff;

            padding: 10px 12px;

            }

            .img-main {

            position: relative;

            }

            .img-main > a {

            display: block;

            }

            .img-main > a.span {

            	text-decoration: none;

            position: absolute;

            bottom: 0;

            color: #fff;

            font-size: 1.4rem;

            padding: 10px;

            background: #00000099;

            }

            .new-item > h3 > a {

            text-decoration: none;

            font-size: 16px;

            color: black;

            line-height: 1.4;

            display: inline-block;

            }

            .new-item > h3 > a:hover

            {

            color: green;

            }

            .new-item > h3 {margin-top: 10px;}

            .footer {

            background: #41b75e;

            padding: 10px 0px;

            }

            .c-img {

            display: block;

            position: relative;

            padding-top: 70%; }

            .c-img amp-img, .c-img .bg {

            position: absolute;

            top: 0;

            right: 0;

            bottom: 0;

            left: 0;

            display: block;

            width: 100%;

            height: 100%;

            border-radius: inherit; }

            .backtotop {

            position: absolute;

            bottom: 0;

            right: 40px;

            width: 40px;

            height: 40px;

            background: #ff5722;

            cursor: pointer;

            }

            .backtotop > a

            {

            position: relative;

            display: block;

            height: 40px;

            z-index: 111;

            }

            .backtotop:hover > ::after

            {

            border-bottom: 15px solid #fff;

            }

            .backtotop:after {

            position: absolute;

            content: '';

            display: flex;

            width: 0;

            height: 0;

            border-left: 15px solid transparent;

            border-right: 15px solid transparent;

            border-bottom: 15px solid black;

            transition: .3s;

            top: 50%;

            left: 50%;

            transform: translate(-50%,-50%);

            }

            .s-content ol {

  list-style: decimal;

  margin-left: 15px;

  margin-bottom: 10px; }

.s-content ul {

  list-style: initial;

  margin-left: 15px;

  margin-bottom: 10px; }

.s-content li {

  list-style: inherit;

  margin-bottom: 5px; }

.s-content p {

	font-size: 1.4rem;

  margin-bottom: 10px; }

.s-content img {

  display: block;

  max-width: 100%;

  margin: 10px auto;

  width: auto ;

  height: auto ; }

.s-content table, .s-content iframe {

  max-width: 100%; }.s-content ol {

  list-style: decimal;

  margin-left: 15px;

  margin-bottom: 10px; }

.s-content ul {

  list-style: initial;

  margin-left: 15px;

  margin-bottom: 10px; }

.s-content li {

  list-style: inherit;

  margin-bottom: 5px; }

.s-content p {

	font-size: 1.4rem;

  margin-bottom: 10px; }

.s-content img {

  display: block;

  max-width: 100%;

  margin: 10px auto;

  width: auto ;

  height: auto ; }

.s-content table, .s-content iframe {

  max-width: 100%; }

            @media only screen and (max-width: 768px)

            {

            .news .new-item {

            flex: 0 0 50%;

            max-width: 50%;

            }

            @media only screen and (max-width: 480px)

            {

            .news .new-item {

            flex: 0 0 100%;

            max-width: 100%;

            }

        </style>

        <script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>

        {[STRUCT_IN_HEAD]}

    </head>

    <body>

        {[STRUCT_IN_BODY]}

        <header>

            <div class="wp-amp-header content">

                <a href="{{base_url()}}" title="" class="logo">

                    {!!ampImgConfig('logo',1,-1)!!}

                </a>

            </div>

        </header>

        <div class="content">

            <h1 class="title">{(name)}</h1>

            <p class="create-time">

                {{date("d/m/Y",$dataitem['create_time'])}}

            </p>

            <div class="s-content">

            	{!!$content!!}

            </div>

        </div>

      

        <div class="content new-more">

            <div class="title-bar">

                <h2>Bài viết liên quan</h2>

            </div>

            {%RELATED.3%}



            <div class="news">

            	<?php $categories = dataTableByKey("news_categories"); ?>

            	@foreach($arrRelated as $item)

                <div class="new-item">

                    <div class="img-main">

                        <a href="{(item.slug)}" title="{(item.name)}" class="c-img">

                            <amp-img src="[[item.img.-1.1]]" title="{(item.#i#img#title)}" alt="{(item.#i#img#alt)}" layout="responsive" width="300" height="300"></amp-img>

                        </a>

                        <?php $firstCate = explode(",", $item['parent']); $firstCate = count($firstCate)>0?$firstCate[0]:0;  ?>

                        @if(array_key_exists($firstCate,$categories))

                        <a class="span" href='{{base_url($categories[$firstCate]["slug"])}}'>{{$categories[$firstCate]["name"]}}</a>

                    	@endif

                    </div>

                    <h3><a href="{(item.slug)}" title="{(item.name)}">{(item.name)}</a></h3>

                </div>

                @endforeach

            </div>

        </div>

        <div class="footer">

            <div class="content">

                <a href="{{base_url()}}" title="" class="logo">

                     {!!ampImgConfig('logo',1,-1)!!}

                </a>

                <span class="backtotop"><a href="#top"></a></span>

            </div>

        </div>

    </body>

</html>

