
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AL Balagul Mobin Invoice</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
    background-color: #000
}

.padding {
    padding: 2rem !important
}

.card {
    margin-bottom: 30px;
    border: none;
    -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
    box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22)
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid #e6e6f2
}

h3 {
    font-size: 20px
}

h5 {
    font-size: 15px;
    line-height: 26px;
    color: #3d405c;
    margin: 0px 0px 15px 0px;
    font-family: 'Circular Std Medium'
}

.text-dark {
    color: #3d405c !important
}
    </style>
</head>
<body>
    @php
    $carts = $details['carts'];
@endphp
   
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="card-header p-4">
                <h2 style="background-color:azure; color:blue"> <a href="https://foodpipra.com/">FoodPipra Invoice</a></h2>
                <div class="float-right">
                    Date: <?php
                       echo date("d/m/Y");
                       $i=1;
                    ?>
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4 d-flex">
                    <div class="col-sm-6 text-start">
                        <h5 class="mb-3">From:</h5>
                        <h3 class="text-dark mb-1"></h3>
                        <div>Name: {{ $details['name'] }}</div>
                        <div>Address: {{ $details['address1'] }}</div>
                        <div>Email: {{ $details['email'] }}</div>
                        <div>Phone: {{ $details['phone'] }}</div>
                        {{-- <div>Payment: {{ $details['payment'] }}</div>
                        <div>Txnid: {{ $details['txnid'] }}</div> --}}
                    </div>
                    <div class="col-sm-6 text-end">
                        <h5 class="mb-3">To:</h5>
                        <h5 class="text-dark mb-1">FoodPipra</h5>
                  
                        {{-- <div>Email: info@tikon.com</div> --}}
                        {{-- <div>Phone: +91 9895 398 009</div> --}}
                    </div>
                </div>
                @php $total = 0 @endphp
                    @foreach($carts as $cart)
                @php $total += $cart->products->price * $cart->product_qty @endphp
                @endforeach
               
                <div class="table-responsive-sm">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="center">Serial</th>
                                <th>Name</th>
                                {{-- <th>Author</th> --}}
                                <th class="center">Qty</th>
                                <th class="right">Price</th>
                                <th class="right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($carts as $cart)
                            <tr>
                                <td class="center">{{$i++}}</td>
                                <td class="left strong">{{$cart->products->name}}</td>
                                {{-- <td class="left">{{$cart->author}}</td> --}}
                                <td class="center">{{$cart->product_qty}}</td>
                                <td class="right">{{$cart->products->price}}</td>
                                <td class="right">{{$cart->products->price * $cart->product_qty}}/-</td>
                            </tr>
                        @empty
                            
                        @endforelse
                           <tr> <td></td> <td></td> <td></td> <td></td> <td><strong>Total</strong></td> <td><strong>{{$total}}/-</strong></td>
                         </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        
        </div>
    </div>

</body>
</html>
