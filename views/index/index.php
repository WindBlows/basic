<!-- ============================================================= HEADER : END ============================================================= -->       <div id="top-banner-and-menu">
    <div class="container">
        
        <div class="col-xs-12 col-sm-4 col-md-3 sidemenu-holder">
            <!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown">
    <div class="head"><i class="fa fa-list"></i> 所有分类 </div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
        <ul class="nav">
<?php
    foreach($this->params['menu'] as $top) :
?>
            <li class="dropdown menu-item">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $top['title'] ?></a>
                <ul class="dropdown-menu mega-menu">
                    <li class="yamm-content">
                        <!-- ================================== MEGAMENU VERTICAL ================================== -->
<div class="row">
    <div class="col-xs-12 col-lg-4">
        <ul>
<?php foreach($top['children'] as $child): ?>
            <li><a href="<?php echo yii\helpers\Url::to(['product/index', 'cateid' => $child['cateid']]) ?>"><?php echo $child['title'] ?></a></li>
<?php endforeach; ?>
        </ul>
    </div>
    <div class="dropdown-banner-holder">
        <a href="#"><img alt="" src="/assets/images/banners/banner-side.png" /></a>
    </div>
</div>
<!-- ================================== MEGAMENU VERTICAL ================================== -->                        
                    </li>
                </ul>
            </li><!-- /.menu-item -->
<?php
    endforeach;
?>
           <!--<li><a href="http://themeforest.net/item/media-center-electronic-ecommerce-html-template/8178892?ref=shaikrilwan">Buy this Theme</a></li>-->
        </ul><!-- /.nav -->
    </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->     </div><!-- /.sidemenu-holder -->

        <div class="col-xs-12 col-sm-8 col-md-9 homebanner-holder">
            <!-- ========================================== SECTION – HERO ========================================= -->
            
<div id="hero">
    <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
        
        <div class="item" style="background-image: url(/assets/images/sliders/slider01.jpg);">
            <div class="container-fluid">
                <div class="caption vertical-center text-left">
                    <div class="big-text fadeInDown-1">
                        <span class="big"><span class="sign"></span></span>
                    </div>

                    <div class="excerpt fadeInDown-2">
                        <br>
                        <br>
                        
                    </div>
                    
                   
                </div><!-- /.caption -->
            </div><!-- /.container-fluid -->
        </div><!-- /.item -->



    </div><!-- /.owl-carousel -->
</div>
            
<!-- ========================================= SECTION – HERO : END ========================================= -->           
        </div><!-- /.homebanner-holder -->

    </div><!-- /.container -->
</div><!-- /#top-banner-and-menu -->

<!-- ========================================= HOME BANNERS ========================================= -->
<section id="banner-holder" class="wow fadeInUp">
    <div class="container">
        <div class="col-xs-12 col-lg-6 no-margin banner">
            <a href="category-grid.html">
                <div class="banner-text theblue">
                    <h1 style="font-family:'Microsoft Yahei';">尝尝鲜</h1>
                    <span class="tagline">查看最新分类</span>
                </div>
                <img class="banner-image" alt="" src="/assets/images/blank.gif" data-echo="/assets/images/banners/banner-narrow-01.jpg" />
            </a>
        </div>
        <div class="col-xs-12 col-lg-6 no-margin text-right banner">
            <a href="category-grid.html">
                <div class="banner-text right">
                    <h1 style="font-family:'Microsoft Yahei';">时尚流行</h1>
                    <span class="tagline">查看最新上架</span>
                </div>
                <img class="banner-image" alt="" src="/assets/images/blank.gif" data-echo="/assets/images/banners/banner-narrow-02.jpg" />
            </a>
        </div>
    </div><!-- /.container -->
</section><!-- /#banner-holder -->
<!-- ========================================= HOME BANNERS : END ========================================= -->
<div id="products-tab" class="wow fadeInUp">
    <div class="container">
        <div class="tab-holder">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" >
                <li class="active"><a href="#featured" data-toggle="tab">推荐商品</a></li>
                <li><a href="#new-arrivals" data-toggle="tab">最新上架</a></li>
                <li><a href="#top-sales" data-toggle="tab">最佳热卖</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="featured">
                    <div class="product-grid-holder">
                    <?php foreach ($data['tui'] as $pro): ?>
                        <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                            <div class="product-item">
                                <?php if ($pro->ishot): ?>
                                <div class="ribbon red"><span>HOT</span></div> 
                                <?php endif; ?>
                                <?php if ($pro->issale): ?>
                                <div class="ribbon green"><span>sale</span></div> 
                                <?php endif; ?>

                                <div class="image">
                                <img alt="<?php echo $pro->title ?>" src="<?php echo "http://" . $pro->cover ?>-index" data-echo="<?php echo "http://" . $pro->cover ?>-index" />
                                </div>
                                <div class="body">
                                    <div class="title">
                                    <a href="<?php echo yii\helpers\Url::to(['product/detail', 'productid' => $pro->productid]) ?>"><?php echo $pro->title ?></a>
                                    </div>
                                </div>
                                <div class="prices">
                                <div class="price-prev">￥<?php echo $pro->price ?></div>
                                <div class="price-current pull-right">￥<?php echo $pro->saleprice ?></div>
                                </div>

                                <div class="hover-area">
                                    <div class="add-cart-button">
                                    <a href="<?php echo yii\helpers\Url::to(['cart/add', 'productid' => $pro->productid]) ?>" class="le-button">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="#">
                            <i class="fa fa-plus"></i>
                            查看更多</a>
                    </div> 

                </div>
                <div class="tab-pane" id="new-arrivals">
                    <div class="product-grid-holder">
                    <?php foreach ($data['new'] as $pro): ?>
                        <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                            <div class="product-item">
                                <?php if ($pro->ishot): ?>
                                <div class="ribbon red"><span>HOT</span></div> 
                                <?php endif; ?>
                                <?php if ($pro->issale): ?>
                                <div class="ribbon green"><span>sale</span></div> 
                                <?php endif; ?>

                                <div class="image">
                                <img alt="<?php echo $pro->title ?>" src="<?php echo 'http://' . $pro->cover ?>-index" data-echo="<?php echo 'http://' . $pro->cover ?>-index" />
                                </div>
                                <div class="body">
                                    <div class="title">
                                    <a href="<?php echo yii\helpers\Url::to(['product/detail', 'productid' => $pro->productid]) ?>"><?php echo $pro->title ?></a>
                                    </div>
                                </div>
                                <div class="prices">
                                <div class="price-prev">￥<?php echo $pro->price ?></div>
                                <div class="price-current pull-right">￥<?php echo $pro->saleprice ?></div>
                                </div>

                                <div class="hover-area">
                                    <div class="add-cart-button">
                                    <a href="<?php echo yii\helpers\Url::to(['cart/add', 'productid' => $pro->productid]) ?>" class="le-button">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                    <div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="#">
                            <i class="fa fa-plus"></i>
                            查看更多</a>
                    </div> 

                </div>

                <div class="tab-pane" id="top-sales">
                    <div class="product-grid-holder">
                    <?php foreach ($data['hot'] as $pro): ?>
                        <div class="col-sm-4 col-md-3  no-margin product-item-holder hover">
                            <div class="product-item">
                                <?php if ($pro->ishot): ?>
                                <div class="ribbon red"><span>HOT</span></div> 
                                <?php endif; ?>
                                <?php if ($pro->issale): ?>
                                <div class="ribbon green"><span>sale</span></div> 
                                <?php endif; ?>

                                <div class="image">
                                <img alt="<?php echo $pro->title ?>" src="<?php echo 'http://' . $pro->cover ?>-index" data-echo="<?php echo 'http://' . $pro->cover ?>-index" />
                                </div>
                                <div class="body">
                                    <div class="title">
                                    <a href="<?php echo yii\helpers\Url::to(['product/detail', 'productid' => $pro->productid]) ?>"><?php echo $pro->title ?></a>
                                    </div>
                                </div>
                                <div class="prices">
                                <div class="price-prev">￥<?php echo $pro->price ?></div>
                                <div class="price-current pull-right">￥<?php echo $pro->saleprice ?></div>
                                </div>

                                <div class="hover-area">
                                    <div class="add-cart-button">
                                    <a href="<?php echo yii\helpers\Url::to(['cart/add', 'productid' => $pro->productid]) ?>" class="le-button">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                        
                    </div>
                    <div class="loadmore-holder text-center">
                        <a class="btn-loadmore" href="#">
                            <i class="fa fa-plus"></i>
                            查看更多</a>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ========================================= BEST SELLERS ========================================= -->

<!-- /#bestsellers -->
<!-- ========================================= BEST SELLERS : END ========================================= -->
<!-- ========================================= RECENTLY VIEWED ========================================= -->
<section id="recently-reviewd" class="wow fadeInUp">
    <div class="container">
        <div class="carousel-holder hover">
            
            <div class="title-nav">
                <h2 class="h1">所有商品</h2>
                <div class="nav-holder">
                    <a href="#prev" data-target="#owl-recently-viewed" class="slider-prev btn-prev fa fa-angle-left"></a>
                    <a href="#next" data-target="#owl-recently-viewed" class="slider-next btn-next fa fa-angle-right"></a>
                </div>
            </div><!-- /.title-nav -->

            <div id="owl-recently-viewed" class="owl-carousel product-grid-holder">
            <?php foreach($data['all'] as $pro): ?>
                <div class="no-margin carousel-item product-item-holder size-small hover">
                    <div class="product-item">
                        <?php if ($pro->ishot): ?>
                        <div class="ribbon red"><span>HOT</span></div> 
                        <?php endif; ?>
                        <?php if ($pro->issale): ?>
                        <div class="ribbon green"><span>sale</span></div> 
                        <?php endif; ?>

                        <div class="image">
                            <img alt="<?php echo $pro->title ?>" src="<?php echo "http://" . $pro->cover ?>-a1" data-echo="<?php echo "http://" . $pro->cover ?>-index3" />
                        </div>
                        <div class="body">
                            <div class="title">
                            <a href="<?php echo yii\helpers\Url::to(['product/detail', 'productid' => $pro->productid]) ?>"><?php echo $pro->title ?></a>
                            </div>
                        </div>
                        <div class="prices">
                        <div class="price-current text-right">￥<?php echo $pro->saleprice ?></div>
                        </div>
                        <div class="hover-area">
                            <div class="add-cart-button">
                                <a href="<?php echo yii\helpers\Url::to(['cart/add', 'productid' => $pro->productid]) ?>" class="le-button">加入购物车</a>
                            </div>
                        </div>
                    </div><!-- /.product-item -->
                </div><!-- /.product-item-holder -->
                <?php endforeach; ?>
            </div><!-- /#recently-carousel -->

        </div><!-- /.carousel-holder -->
    </div><!-- /.container -->
</section><!-- /#recently-reviewd -->
<!-- ========================================= RECENTLY VIEWED : END ========================================= -->
<!-- ========================================= TOP BRANDS ========================================= -->
<section id="top-brands" class="wow fadeInUp">
    <div class="container">
        <div class="carousel-holder" >
            
            <div class="title-nav">
                <h1>热门品牌</h1>
                <div class="nav-holder">
                    <a href="#prev" data-target="#owl-brands" class="slider-prev btn-prev fa fa-angle-left"></a>
                    <a href="#next" data-target="#owl-brands" class="slider-next btn-next fa fa-angle-right"></a>
                </div>
            </div><!-- /.title-nav -->
            
            <div id="owl-brands" class="owl-carousel brands-carousel">
                
                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="/assets/images/brands/brand-01.jpg" />
                    </a>
                </div><!-- /.carousel-item -->
                
                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="/assets/images/brands/brand-02.jpg" />
                    </a>
                </div><!-- /.carousel-item -->
                
                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="/assets/images/brands/brand-03.jpg" />
                    </a>
                </div><!-- /.carousel-item -->
                
                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="/assets/images/brands/brand-04.jpg" />
                    </a>
                </div><!-- /.carousel-item -->

                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="/assets/images/brands/brand-01.jpg" />
                    </a>
                </div><!-- /.carousel-item -->

                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="/assets/images/brands/brand-02.jpg" />
                    </a>
                </div><!-- /.carousel-item -->

                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="/assets/images/brands/brand-03.jpg" />
                    </a>
                </div><!-- /.carousel-item -->

                <div class="carousel-item">
                    <a href="#">
                        <img alt="" src="/assets/images/brands/brand-04.jpg" />
                    </a>
                </div><!-- /.carousel-item -->

            </div><!-- /.brands-caresoul -->

        </div><!-- /.carousel-holder -->
    </div><!-- /.container -->
</section><!-- /#top-brands -->
<!-- ========================================= TOP BRANDS : END ========================================= -->       <!-- ============================================================= FOOTER ============================================================= -->

