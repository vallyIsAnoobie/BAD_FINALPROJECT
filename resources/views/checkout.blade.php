<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{ asset('css/checkout.css') }}" />
  </head>
  <body>
    <div class="checkout-page">
      <div class="group-wrapper">
        <div class="group">
          <div class="overlap-wrapper">
            <div class="overlap">
              <div class="overlap-group">
                <div class="text-wrapper">Checkout</div>
                <div class="overlap-group-wrapper">
                  <div class="div">
                    <div class="group-2">
                      <div class="text-wrapper-2">#shippingID</div>
                      <img class="line" src="{{ asset('img/checkout/Line 20.png') }}" />
                    </div>
                    <div class="group-3">
                    <div class="group-4">
                        
                    <div class="text-wrapper-3">Logistic Name </div>
                    <div class="div-wrapper">
                        <div class="overlap-group-2">
                        <input type="text" class="text-input" value="Grab/Gocar" required />
                        </div>
                    </div>
                    </div>

                      <div class="group-5">
                    <div class="text-wrapper-5">Shipping Type</div>
                    <div class="group-6">
                        <div class="group-7">
                        <input type="radio" id="shipping-standard" name="shipping-type" value="Standard" />
                        <label for="shipping-standard" class="text-wrapper-6">Standard</label>
                        </div>
                        <div class="group-8">
                        <input type="radio" id="shipping-express" name="shipping-type" value="Express" />
                        <label for="shipping-express" class="text-wrapper-7">Express</label>
                        </div>
                    </div>
                    </div>

                      <div class="group-9">
                        <div class="text-wrapper-8">Shipping Date</div>
                        <div class="group-10">
                          <div class="overlap-group-3"><div class="text-wrapper-9">2025-01-14 / 2025-01-15</div></div>
                        </div>
                      </div>

                      <div class="group-11">
                        <div class="text-wrapper-10">Price</div>
                        <div class="group-12">
                          <div class="overlap-2">
                            <div class="group-13">
                              <div class="line-wrapper"><img class="img" src="img/line-19.svg" /></div>
                            </div>
                            <div class="group-14">
                              <div class="text-wrapper-11">IDR</div>
                              <div class="text-wrapper-12"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="group-15">
                  <div class="group-16">
                    <div class="overlap-3">
                      <div class="text-wrapper-13">#OrderDetailID</div>
                      <div class="overlap-4">


                      <div class="table-responsive">
          <!-- Shopping Cart Items Table -->
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product ID</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>Price per Item</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
           <!-- checkout.blade.php -->

@if ($shoppingCart)
    <h1>Checkout</h1>
    <p>Customer ID: {{ $shoppingCart->customerID }}</p>
    <p>Total Price: ${{ number_format($shoppingCart->totalPrice, 2) }}</p>

    <h2>Shopping Cart Details</h2>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product ID</th>
                <th>Product Image</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shoppingCart->shoppingCartDetails as $item)
                <tr>
                    <td>{{ $item->product->productName }}</td> <!-- Assuming 'product' relationship -->
                    <td>{{ $item->product->productID }}</td> <!-- Assuming 'product' relationship -->
                    <td><img src="{{ asset('images/' . $item->product->productImage) }}" alt="{{ $item->product->productName }}" width="100"></td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->product->productPrice, 2) }}</td>
                    <td>${{ number_format($item->quantity * $item->product->productPrice, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No shopping cart found.</p>
@endif

        </tbody>
    </table>
        

        </div>


                        <div class="text-wrapper-14">Total</div>
                        <div class="text-wrapper-15">100000</div>
                      </div>
                      <div class="group-17">
                        <div class="overlap-5">
                          <img class="line-2" src="{{ asset('img/checkout/Line 7.png') }}" />
                          <div class="group-18">
                            <div class="overlap-group-4">
                              <div class="ellipse"></div>
                              <div class="ellipse-2"></div>
                              <div class="ellipse-3"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <img class="line-3" src="{{ asset('img/checkout/Line 20.png') }}" />
                     
                      <div class="group-19">
                    <div class="text-wrapper-3">Payment Method</div>
                    <div class="group-20">
                        <select class="payment-method-dropdown">
                        <option value="bank">Bank</option>
                        <option value="e-payment">E-Payment</option>
                        </select>
                    </div>
                    </div>


                    </div>
                  </div>
                  <div class="group-22">
                <button class="checkout-button">Check Out</button>
                </div>

                </div>
              </div>
              <div class="group-23">
                <div class="overlap-8">
                  <div class="group-24">

                  <div class="group-25">
                <div class="text-wrapper-18">Order Notes</div>
                <div class="group-26">
                    <div class="overlap-group-5">
                    <input type="text" class="order-notes-input" placeholder="" />
                    </div>
                </div>
                </div>

                <div class="group-27">
                    <div class="text-wrapper-19">Purpose</div>
                    <div class="group-28">
                        <div class="overlap-group-6">
                        <input type="text" class="purpose-input" value="" onclick="hideInput(this)" />
                        </div>
                    </div>
                    </div>


                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="group-29">
            <div class="group-30">
              <img class="maison-burro-logo" src="{{ asset('img/checkout/Maison Burro Logo Blue 1.png') }}" />
              <div class="group-31">
                <div class="overlap-9">
                  <img class="line-4" src="{{ asset('img/checkout/Line 7.png') }}" />
                  <div class="group-32">
                    <div class="overlap-group-7">
                      <div class="ellipse-4"></div>
                      <div class="ellipse-5"></div>
                      <div class="ellipse-6"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-wrapper-21">Cart / Checkout</div>
            <div class="group-33">
              <div class="text-wrapper-22">Back</div>
              <div class="group-34">
                <div class="overlap-10">
                  <div class="group-35">
                    <div class="arrow-wrapper"><img class="arrow" src="{{ asset('img/checkout/Group 631977.png') }}" /></div>
                  </div>
                  <div class="group-36">
                    <div class="overlap-11">
                      <img class="ellipse-7" src="{{ asset('img/checkout/Group 631981.png') }}" />
                      <div class="group-37">
                        <div class="overlap-group-8">
                          <div class="group-38">
                            <img class="ellipse-8" src="{{ asset('img/checkout/Ellipse 2700.png') }}" />
                            <img class="ellipse-9" src="{{ asset('img/checkout/Ellipse 2701.png') }}" />
                            <img class="vector-2" src="{{ asset('img/checkout/Vector 2582.png') }}" />
                          </div>
                        </div>
                      </div>
                      <div class="ellipse-10"></div>
                      <div class="ellipse-11"></div>
                      <img class="group-39" src="{{ asset('img/checkout/Group 631897.png') }}" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
