<style amp-custom>
        /* general */
            * {-webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box;}
            button{outline: none;}
            .bg{
                background-repeat: no-repeat;
                background-size: cover;
                background-position: 50% 50%;
            }
            .clearfix:before, .clearfix:after {
                content: '';
                display: block;
                clear: both; }
            a, a:hover, a:focus, a:active{
                text-decoration: none;
                color: inherit;
            }
            amp-img, img{
                vertical-align: middle;
                max-width: 100%;
            }
            .text-center{
                text-align: center;
            }
            .text-right{
                text-align: right;
            }
            .text-left{
                text-align: left;
            }
            .row{
                margin: 0 -8px;
            }
            .row:after{content: '';display: block;clear: both;}
            .col-1,.col-2,.col-3,.col-4,.col-5,.col-6,.col-7,.col-8,.col-9.col-10,.col-11,.col-12{
                float: left;padding: 0 8px;position: relative;
            }
            .col-1{width: 8.333%;}
            .col-2{width: 16.666%;}
            .col-3{width: 25%;}
            .col-4{width: 33.333%;}
            .col-5{width: 41.666%;}
            .col-6{width: 50%;}
            .col-7{width: 58.333%;}
            .col-8{width: 66.666%;}
            .col-9{width: 75%;}
            .col-10{width: 83.333%;}
            .col-11{width: 891.666%;}
            .col-12{width: 100%;}
            .row-ibl {
                font-size: 0; }
                .row-ibl > [class^="col-"] {
                    font-size: 14px;
                    float: none;
                    display: inline-block;
                    vertical-align: top; }
                    .row-ibl:after {
                        content: '';
                        display: inline-block;
                        width: 100%; }
                        .row-ibl.mid > [class^="col-"] {
                            vertical-align: middle; }
                            .row-ibl.bot > [class^="col-"] {
                                vertical-align: bottom; }
                                .row-ibl > [class^="col-"].i-mid {
                                    vertical-align: middle; }
                                    .row-ibl > [class^="col-"].i-top {
                                        vertical-align: top; }
                                        .row-ibl > [class^="col-"].i-bot {
                                            vertical-align: bottom; }
            @font-face {
                font-family: 'FontAwesome';
                src: url('../theme/frontend/fonts/fontawesome-webfont.eot?v=4.4.0');
                src: url('../theme/frontend/fonts/fontawesome-webfont.eot?#iefix&v=4.4.0') format('embedded-opentype'), url('../theme/frontend/fonts/fontawesome-webfont.woff2?v=4.4.0') format('woff2'), url('../theme/frontend/fonts/fontawesome-webfont.woff?v=4.4.0') format('woff'), url('../theme/frontend/fonts/fontawesome-webfont.ttf?v=4.4.0') format('truetype'), url('../theme/frontend/fonts/fontawesome-webfont.svg?v=4.4.0#fontawesomeregular') format('svg');
                font-weight: normal;
                font-style: normal;
            }
            .ic {
                display: inline-block;
                vertical-align: middle;
                background-repeat: no-repeat;
                background-position: center;
                background-size: contain; }
            .fa {
                display: inline-block;
                font: normal normal normal 14px/1 FontAwesome;
                font-size: inherit;
                text-rendering: auto;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }
            .fa-user:before {content: "\f007";}
            .fa-comments:before {content: "\f086";}
            .fa-eye:before {content: "\f06e";}
            .fa-map-marker:before {
                content: "\f041";
            }
            .fa-phone:before {
                content: "\f095";
            }
            .fa-envelope:before {
                content: "\f0e0";
            }
            .c-img {
                display: block;
                position: relative;
                padding-top: 100%; }
                .c-img amp-img, .c-img img, .c-img .bg {
                    position: absolute;
                    top: 0;
                    right: 0;
                    bottom: 0;
                    left: 0;
                    display: block;
                    width: 100%;
                    height: 100%;
                    border-radius: inherit; }
            ul, ol{
                padding: 0;
                margin: 0;
                list-style: none;
            }
            h1, h2, h3, h4, h5, h6{
                margin-top: 0;
                margin-bottom: 0;
                font-weight: normal;
            }
            p{
                margin-top: 0;
                margin-bottom: 10px;
            }
            .img-center img{
                min-width: auto;
                min-height: auto;
                width: auto;
                height: auto;
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
                            margin-bottom: 10px; }
                                .s-content table, .s-content iframe {
                                    max-width: 100%; }
            body{
                font-family: Arial, serif, sans-serif;
                line-height: 1.5;
                font-size: 14px;
                color: #333;    
            }
            .wrapper{
                width: 768px;
                max-width: 100%;
                margin: auto;
            }
            .box{
                padding-left: 15px;
                padding-right: 15px;
            }
            .table{
                display: table;
                width: 100%;
            }
            .table .cell{
                display: table-cell;
            }
            .table.mid .cell{
                vertical-align: middle;
            }
            .table.bot .cell{
                vertical-align: bottom;
            }
        /* end general */
        /* header */
            header{
                position: fixed;
                z-index: 9;
                left: 0;
                right: 0;
                top: 0;
                background: #0f7fc1;
                padding: 2px 15px;
            }
            header .logo{
                display: inline-block;
                vertical-align: middle;
            }
            header .show-sidebar{
                position: absolute;
                right: 0;
                top: 0;
                bottom: 0;
                width: 42px;
                background: rgba(0,0,0,0.2);
                border: none;
            }
            header .show-sidebar i{
                border-top: solid 2px #fff;
                border-bottom: solid 2px #fff;
                display: block;
                width: 20px;
                margin: auto;
            }
            header .show-sidebar i:after{
                content: '';
                display: block;
                height: 2px;
                background: #fff;
                margin: 3px 0;
            }
            .close-sb{
                background: none;
                border: none;
                font-size: 30px;
                color: #fff;
                line-height: 1;
                position: absolute;
                right: 10px;
                top: 8px;
            }
            #sidebar{
                background: #0f7fc1;
                padding-top: 20px;
            }
            #sidebar ul{
                padding-left: 0;
                list-style: none;
                min-width: 250px;
            }
            #sidebar li>a, #sidebar .i-title{
                display: block;
                font-size: 15px;
                padding: 12px 15px;
                color: #fff;
                text-decoration: none;
                border: none;
                background: none;
                border-bottom: solid 1px #e1e1e1;
            }
            #sidebar .i-title{
                position: relative;
            }
            #sidebar .i-title button{
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                color: #fff;
                font-size: 21px;
                width: 40px;
                background: none;
                border: none;
                cursor: pointer;
            }
            #sidebar .i-title[aria-expanded="false"] button:after{
                content: '\002B';
            }
            #sidebar .i-title[aria-expanded="true"] button:after{
                content: '\2212';
            }
            #sidebar ul ul li> a, #sidebarul  ul .i-title{
                padding-left: 30px;
                font-weight: normal;
            }
            .ic-phone {
                width: 17px;
                height: 14px;
                background-image: url(../theme/frontend/images/phone.png);
            }
            .ic-email{
                width: 18px;
                height: 12px;
                background-image: url(../theme/frontend/images/email.png);
            }
            .ic-search {
                width: 22px;
                height: 22px;
                background-image: url(../theme/frontend/images/search.png);
            }
            .ic-user {
                width: 22px;
                height: 22px;
                background-image: url(../theme/frontend/images/user.png);
            }
            .ic-cart {
                width: 22px;
                height: 22px;
                background-image: url(../theme/frontend/images/cart.png);
            }
            .header{
                padding: 52px 10px 10px 10px;
            }
            .header .line span{
                display: inline-block;
                margin-right: 10px;
            }
            .header .line a{
                color: #ff0000;
            }
            .search-form{
                position: relative;
                margin-top: 8px;
                margin-bottom: 15px;
            }
            .search-form .input {
                width: 100%;
                height: 30px;
                border: solid 1px #850900;
                padding-left: 10px;
            }
            .search-form .submit{
                border: none;
                position: absolute;
                top: 0;
                bottom: 0;
                right: 0px;
                background: #850900;
                width: 40px;
                background-image: url(../theme/frontend/images/search.png);
                background-size: 22px 22px;
                background-repeat: no-repeat;
                background-position: center;
            }
            .h-ctrl{
                font-size: 12px;
            }
            .h-ctrl .ctrl{
                position: relative;
                padding-left: 28px;
                display: inline-block;
            }
            .h-ctrl .ctrl:first-child{
                margin-right: 10px;
            }
            .h-ctrl .ctrl i{
                position: absolute;
                left: 0;
                top: 7px;
            }
            .h-ctrl .ctrl strong{
                display: block;
            }
            .h-ctrl .ctrl em{
                position: absolute;
                top: -8px;
                width: 20px;
                height: 20px;
                border-radius: 50%;
                background: #ff0000;
                color: #fff;
                text-align: center;
                line-height: 20px;
                font-style: normal;
                left: 8px;
            }
        /* end header */
        /* cate */  
            .h-cate{
                position: relative;
            }
            .h-cate .i-title{
                background: #850900;
                font-size: 12px;
                text-transform: uppercase;
                color: #e6bf26;
                padding: 0px 10px 0 20px;
                padding-top: 2px;
                line-height: 36px;
                border-radius: 10px 10px 0 0;
                outline: none;
            }
            .h-cate .i-title i{
                display: inline-block;
                border-top: solid 2px #fff;
                border-bottom: solid 2px #fff;
                width: 17px;
                vertical-align: middle;
                margin-right: 5px;
                margin-top: -3px;
            }
            .h-cate .i-title i:after{
                content: '';
                display: block;
                height: 2px;
                margin: 3px 0;
                background: #fff;
            }
            .h-cate .sub{
                background: #ebebeb;
                z-index: 1;
            }
            .h-cate .s-title{
                padding: 10px 15px 10px 45px;
                position: relative;
                outline: none;
            }
            .h-cate .s-title .img{
                position: absolute;
                left: 15px;
                top: 50%;
                margin-top: -8px;
            }
            .h-cate .s-title button{
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                background: rgba(0,0,0,0.1);
                border: none;
                width: 40px;
                font-size: 24px;
                cursor: pointer;
            }
            .h-cate .s-title[aria-expanded="true"] button:after{
                content: '\2212';
            }
            .h-cate .s-title[aria-expanded="false"] button:after{
                content: '\002B';
            }
            .h-cate ul a{
                display: block;
                padding: 10px 15px 10px 40px;
                border-bottom: solid 1px rgba(0,0,0,0.05);
            }
        /* end cate*/
        /**/
            .h-title{
                background: #850900;
                color: #fff;
                text-align: center;
                font-size: 16px;
                text-transform: uppercase;
                padding: 3px 0 3px 10px;
                position: relative;
            }
            .h-title span{
                display: block;
            }
            .h-title:before{
                position: absolute;
                content: '';
                border-top: 50px solid #fff;
                border-right: 50px solid transparent;
                top: 0;
                left: 0;
            }
            .h-title:after{
                position: absolute;
                content: '';
                border-top: 45px solid #850900;
                border-right: 45px solid transparent;
                top: 4px;
                left: 5px;
            }
            .h-title i{
                position: absolute;
                top: 0px;
                left: 0px;
                font-style: normal;
                z-index: 1;
                padding-left: 14px;
                padding-top: 7px;
            }
            .h-title i:after, .h-title i:before{
                content: '';
                width: 0;
                height: 0;
                position: absolute;
                top: 4px;
                left: 5px;
                z-index: -1;
            }
            .h-title i:after {
                border-top: 39px solid #850900;
                border-right: 39px solid transparent;
            }
            .h-title i:before {
                border-top: 44px solid rgba(0, 0, 0, 0.3);
                border-right: 44px solid transparent;
            }
            .h-product{
                text-align: center;
                border: solid 1px #d1d1d1;
                margin-bottom: -1px;
                padding: 10px;
            }
            .h-product .img{
                text-align: center;
                display: block;
                margin-bottom: 10px;
            }
            .h-product .img amp-img, .h-product .img img{
                margin: auto;
            }
            .h-product .title{
                text-align: center;
                margin-bottom: 5px;
            }
            .h-product .price{
                font-weight: bold;
                color: #ff0000;
                font-size: 16px;
            }
            .h-banner{
                margin-top: 10px;
                margin-bottom: 20px;
            }
            .ic-comment{
                width: 26px;
                height: 22px;
                background-image: url(../theme/frontend/images/comment.png);
            }
            .view-all{
                color: #0361fd;
            }
            .view-all:hover{
                text-decoration: underline;
            }
            .bottom-10{
                margin-bottom: 10px;
            }
            .faq-item{
                margin-bottom: 15px;
            }
            .faq-item .title{
                font-size: 14px;
                margin-bottom: 5px;
            }
            .faq-item .info{
                color: #999;
                font-size: 13px;
            }
            .faq-item .info span{
                margin-right: 20px;
            }
            .ic-news{
                width: 20px;
                height: 20px;
                background-image: url(../theme/frontend/images/news.png);
            }
            .hpost-title{
                text-transform: uppercase;
                color: #ff0000;
                margin-bottom: 10px;
            }
            .hpost-title i{
                margin-top: -3px;
            }
            .f-post .img{
                float: left;
            }
            .f-post .ct{
                margin-left: 128px;
            }
            .f-post .title{
                font-size: 14px;
                color: #0361fd;
                margin-bottom: 5px;
                line-height: 20px;
                max-height: 40px;
            }
            .f-post p{
                font-size: 14px;
                line-height: 20px;
                max-height: 40px;
                overflow: hidden;
            }
            .f-post{
                padding-bottom: 10px;
                margin-bottom: 10px;
                border-bottom: dashed 1px #d1d1d1;
            }
            .post-list .item{
                margin-bottom: 10px;
                position: relative;
                padding-left: 16px;
            }
            .post-list .item:before{
                content: '';
                width: 6px;
                height: 6px;
                border-radius: 50%;
                background: #666;
                position: absolute;
                left: 0;
                top: 7px;
            }
            .post-list .item .title{
                display: inline;
                font-size: 14px;
            }
            .post-list .item time{
                font-size: 13px;
                color: #888;
                font-style: italic;
            }
            .h-policy{
                background-image: url('../theme/frontend/images/bg1.jpg');
                background-position: bottom center;
                background-size: cover;
                padding: 30px 15px 15px 15px;
            }
            .policy{
                color: #fff;
                margin-bottom: 15px;
            }
            .policy .img{
                width: 65px;
            }
            .ic-smile{
                width: 49px;
                height: 25px;
                background-image: url(../theme/frontend/images/smile.png);
            }
            .ic-comments2{
                width: 62px;
                height: 38px;
                background-image: url(../theme/frontend/images/comments.png);
            }
            .testimonial .i-title {
                font-family: "Tahoma";
                text-transform: uppercase;
                margin: 20px 0;
                font-size: 14px;
            }
            .testimonial .i-title span {
                display: block;
                color: #0f7fc1;
            }
            .testi{
                padding: 0 30px;
            }
            .testi .name{
                font-weight: bold;
                margin-bottom: 10px;
                font-size: 14px;
            }
            .testi span{
                font-style: italic;
                color: #888;
            }
            .testi-cas{
                position: relative;
            }
            .testi-cas:after,.testi-cas:before{
                content: '';
                width: 24px;
                height: 36px;
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center;
                position: absolute;
            }
            .testi-cas:before {
                top: 0;
                left: 0;
                background-image: url(../theme/frontend/images/lq.png);
            }
            .testi-cas:after {
                bottom: 15px;
                right: 0;
                background-image: url(../theme/frontend/images/rq.png);
            }
            #testi-cas .amp-carousel-button{
                top: 40px;
                -webkit-transform: none;
                transform: none;
                width: 30px;
                height: 30px;
            }
            #testi-cas .amp-carousel-button-next{
                right: 0px;
            }
            #testi-cas .amp-carousel-button-prev{
                left: 0px;
            }
            .testi-dots{
                text-align: right;
                margin-right: 30px;
            }
            .testi-dots button{
                width: 30px;
                height: 30px;
                text-align: center;
                line-height: 30px;
                border: solid 1px #850900;
                margin: 0 3px;
                background: none;
            }
            .partner{
                display: block;
                background: #f5f5f5;
            }
            .h-partner .amp-carousel-button{
                width: 30px;
                height: 30px;
            }
            footer{
                background-image: url(../theme/frontend/images/bg-foot.jpg);
                margin-top: 40px;
                position: relative;
                z-index: 1;
                color: #fff;
                padding-top: 5px;
            }
            footer:after{
                content: '';
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background: rgba(0, 0, 0, 0.5);
                z-index: -1;
            }
            .f-title{
                margin-top: 25px;
                text-transform: uppercase;
                font-size: 15px;
                margin-bottom: 10px;
                font-weight: bold;
            }
            footer ul li {
                margin-bottom: 10px;
                padding-left: 18px;
                position: relative;
            }
            footer ul li:before {
                content: '';
                width: 5px;
                height: 5px;
                border-radius: 50%;
                background: #fff;
                position: absolute;
                left: 0;
                top: 7px;
            }
            .subs-form{
                width: 350px;
                max-width: 100%;
                position: relative;
            }
            .subs-form .input{
                height: 35px;
                width: 100%;
                background: none;
                font-size: 13px;
                border: solid 1px #fff;
                font-style: italic;
                padding-left: 10px;
                color: #fff;
            }
            .subs-form .input::-webkit-input-placeholder {
                color: #d1d1d1;
            }
            .subs-form .input:-moz-placeholder {
                color: #d1d1d1;  
            }
            .subs-form .input::-moz-placeholder {
                color: #d1d1d1;  
            }
            .subs-form .input:-ms-input-placeholder {  
                color: #d1d1d1;  
            }
            .subs-form .submit{
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                background: #fff;
                padding: 0 9px;
                color: #850900;
                border: none;
            }
            footer .f-line {
                padding-left: 22px;
                margin-bottom: 10px;
                position: relative;
            }
            footer .f-line i {
                position: absolute;
                left: 0;
                top: 3px;
            }
            .copyright{
                margin-top: 35px;
                padding: 10px 15px;
                text-align: center;
                background: rgba(0, 0, 0, 0.7);
            }
            .back-to-top{
                position: fixed;
                font-size: 14px;
                cursor: pointer;
                text-align: center;
                z-index: 99;
                width: 40px;
                height: 40px;
                line-height: 40px;
                right: 15px;
                bottom: 15px;
                background: rgba(133, 9, 0, 0.8);
                color: #fff;
            }
            .back-to-top:after{
                content: '\1f869';
            }
            .back-to-top:hover, .back-to-top:focus{
                color: #fff;
            }
            .breadcrumb{
                background:none;
                padding: 10px 0;
                border-radius: 0;
            }
            .breadcrumb li{
                display: inline-block;
            }
            .breadcrumb a:hover{
                color: #037dc0;
            }
            .breadcrumb>li+li:before{
                color: inherit;
                font-family: FontAwesome;
                content: "\f105";
                margin: 0px 3px;
            }
            .te-pagination {
                margin: 0 0 30px 0;
            }
            .te-pagination a, .te-pagination strong {
                font-weight: normal;
                width: 22px;
                height: 22px;
                text-align: center;
                display: inline-block;
                vertical-align: middle;
                font-size: 13px;
                border-radius: 3px;
                line-height: 23px;
                background: #f1f1f1;
                margin: 0px 2px;
            }
            .te-pagination a:hover, .te-pagination strong {
                background: #936f0e;
                color: #fff;
            }
            .te-pagination {
                margin: 30px 0 30px 0;
            }
        /*end*/
        </style>