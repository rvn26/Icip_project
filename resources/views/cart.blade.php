<x-app-layout>
    {{-- <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <h2 class="page-title">Cart</h2>
            <div class="checkout-steps">
                <a href="javascript:void(0)" class="checkout-steps__item active">
                    <span class="checkout-steps__item-number">01</span>
                    <span class="checkout-steps__item-title">
                        <span>Shopping Bag</span>
                        <em>Manage Your Items List</em>
                    </span>
                </a>
                <a href="javascript:void(0)" class="checkout-steps__item">
                    <span class="checkout-steps__item-number">02</span>
                    <span class="checkout-steps__item-title">
                        <span>Shipping and Checkout</span>
                        <em>Checkout Your Items List</em>
                    </span>
                </a>
                <a href="order-confirmation.html" class="checkout-steps__item">
                    <span class="checkout-steps__item-number">03</span>
                    <span class="checkout-steps__item-title">
                        <span>Confirmation</span>
                        <em>Review And Submit Your Order</em>
                    </span>
                </a>
            </div>
            <div class="shopping-cart">
                @if ($items->count()>0)
                <div class="cart-table__wrapper">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th></th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="shopping-cart__product-item">
                                        <img loading="lazy" src="assets/images/cart-item-1.jpg" width="120" height="120"
                                            alt="" />
                                    </div>
                                </td>
                                <td>
                                    <div class="shopping-cart__product-item__detail">
                                        <h4>Zessi Dresses</h4>
                                        <ul class="shopping-cart__product-item__options">
                                            <li>Color: Yellow</li>
                                            <li>Size: L</li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <span class="shopping-cart__product-price">$99</span>
                                </td>
                                <td>
                                    <div class="qty-control position-relative">
                                        <input type="number" name="quantity" value="3" min="1"
                                            class="qty-control__number text-center">
                                        <div class="qty-control__reduce">-</div>
                                        <div class="qty-control__increase">+</div>
                                    </div>
                                </td>
                                <td>
                                    <span class="shopping-cart__subtotal">$297</span>
                                </td>
                                <td>
                                    <a href="#" class="remove-cart">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                            <path
                                                d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="shopping-cart__product-item">
                                        <img loading="lazy" src="assets/images/cart-item-2.jpg" width="120" height="120"
                                            alt="" />
                                    </div>
                                </td>
                                <td>
                                    <div class="shopping-cart__product-item__detail">
                                        <h4>Kirby T-Shirt</h4>
                                        <ul class="shopping-cart__product-item__options">
                                            <li>Color: Yellow</li>
                                            <li>Size: L</li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <span class="shopping-cart__product-price">$99</span>
                                </td>
                                <td>
                                    <div class="qty-control position-relative">
                                        <input type="number" name="quantity" value="3" min="1"
                                            class="qty-control__number text-center">
                                        <div class="qty-control__reduce">-</div>
                                        <div class="qty-control__increase">+</div>
                                    </div>
                                </td>
                                <td>
                                    <span class="shopping-cart__subtotal">$297</span>
                                </td>
                                <td>
                                    <a href="#" class="remove-cart">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                            <path
                                                d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="shopping-cart__product-item">
                                        <img loading="lazy" src="assets/images/cart-item-3.jpg" width="120" height="120"
                                            alt="" />
                                    </div>
                                </td>
                                <td>
                                    <div class="shopping-cart__product-item__detail">
                                        <h4>Cobleknit Shawl</h4>
                                        <ul class="shopping-cart__product-item__options">
                                            <li>Color: Yellow</li>
                                            <li>Size: L</li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    <span class="shopping-cart__product-price">$99</span>
                                </td>
                                <td>
                                    <div class="qty-control position-relative">
                                        <input type="number" name="quantity" value="3" min="1"
                                            class="qty-control__number text-center">
                                        <div class="qty-control__reduce">-</div>
                                        <div class="qty-control__increase">+</div>
                                    </div>
                                </td>
                                <td>
                                    <span class="shopping-cart__subtotal">$297</span>
                                </td>
                                <td>
                                    <a href="#" class="remove-cart">
                                        <svg width="10" height="10" viewBox="0 0 10 10" fill="#767676"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M0.259435 8.85506L9.11449 0L10 0.885506L1.14494 9.74056L0.259435 8.85506Z" />
                                            <path
                                                d="M0.885506 0.0889838L9.74057 8.94404L8.85506 9.82955L0 0.97449L0.885506 0.0889838Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-table-footer">
                        <form action="#" class="position-relative bg-body">
                            <input class="form-control" type="text" name="coupon_code" placeholder="Coupon Code">
                            <input class="btn-link fw-medium position-absolute top-0 end-0 h-100 px-4" type="submit"
                                value="APPLY COUPON">
                        </form>
                        <button class="btn btn-light">UPDATE CART</button>
                    </div>
                </div>
                <div class="shopping-cart__totals-wrapper">
                    <div class="sticky-content">
                        <div class="shopping-cart__totals">
                            <h3>Cart Totals</h3>
                            <table class="cart-totals">
                                <tbody>
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>$1300</td>
                                    </tr>
                                    <tr>
                                        <th>Shipping</th>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input form-check-input_fill" type="checkbox"
                                                    value="" id="free_shipping">
                                                <label class="form-check-label" for="free_shipping">Free
                                                    shipping</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input form-check-input_fill" type="checkbox"
                                                    value="" id="flat_rate">
                                                <label class="form-check-label" for="flat_rate">Flat rate: $49</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input form-check-input_fill" type="checkbox"
                                                    value="" id="local_pickup">
                                                <label class="form-check-label" for="local_pickup">Local pickup:
                                                    $8</label>
                                            </div>
                                            <div>Shipping to AL.</div>
                                            <div>
                                                <a href="#" class="menu-link menu-link_us-s">CHANGE ADDRESS</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>VAT</th>
                                        <td>$19</td>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <td>$1319</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mobile_fixed-btn_wrapper">
                            <div class="button-wrapper container">
                                <a href="checkout.html" class="btn btn-primary btn-checkout">PROCEED TO CHECKOUT</a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="row">
                    <div class="columns-md text-center pt-5 bp-5">
                        <p>Tidak ada Item dalam keranjang</p>
                        <a href="{{ route('shop') }}" class="btn btn-info">Belanja Sekarang</a>
                    </div>
                </div>
                @endif

            </div>
        </section>
    </main> --}}
    {{-- <aside aria-label="Shopping cart"
        class="fixed top-0 right-0 h-full w-full max-w-md bg-white shadow-lg transform translate-x-full transition-transform duration-300 ease-in-out z-50 flex flex-col"
        id="cart-sidebar">
        <div class="flex items-center justify-between p-4 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-800">Shopping Cart</h2>
            <button aria-label="Close cart"
                class="text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded"
                id="close-cart">
                <i class="fas fa-times fa-lg"> </i>
            </button>
        </div>
        <div class="flex-grow overflow-y-auto p-4 space-y-4" id="cart-items" tabindex="0">
            <p class="text-gray-500 text-center">Your cart is empty.</p>
        </div>
        <div class="p-4 border-t border-gray-200">
            <div class="flex justify-between items-center mb-4">
                <span class="text-lg font-semibold text-gray-800"> Total: </span>
                <span class="text-lg font-bold text-indigo-600" id="cart-total">
                    $0.00
                </span>
            </div>
            <button
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded disabled:opacity-50 disabled:cursor-not-allowed"
                disabled="" id="checkout-button">
                Checkout
            </button>
        </div>
    </aside> --}}
    <div class="pt-16 min-h-screen flex items-center justify-center">
        <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-4 border-b border-gray-200 flex justify-center items-center">
                <h2 class="text-xl text-center font-semibold text-gray-800">Shopping Cart</h2>
                {{-- <a href="{{}}"
                    class="text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded">
                    <i class="fas fa-times fa-lg"></i>
                </a> --}}
            </div>
            @if ($items->count()>0)
                
                @foreach ($items as $item )
                <div class="flex items-center space-x-4 border rounded p-2 bg-gray-50" style="max-height: 500px;">
                    <img src="{{ asset('uploads/barang') }}/{{ $item->model->gambar }}"
                        alt="{{ $item->name }}" class="w-16 h-16 object-cover rounded flex-shrink-0">
                    <div class="flex-grow">
                        <p class="font-semibold text-gray-800">{{ $item->name }}</p>
                        <p class="text-indigo-600 font-bold">Rp.{{ $item->qty }}</p>
                    </div>
                    <div class="flex items-center space-x-1">
                        <button
                            class="text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded p-1"
                            aria-label="Decrease quantity of Bluetooth Speaker">
                            <i class="fas fa-minus"></i>
                        </button>
                        <span class="w-6 text-center font-medium text-gray-800">{{$item->price}}</span>
                        <button
                            class="text-gray-600 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded p-1"
                            aria-label="Increase quantity of Bluetooth Speaker">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <button
                        class="text-red-600 hover:text-red-800 focus:outline-none focus:ring-2 focus:ring-red-500 rounded p-1 ml-2"
                        aria-label="Remove Bluetooth Speaker from cart">
                        <i class="fas fa-trash-alt">
                        </i>
                    </button>
                </div>
                @endforeach
            @else
                <div class="p-4 space-y-4 overflow-y-auto max-h-96" id="cart-items" style="max-height: 500px;">
                    <p class="text-gray-500 text-center">Your cart is empty.</p>
                    <div class="flex justify-center">
                        <a class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-md font-semibold text-lg hover:bg-blue-700 transition w-fit"
                           href="{{ route('shop') }}">
                           Shop Now
                        </a>
                      </div>
                 
                </div>
            @endif
            <div class="p-4 border-t border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <span class="text-lg font-semibold text-gray-800">Total:</span>
                    <span class="text-lg font-bold text-indigo-600" id="cart-total"></span>
                </div>
                <button
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded disabled:opacity-50 disabled:cursor-not-allowed"
                    disabled id="checkout-button">
                    Checkout
                </button>
            </div>
        </div>
    </div>

</x-app-layout>