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
                        <div class="text-wrapper-3">Logistic Name</div>
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
                          <div class="overlap-group-3">
                            <div class="text-wrapper-9">2025-01-14 / 2025-01-15</div>
                          </div>
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
                                <th>Product Image</th>
                                <th>Quantity</th>
                                <th>Price per Item</th>
                                <th>Total Price</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if ($shoppingCart)
                                @foreach ($shoppingCart->shoppingCartDetails as $item)
                                  <tr>
                                    <td>{{ $item->product->productName }}</td>
                                    <td><img src="{{ asset('images/' . $item->product->productImage) }}" alt="{{ $item->product->productName }}" width="100"></td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>${{ number_format($item->product->productPrice, 2) }}</td>
                                    <td>${{ number_format($item->quantity * $item->product->productPrice, 2) }}</td>
                                  </tr>
                                @endforeach
                              @else
                                <tr><td colspan="5">No items in the cart.</td></tr>
                              @endif
                            </tbody>
                          </table>
                        </div>

                        <div class="text-wrapper-14">Total</div>
                        <div class="text-wrapper-15">
                          IDR {{ number_format($shoppingCart->totalPrice, 2) }}
                        </div>
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

        </div>
      </div>
    </div>
  </body>
</html>
