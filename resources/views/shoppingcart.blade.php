<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Kalam:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
  </head>
  <body>
    <div class="empty-shopping-cart">
      <div class="div">
        <img class="maison-burro-logo" src="img/maison burro logo blue 1.png" />
        <div class="overlap">
          <div class="group">
            <div class="page">
              <a href="{{ route('home') }}" class="text-wrapper">Home</a>                     
            </div>
            <div class="home-wrapper">
              <a href="{{ route('menu') }}" class="home">Menu</a>
            </div>
            <div class="div-wrapper">
              <a href="{{ route('order') }}" class="home-2">Orders</a>
            </div>
            <div class="page-2">
              <a href="{{ route('merchandise') }}" class="home-3">Merchandise</a>
            </div>
          </div>
        </div>
        <div class="group-2">
          <img class="img" src="img/group 631796 1.png" />
          <div class="group-wrapper">
            <div class="group-3">
              @if(!empty($firstName))
                <div class="text-wrapper-2">{{ $firstName }}</div>
              @else
                Login
              @endif
            </div>
          </div>
        </div>
        <div class="group-4">
          <img class="group-5" src="img/group 631785 1.png" />
          <div class="group-6">
            <div class="text-wrapper-3">Cart</div>
          </div>
        </div>
        <footer class="footer">
          <div class="overlap-group">
            <img class="sidelogo" src="img/group 631786.png" />
            <div class="group-8">
              <div class="text-wrapper-4">Pre-order</div>
              <div class="text-wrapper-5">Menu</div>
              <div class="text-wrapper-6">Merchandise</div>
              <div class="text-wrapper-7">Shopping Cart</div>
            </div>
            <div class="group-9">
              <div class="text-wrapper-8">Delivery</div>
              <div class="text-wrapper-9">Special Event</div>
              <div class="text-wrapper-10">Feedbacks</div>
              <div class="text-wrapper-11">Online Popup</div>
            </div>
            <div class="group-10">
              <div class="overlap-group-wrapper">
                <div class="overlap-group-2">
                  <div class="text-wrapper-12">Contact Us</div>
                </div>
              </div>
              <div class="text-wrapper-13">+62 877-7000-8204</div>
              <div class="text-wrapper-14">maisonburro@gmail.com</div>
              <div class="follow">FOLLOW US!</div>
              <img class="socialz" src="img/Group 631931.png"/>
            </div>
            <img class="maison-burro-logo-2" src="img/maison burro logo white 1.png" />
          </div>
        </footer>

        <div class="text-wrapper-15">Your Cart</div>
        <div class="overlap-2">
          @if (isset($shoppingCartDetails))
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <tbody>
                  @foreach ($shoppingCartDetails as $index => $detail)
                    <tr>
                      <td>{{ $index + 1 }}</td>
                      <td>{{ $detail->productName }}</td>
                      <td>{{ $detail->quantity }}</td>

                      <td>${{ number_format($detail->quantity * $detail->productPrice, 2) }}</td>

                      <td>
  <img src="data:image/jpeg;base64,{{ $detail->productImage }}" alt="{{ $detail->productName }}" style="width: 110px; height: 110px; border-radius: 25%; border: 2px solid #20394a;">
</td>
                      <td>${{ number_format($detail->productPrice, 2) }}</td>

                      <td>
                        <form action="{{ route('updateCart') }}" method="POST" style="display: inline;">
                          @csrf
                          <input type="hidden" name="action" value="decrease">
                          <input type="hidden" name="detail_id" value="{{ $detail->detailID }}">
                          <button type="submit" class="btn btn-danger btn-sm">-</button>
                        </form>
                        {{ $detail->quantity }}
                        <form action="{{ route('updateCart') }}" method="POST" style="display: inline;">
                          @csrf
                          <input type="hidden" name="action" value="increase">
                          <input type="hidden" name="detail_id" value="{{ $detail->detailID }}">
                          <button type="submit" class="btn btn-success btn-sm">+</button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @else

            <div class="group-12">
              <div class="overlap-3">
                <div class="overlap-4">
                  <img class="vector" src="img/Group 631941.png" />
                </div>
              </div>
              <p class="p">Add some items to cheer it up</p>
              <div class="text-wrapper-16">Your cart is lonely</div>
            </div>  
          @endif      
        </div>
        <div class="overlap-6">
          <div class="text-wrapper-17">Shopping Cart</div>
        </div>
        <div class="overlap-7">
          <div class="text-wrapper-18">#</div>
          <div class="text-wrapper-19">Product Name</div>
          <div class="text-wrapper-20">Item Price</div>
          <div class="text-wrapper-21">Quantity</div>
          <div class="text-wrapper-22">Total</div>
          <div class="text-wrapper-23">Image</div>
          <div class="action">Action</div>
        </div>
        <div class="text-wrapper-24">Total Items</div>
        <div class="overlap-8">
          <div class="text-wrapper-25">Sub-total</div>
          @if (isset($totalPrice))
            <div class="text-wrapper-26">{{ $totalPrice }}</div>
          @else
            <div class="text-wrapper-26">-</div>
          @endif
        </div>
        @if (isset($totalItems))
          <div class="text-wrapper-27">{{ $totalItems }}</div>
        @else
          <div class="text-wrapper-27">-</div>
        @endif
        <div class="text-wrapper-28">Cart</div>
        <img class="vector-12" src="img/vector 2572.png" />
        <img class="vector-13" src="img/vector 2573.png" />
        <a href="javascript:history.back()" class="group-14">

          <div class="text-wrapper-29">Back</div>
          <div class="group-15">
            <div class="overlap-9">
              <div class="rectangle"></div>
              <img class="arrow" src="img/arrow 1.png" />
              <div class="group-16">
                <div class="overlap-10">
                  <div class="group-17">
                    <div class="overlap-11">
                      <img class="ellipse" src="img/ellipse 2696.png" />
                      <img class="vector-14" src="img/vector 2580.png" />
                      <div class="group-18">
                        <div class="overlap-group-3">
                          <div class="ellipse-2"></div>
                          <div class="ellipse-3"></div>
                          <div class="ellipse-4"></div>
                        </div>
                      </div>
                      <img class="ellipse-5" src="img/ellipse 2700.png" />
                      <img class="ellipse-6" src="img/ellipse 2701.png" />
                      <img class="vector-15" src="img/vector 2582.png" />
                    </div>
                  </div>
                  <div class="ellipse-7"></div>
                  <div class="ellipse-8"></div>
                </div>
              </div>
            </div>
          </div>
</a>
        <div class="group-19">
        <div class="overlap-12">
        <a href="{{ route('checkout') }}" class="text-wrapper-30">Check Out</a>
</div>
        </div>
      </div>
    </div>
  </body>
</html>
