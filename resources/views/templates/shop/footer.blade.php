<footer class="site-footer"> <span id="scroll-top"><i class="fa fa-angle-double-left" aria-hidden="true"></i> </span>
    <div class="newsletter">
        <div class="container">
            <div class="newsletter-title">
                <h3>Sign Up for Newsletters</h3>
                <p>Get weekly updates about our latest shop and special offers</p>
            </div>
            <div class="newsletter-field">
                <form action="" method="get"  class="input-group" id="role">
                    <input placeholder="Enter your email address" name="sub_name"  class="txt-newsletter" aria-label="email@example.com"  type="email">
                    <input class="btn btn--large send" name="subscribe" value="Sign Up" type="submit">
                </form>
            </div>

            <script>
                $(document).on('click', '.send', function() {
                        alert('Wellcome')
                    var sub_name=$("input[name='sub_name']").val();
                        $.ajax({
                            url:'{{route("shop.sub")}}',
                            type: 'get',
                            data: {"sub_name":sub_name}
                        })

                });
                $( document ).ready( function () {

                    $( "#role" ).validate( {
                        ignore: [],
                        debug: false,
                        rules: {
                            sub_name: {
                                required: true,
                            },
                        },
                        messages: {
                            sub_name: {
                                required: "Vui lòng nhập vào đây",
                            },
                        },
                    });
                });
            </script>
        </div>
    </div>
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-sm-3 footer-links">
                    <h3>Quick Shop</h3>
                    <ul>
                        <li><a href="collections.html">Collections</a></li>
                        <li><a href="#">All Products</a></li>
                        <li><a href="#">New Arrivals</a></li>
                        <li><a href="#">Trending Products</a></li>
                        <li><a href="#">Special Offers</a></li>
                        <li><a href="#">Electronics</a></li>
                        <li><a href="#">Beauty</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 footer-links">
                    <h3>Information</h3>
                    <ul>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="search-result.html">Search</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Addtional Information</a></li>
                        <li><a href="lookbook.html">Lookbook</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 footer-links">
                    <h3>Customer Services</h3>
                    <ul>
                        <li><a href="contact.html">Contact Us </a></li>
                        <li><a href="#">Customer Service</a></li>
                        <li><a href="#">Orders &amp; Returns</a></li>
                        <li><a href="faq.html">Help &amp; FAQs</a></li>
                        <li><a href="#">Custom Link</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 contactbox last">
                    <h3>Contact Us</h3>
                    <ul class="addressFooter">
                        <li> <i class="fa fa-map-marker"></i>
                            <p>Phạm Như Xương</p>
                        </li>
                        <li class="phone"><i class="fa fa-phone-square"></i>
                            <p> </p>
                            <p> +0983030495</p>
                        </li>
                        <li class="email"><i class="fa fa-envelope"></i>
                            <p>mrphong678@gmail.com</p>
                        </li>
                    </ul>
                    <h3>Stay Connected to have suceess</h3>
                    <ul class="social">
                        <li class="facebook"><a href="#" title="NexGeek on Facebook" target="_blank"><i aria-hidden="true" class="fa fa-facebook "></i> </a> </li>
                        <li class="twitter"><a href="#" title="NexGeek on Twitter"  target="_blank"><i aria-hidden="true" class="fa fa-twitter "></i> </a> </li>
                        <li class="google"><a href="#" title="NexGeek on Google +"  target="_blank"><i aria-hidden="true" class="fa fa-google-plus "></i> </a> </li>
                        <li class="instagram"><a href="#" title="NexGeek on Instagram"  target="_blank"><i aria-hidden="true" class="fa fa-instagram "></i> </a> </li>
                        <li class="rss"><a href="#" title="NexGeek on Rss"  target="_blank"><i aria-hidden="true" class="fa fa fa-rss "></i> </a> </li>
                        <li class="pinterest"><a href="#" title="NexGeek on Pinterest"  target="_blank"><i aria-hidden="true" class="fa fa-pinterest-p "></i> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row">
                <div class="col-md-6"> &copy; 2017 NexGeek. All Rights Reserved. Ecommerce Multipurpose Template by AdornThemes.<br>
                    Designed by <a href="http://adornthemes.com/" target="_blank">AdornThemes.com  </a> edit by Lưu Quốc Phong. </div>
                <div class="col-md-6 text-right">
                    <div id="payment-methods"> <i class="fa fa-cc-visa" aria-hidden="true"></i> <i class="fa fa-cc-amex" aria-hidden="true"></i> <i class="fa fa-cc-mastercard" aria-hidden="true"></i> <i class="fa fa-cc-discover" aria-hidden="true"></i> <i class="fa fa-cc-paypal" aria-hidden="true"></i> </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- NEWSLETTER MODEL -->
<div class="newsletter-wrap">
    <div id="newsletter-modal" class="animated fadeInDown">
        <button type="button" class="closepopup">×</button>
        <!-- Modal content-->
        <div class="row-table">
            <div class="row-cell last"><img src="{{$publicUrl}}/images/newsletter.jpg" alt=""> </div>
            <div class="row-cell first">
                <div class="newsletter-left">
                    <h1>Join Our Mailing List</h1>
                    <p>Sign Up for our exclusive email list and be the first to know about new products and special offers </p>
                    <form action="http://adornthemes.com/" method="post"  target="_blank" class="input-group">
                        <input placeholder="Enter your email address" name="EMAIL"  class="txt-newsletter" aria-label="email@example.com" type="email">
                        <input class="btn btn--large" name="subscribe"  value="Sign Up" type="submit">
                    </form>
                    <ul class="social">
                        <li class="facebook"><a href="#" title="NexGeek on Facebook" target="_blank"><i aria-hidden="true" class="fa fa-facebook "></i> </a> </li>
                        <li class="twitter"><a href="#" title="NexGeek on Twitter" target="_blank"><i aria-hidden="true" class="fa fa-twitter "></i> </a> </li>
                        <li class="google"><a href="#" title="NexGeek on Google +" target="_blank"><i aria-hidden="true" class="fa fa-google-plus "></i> </a> </li>
                        <li class="instagram"><a href="#" title="NexGeek on Instagram" target="_blank"><i aria-hidden="true" class="fa fa-instagram "></i> </a> </li>
                        <li class="rss"><a href="#" title="NexGeek on Rss" target="_blank"><i aria-hidden="true" class="fa fa fa-rss "></i> </a> </li>
                        <li class="pinterest"><a href="#" title="NexGeek on Pinterest" target="_blank"><i aria-hidden="true" class="fa fa-pinterest-p "></i> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- QUICK VIEW POPUP -->
<div id="quickView" class="modal fade quickView" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <button type="button" class="close-modal" data-dismiss="modal">&times;</button>
            <div class="modal-body">
                <div class="quick-view-container">
                    <div class="quickview-left">
                        <div class="qv-hidden on-sale">Sale</div>
                        <div class="product-single_photos"> <img class="ProductPhotoImg" src="{{$publicUrl}}/images/products/product-1-large-1.jpg" alt=""> </div>
                        <!-- 	PRODUCT THUMBNAIL -->
                        <div class="ProductThumbs">
                            <div class="product-single_thumbnails owl-carousel">
                                <div class="item"> <a href="{{$publicUrl}}/images/products/product-1-large-1.jpg" data-image="{{$publicUrl}}/images/products/product-1-large-1.jpg" data-zoom-image="{{$publicUrl}}/images/products/product-1-large-1.jpg" class="product-single_thumbnail"> <img src="{{$publicUrl}}/images/product-thumb/product-1-thumb-1.jpg" alt=""> </a> </div>
                                <div class="item"> <a href="{{$publicUrl}}/images/products/product-1-large-2.jpg" data-image="{{$publicUrl}}/images/products/product-1-large-2.jpg" data-zoom-image="{{$publicUrl}}/images/products/product-1-large-2.jpg" class="product-single_thumbnail"> <img src="{{$publicUrl}}/images/product-thumb/product-1-thumb-2.jpg" alt=""> </a> </div>
                                <div class="item"> <a href="{{$publicUrl}}/images/products/product-1-large-3.jpg" data-image="{{$publicUrl}}/images/products/product-1-large-3.jpg" data-zoom-image="{{$publicUrl}}/images/products/product-1-large-3.jpg" class="product-single_thumbnail"> <img src="{{$publicUrl}}/images/product-thumb/product-1-thumb-22.jpg" alt=""> </a> </div>
                                <div class="item"> <a href="{{$publicUrl}}/images/products/product-1-large-4.jpg" data-image="{{$publicUrl}}/images/products/product-1-large-4.jpg" data-zoom-image="{{$publicUrl}}/images/products/product-1-large-4.jpg" class="product-single_thumbnail"> <img src="{{$publicUrl}}/images/product-thumb/product-1-thumb-3.jpg" alt=""> </a> </div>
                                <div class="item"> <a href="{{$publicUrl}}/images/products/product-1-large-5.jpg" data-image="{{$publicUrl}}/images/products/product-1-large-5.jpg" data-zoom-image="{{$publicUrl}}/images/products/product-1-large-5.jpg" class="product-single_thumbnail"> <img src="{{$publicUrl}}/images/product-thumb/product-1-thumb-4.jpg" alt=""> </a> </div>
                            </div>
                        </div>
                    </div>
                    <div class="quickview-right">
                        <h1><strong>10% OFF Philips HP6419/02 Women Epilator (White)</strong></h1>
                        <span class="qv-product-price sale_price qv-hidden"> $400.00 &nbsp; <del class="qv-product-compare-price old_price">$429.00</del> </span> <span class="qv-product-price product_price">$30.00</span>
                        <p>Lorem Ipsum este pur şi simplu o machetă pentru text a industriei tipografice. Lorem Ipsum a fost macheta standard a industriei încă din secolul al XVI-lea, când un tipograf anonim.. </p>
                        <p><a id="qv-detail" href="http://adornthemes.com/products/10-off-philips-hp6419-02-women-epilator-white"> View full product details <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></p>
                        <form  method="post">
                            <div class="qv-product-options">
                                <div class="qv-row">
                                    <label>Size</label>
                                    <select>
                                        <option value="S">S</option>
                                        <option value="L">L</option>
                                    </select>
                                </div>
                                <div class="qv-row">
                                    <label>Color</label>
                                    <select>
                                        <option value="Pink">Pink</option>
                                        <option value="Blue">Blue</option>
                                        <option value="Red">Red</option>
                                    </select>
                                </div>
                                <div class="qv-row">
                                    <label>Quantity</label>
                                    <div class="input-group spinner number">
                                        <button class="spinbtn btnminus" type="button"><span aria-hidden="true" class="icon icon-minus"></span></button>
                                        <input type="text" class="txt-qty" value="1">
                                        <button class="spinbtn btnplus" type="button"><span aria-hidden="true" class="icon icon-plus"></span></button>
                                    </div>
                                    <input class="qv-cartbtn btn" value="ADD TO CART" type="submit">
                                    <input class="qv-cartbtn btn  qv-hidden" value="ADD TO CART" type="submit" disabled>
                                </div>
                                <div class="qv-row">
                                    <p class="qv-sold-out qv-hidden">Sold Out</p>
                                </div>
                                <div class="qv-row">
                                    <div class="qv-addcart-msg qv-hidden"> Item added to cart! <a href="cart.html">View Cart</a>.</div>
                                    <div class="qv-addcart-msg qv-hidden"> This product is already in your <a href="cart.html">Cart</a>.</div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- SITE SCRIPT -->
<script src="{{$publicUrl}}/js/fastclick.js" type="text/javascript"></script>
<script src="{{$publicUrl}}/js/bootstrap.js" type="text/javascript"></script>
<script src="{{$publicUrl}}/js/bootstrap-tabcollapse.js" type="text/javascript"></script>
<script src="{{$publicUrl}}/js/owl.js" type="text/javascript"></script>
<script src="{{$publicUrl}}/js/js.cookie.js" type="text/javascript"></script>
<script src="{{$publicUrl}}/js/theme-setting.js" type="text/javascript"></script>
<script src="{{$publicUrl}}/js/myjs.js" type="text/javascript"></script>
</div>
</body>

<!-- Mirrored from adornthemes.com/html/nexgeek/product-listing.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Aug 2017 05:43:32 GMT -->
</html>