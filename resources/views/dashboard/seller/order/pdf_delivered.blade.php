<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foodpipra</title>
</head>
<body>
    <table style="box-sizing:border-box; border:1px solid #c8c8c8;" width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="100" colspan="2" align="center">
            {{-- <h3 style="text-align: center"> FoodPipra Invoice</h3> --}}
            <img src="{{ public_path('logo/Logo.png') }}" width="150" height="60" />  
                <hr />
          </td>
        </tr>
        <tr>
          <td height="31" colspan="2" style="padding-left:10px; font-size:20px; font-family:Verdana, Geneva, sans-serif;"><strong>Foodpipra Invoice</strong></td>
        </tr>
        <tr>
          <td width="61%" height="28"><table style="box-sizing:border-box; border:1px solid #c8c8c8; margin:10px;" width="90%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td  width="25%" height="25" style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; font-size:14px;"><strong>Name </strong></td>
              <td width="75%" style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-bottom:1px solid #c8c8c8;  font-size:14px;">{{ $order->full_name }}</td>
            </tr>
            <tr>
              <td height="25" style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-right:1px solid #c8c8c8;  font-size:14px;"><strong>Address</strong></td>
              <td style="padding-left:10px; font-family:Verdana, Geneva, sans-serif;  font-size:14px;">{{$order->address1 }}</td>
            </tr>
            
            
            <tr>
              <td height="25" style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-right:1px solid #c8c8c8; border-top:1px solid #c8c8c8;  font-size:14px;"><strong>District</strong></td>
              <td style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-top:1px solid #c8c8c8;  font-size:14px;">{{App\Models\Location::find($order->location_id)->location }}</td>
            </tr>
            <tr>
              <td height="25" style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-right:1px solid #c8c8c8; border-top:1px solid #c8c8c8;  font-size:14px;"><strong>Sub District</strong></td>
              <td style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-top:1px solid #c8c8c8;  font-size:14px;">{{App\Models\Location::find($order->sublocation_id)->location }}</td>
            </tr>
            <tr>
              <td height="25" style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-right:1px solid #c8c8c8; border-top:1px solid #c8c8c8;  font-size:14px;"><strong>Email</strong></td>
              <td style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-top:1px solid #c8c8c8;  font-size:14px;">{{$order->email }}</td>
            </tr>
            <tr>
              <td height="25" style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-right:1px solid #c8c8c8; border-top:1px solid #c8c8c8;  font-size:14px;"><strong>Mobile</strong></td>
              <td style="padding-left:10px; font-family:Verdana, Geneva, sans-serif; border-top:1px solid #c8c8c8;  font-size:14px;">{{$order->phone }}</td>
            </tr>
            
            
          </table></td>
          <td width="39%" align="right"><table style="box-sizing:border-box; border:1px solid #c8c8c8; margin:10px;" width="80%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td height="25" align="right" style="padding-right:10px; font-family:Verdana, Geneva, sans-serif; border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; font-size:14px;"><strong>Order ID</strong> : #{{ $order->invoice }}</td>
              </tr>
            <tr>
              <td height="25" align="right" style="padding-right:10px; font-family:Verdana, Geneva, sans-serif; border-right:1px solid #c8c8c8;  font-size:14px;"><strong>Date</strong> : {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y')}}</td>
              </tr>
          </table></td>
        </tr>
        <tr>
          <td height="28" colspan="2"> </td>
        </tr>
        <tr>
          <td style="padding:10px;" height="28" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="13%" height="28" align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-left:#c8c8c8 1px solid; border-top:#c8c8c8 1px solid; font-family:Verdana, Geneva, sans-serif; font-size:13px;"><strong>S.N</strong></td>
              <td width="22%" align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:#c8c8c8 1px solid; font-family:Verdana, Geneva, sans-serif; font-size:13px;"><strong>Name </strong></td>
              <td width="26%" align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:#c8c8c8 1px solid; font-family:Verdana, Geneva, sans-serif; font-size:13px;"><strong>Discription</strong></td>
              <td width="20%" align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:#c8c8c8 1px solid; font-family:Verdana, Geneva, sans-serif; font-size:13px;"><strong>Price</strong></td>
              <td width="19%" align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:#c8c8c8 1px solid; font-family:Verdana, Geneva, sans-serif; font-size:13px;"><strong>Quantity</strong></td>
              <td width="19%" align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:#c8c8c8 1px solid; font-family:Verdana, Geneva, sans-serif; font-size:13px;"><strong>Total</strong></td>
            </tr> 

               @php
               $total=0;
           @endphp
            @forelse ($orderItems as $item)
            @php
            $total+=$item->product->price * $item->product_qty
        @endphp
                
            <tr>
              <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-left:#c8c8c8 1px solid" height="28" align="center">{{ $loop->index+1 }}</td>
              <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">{{ $item->product->name }}</td>
              <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">{{ $item->product->description }}</td>
              <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">{{ $item->product->price }}</td>
              <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">{{ $item->product_qty}}</td>
              <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;" align="center">{{ $item->product->price * $item->product_qty }}</td>
            </tr>
            @empty
                
            @endforelse

          </table>
             
          </td>
        </tr>
        <tr>
          <td style="padding:10px;" height="28"> </td>
          <td style="padding:10px;" height="28"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:1px solid #c8c8c8; border-left:1px solid #c8c8c8; font-family:Verdana, Geneva, sans-serif; font-size:13px; padding-left:10px;" width="51%" height="29"><strong>Amount</strong></td>
              <td width="49%" align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-top:1px solid #c8c8c8;">{{ $total }}/-</td>
            </tr>
            <tr>
              <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-left:1px solid #c8c8c8; font-family:Verdana, Geneva, sans-serif; font-size:13px; padding-left:10px;" height="29"><strong>Vat </strong></td>
              <td align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;">00</td>
            </tr>
            <tr>
              <td style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8; border-left:1px solid #c8c8c8; font-family:Verdana, Geneva, sans-serif; font-size:13px; padding-left:10px;" height="29"><strong>Total Amount</strong></td>
              <td align="center" style="border-bottom:1px solid #c8c8c8; border-right:1px solid #c8c8c8;">{{ $total }}/-</td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td height="28" colspan="2"> </td>
        </tr>
        <tr>
          <td style="font-family:Verdana, Geneva, sans-serif; font-size:13px;" height="28" colspan="2" align="center">
           <strong>Company Name</strong>
                                  <br>
                                  FoodPipra.com
                                  <br>
                                  Tel: +880 1873257449| Email: Mahfujmazumder@gmail.com
                                  {{-- <br>
                                  Company Registered in Country Name. Company Reg. 12121212.
                                  <br>
                                  VAT Registration No. 021021021 | ATOL No. 1234 --}}
          </td>
        </tr>
        <tr>
          <td height="28" colspan="2"> </td>
        </tr>
      </table>
</body>
</html>