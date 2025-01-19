<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Kalam:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/orders.css') }}">
  </head>
  <body>
    <div class="empty-order-page">
      <div class="div">
        <img class="maison-burro-logo" src="img/Maison Burro Logo blue 1.png" />
        <div class="group">
          <div class="overlap">
            <img class="vector" src="img/vector 2528.png" />
            <img class="img" src="img/vector 2529.png" />
            <div class="group-2">
              <div class="page"><a href="{{ route('home') }}" class="text-wrapper">Home</a></div>
            </div>
            <div class="home-wrapper"><a href="{{ route('menu') }}" class="home">Menu</a></div>
            <div class="overlap-group-wrapper">
              <div class="overlap-group">
                <div class="ellipse"></div>
                <div class="home-2">Orders</div>
              </div>
            </div>
            <div class="div-wrapper"><a href="{{ route('merchandise') }}" class="home-3">Merchandise</a></div>
          </div>
        </div>
        <div class="group-3">
          <img class="group-4" src="img/Group 631796 1.png" />
          <div class="group-wrapper">
            <div class="group-5">
              @if(!empty($firstName))
                <div class="text-wrapper-2">{{ $firstName }}</div>
              @else
                Login
              @endif
            </div>
          </div>
        </div>
        <div class="group-6">
          <img class="group-7" src="img/Group 631785 1.png" />

          <div class="group-8">
          <a href ="{{ route('shoppingcart') }}" class="text-wrapper-3">cart</a>


          </div>
        </div>

        <footer class="footer">
          <div class="overlap-2">
            <img class="sidelogo" src="img/group 631786.png" />
            <div class="group-10">
              <div class="text-wrapper-4">Pre-order</div>
              <div class="text-wrapper-5">Menu</div>
              <div class="text-wrapper-6">Merchandise</div>
              <div class="text-wrapper-7">Shopping Cart</div>
            </div>
            <div class="group-11">
              <div class="text-wrapper-8">Delivery</div>
              <div class="text-wrapper-9">Special event</div>
              <div class="text-wrapper-10">Feedbacks</div>
              <div class="text-wrapper-11">Online popup</div>
            </div>
            <div class="group-12">
              <div class="group-13">
                <div class="overlap-group-2"><div class="text-wrapper-12">Contact Us</div></div>
              </div>
              <div class="text-wrapper-13">+62 877-7000-8204</div>
              <div class="text-wrapper-14">maisonburro@gmail.com</div>

              <div class="follow">FOLLOW US!</div>
                <img class="socialz" src="img/Group 631931.png"/>
               <div class="overlap-wrapper">
                <div class="image-wrapper"><img class="image" src="img/image 66.png" /></div>
              </div>
              <div class="group-14">
                <div class="icon-wrapper"><img class="icon" src="img/icon.png" /></div>
              </div>
            </div>
            <img class="maison-burro-logo-2" src="img/maison burro logo white 1.png" />
          </div>
        </footer>

        <div class="text-wrapper-15">Your Orders</div>
        <div class="overlap-3">
        <table class="orders-table">
    @if ($orders->isNotEmpty())
        <thead>
            <tr>

            
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $index => $order)
                <tr>
                <td>{{ $loop->iteration }}</td>

                    <td>{{ $order->customerName }}</td>
                    <td>{{ $order->orderID }}</td>

                    <td>{{ $order->total_items }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->orderStatus }}</td>
                </tr>
            @endforeach
        </tbody>
    @else
        <tr>
            <td colspan="5">No orders found</td>
        </tr>
    @endif
</table>

           
        </div>
        <img class="vector-2" src="img/dots.png" />
        <img class="vector-3" src="img/vector 2573.png" />
        <div class="overlap-4"><div class="text-wrapper-18">Orders</div></div>
        <div class="overlap-5">
          <div class="text-wrapper-19">#</div>
          <div class="text-wrapper-20">Name</div>
          <div class="text-wrapper-21">Order ID</div>
          <div class="text-wrapper-22">Total Items</div>
          <div class="text-wrapper-23">Total Price</div>
          <div class="text-wrapper-24">Status</div>
        </div>
      </div>
    </div>
  </body>
</html>
