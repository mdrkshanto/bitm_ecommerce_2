<div class="header-middle">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3 col-7">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{asset('/')}}website/assets/images/logo/logo.svg" alt="Logo">
                </a>
            </div>
            <div class="col-lg-5 col-md-7 d-xs-none">

                <div class="main-menu-search">

                    <div class="navbar-search search-style-5">
                        <div class="search-select">
                            <div class="select-position">
                                <select id="select1">
                                    <option selected>All</option>
                                    <option value="1">option 01</option>
                                    <option value="2">option 02</option>
                                    <option value="3">option 03</option>
                                    <option value="4">option 04</option>
                                    <option value="5">option 05</option>
                                </select>
                            </div>
                        </div>
                        <div class="search-input">
                            <input type="text" placeholder="Search">
                        </div>
                        <div class="search-btn">
                            <button><i class="lni lni-search-alt"></i></button>
                        </div>
                    </div>

                </div>

            </div>
            <div class="col-lg-4 col-md-2 col-5">
                <div class="middle-right-area">
                    <div class="nav-hotline">
                        <i class="lni lni-phone"></i>
                        <h3>Hotline:
                            <span>(+100) 123 456 7890</span>
                        </h3>
                    </div>
                    <div class="navbar-cart">
                        <div class="wishlist">
                            <a href="javascript:void(0)">
                                <i class="lni lni-heart"></i>
                                <span class="total-items">0</span>
                            </a>
                        </div>
                        <div class="cart-items">
                            <a href="javascript:void(0)" class="main-btn">
                                <i class="lni lni-cart"></i>
                                <span class="total-items">2</span>
                            </a>

                            <div class="shopping-item">
                                <div class="dropdown-cart-header">
                                    <span>2 Items</span>
                                    <a href="{{route('cart')}}">View Cart</a>
                                </div>
                                <ul class="shopping-list">
                                    <li>
                                        <a href="javascript:void(0)" class="remove" title="Remove this item"><i class="lni lni-close"></i></a>
                                        <div class="cart-img-head">
                                            <a class="cart-img" href="product-details.html"><img src="{{asset('/')}}website/assets/images/header/cart-items/item1.jpg" alt="#"></a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="product-details.html">
                                                    Apple Watch Series 6</a></h4>
                                            <p class="quantity">1x - <span class="amount">$99.00</span></p>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="remove" title="Remove this item"><i class="lni lni-close"></i></a>
                                        <div class="cart-img-head">
                                            <a class="cart-img" href="product-details.html"><img src="{{asset('/')}}website/assets/images/header/cart-items/item2.jpg" alt="#"></a>
                                        </div>
                                        <div class="content">
                                            <h4><a href="product-details.html">Wi-Fi Smart Camera</a></h4>
                                            <p class="quantity">1x - <span class="amount">$35.00</span></p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="bottom">
                                    <div class="total">
                                        <span>Total</span>
                                        <span class="total-amount">$134.00</span>
                                    </div>
                                    <div class="button">
                                        <a href="{{route('checkout')}}" class="btn animate">Checkout</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
