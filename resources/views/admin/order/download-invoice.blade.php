<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Document</title>
    <style>
        /*
     CSS-Tricks Example
     by Chris Coyier
     http://css-tricks.com
*/
        * { margin: 0; padding: 0; }
        body { font: 14px/1.4 Georgia, serif; }
        #page-wrap { width: 800px; margin: 0 auto; }
        textarea { border: 0; font: 14px Georgia, Serif; overflow: hidden; resize: none; }
        table { border-collapse: collapse; }
        table td, table th { border: 1px solid black; padding: 5px; }
        #header { height: 15px; width: 100%; margin: 20px 0; background: #222; text-align: center; color: white; font: bold 15px Helvetica, Sans-Serif; text-decoration: uppercase; letter-spacing: 20px; padding: 8px 0px; }
        #address { width: 250px; height: 150px; float: left; }
        #customer { overflow: hidden; }
        #logo { text-align: right; float: right; position: relative; margin-top: 25px; border: 1px solid #fff; max-width: 540px; max-height: 100px; overflow: hidden; }
        #logo:hover, #logo.edit { border: 1px solid #000; margin-top: 0px; max-height: 125px; }
        #logoctr { display: none; }
        #logo:hover #logoctr, #logo.edit #logoctr { display: block; text-align: right; line-height: 25px; background: #eee; padding: 0 5px; }
        #logohelp { text-align: left; display: none; font-style: italic; padding: 10px 5px;}
        #logohelp input { margin-bottom: 5px; }
        .edit #logohelp { display: block; }
        .edit #save-logo, .edit #cancel-logo { display: inline; }
        .edit #image, #save-logo, #cancel-logo, .edit #change-logo, .edit #delete-logo { display: none; }
        #customer-title { font-size: 20px; font-weight: bold; float: left; }
        #meta { margin-top: 1px; width: 300px; float: right; }
        #meta td { text-align: right;  }
        #meta td.meta-head { text-align: left; background: #eee; }
        #meta td textarea { width: 100%; height: 20px; text-align: right; }
        #items { clear: both; width: 100%; margin: 30px 0 0 0; border: 1px solid black; }
        #items th { background: #eee; }
        #items textarea { width: 80px; height: 50px; }
        #items tr.item-row td { border: 0; vertical-align: top; }
        #items td.description { width: 300px; }
        #items td.item-name { width: 175px; }
        #items td.description textarea, #items td.item-name textarea { width: 100%; }
        #items td.total-line { border-right: 0; text-align: right; }
        #items td.total-value { border-left: 0; padding: 10px; }
        #items td.total-value textarea { height: 20px; background: none; }
        #items td.balance { background: #eee; }
        #items td.blank { border: 0; }
        #terms { text-align: center; margin: 20px 0 0 0; }
        #terms h5 { text-transform: uppercase; font: 13px Helvetica, Sans-Serif; letter-spacing: 10px; border-bottom: 1px solid black; padding: 0 0 8px 0; margin: 0 0 8px 0; }
        #terms textarea { width: 100%; text-align: center;}
        textarea:hover, textarea:focus, #items td.total-value textarea:hover, #items td.total-value textarea:focus, .delete:hover { background-color:#EEFF88; }
        .delete-wpr { position: relative; }
        .delete { display: block; color: #000; text-decoration: none; position: absolute; background: #EEEEEE; font-weight: bold; padding: 0px 3px; border: 1px solid; top: -6px; left: -22px; font-family: Verdana; font-size: 12px; }

    </style>

</head>
<body>
<div id="page-wrap">
    <textarea id="header">INVOICE</textarea>
    <div id="identity">
        <u><h4>Shipping Info</h4></u>
        <textarea id="address">
    Name: {{$shipping->full_name}}
    Address: {{$shipping->address}}
    Phone Number: {{$shipping->phone_number}}
 </textarea>

        <u><h4>Billing Info</h4></u>
        <textarea id="address">
    Name: {{$customer->first_name.' '.$customer->last_name}}
    Address: {{$customer->address}}
    Phone No: {{$customer->phone_number}}
</textarea>

    </div>
    <div style="clear:both"></div>
    <div id="customer">
<textarea id="customer-title">Widget Corp.
c/o Steve Widget</textarea>
        <table id="meta" class="">
            <tr>
                <td class="meta-head">Invoice #</td>
                <td><textarea>{{$order->id}}</textarea></td>
            </tr>
            <tr>
                <td class="meta-head">Date</td>
                <td><textarea id="date">{{$customer->created_at}}</textarea></td>
            </tr>
            <tr>
                <td class="meta-head">Amount Due</td>
                <td><div class="due">Tk. {{$order->order_total}}</div></td>
            </tr>
        </table>
    </div>
    <table id="items">
        <tr>
            <th>Item</th>
            <th>Description</th>
            <th>Unit Cost</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        @php($sum=0)
        @foreach($products as $product)
            <tr class="item-row">

                <td class="item-name"><div class="delete-wpr"><textarea>{{$product->product_name}}</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div>
                </td>
                <td class="description"><textarea></textarea></td>
                <td><textarea class="cost">{{$product->product_price}}</textarea></td>
                <td><textarea class="qty">{{$product->product_quantity}}</textarea></td>
                <td><span class="price"></span>Tk.{{$total=$product->product_price*$product->product_quantity}}</td>

            </tr>
            @php($sum=$sum+$total)
        @endforeach



        <tr>
            <td colspan="2" class="blank"> </td>
            <td colspan="2" class="total-line">Total:</td>
            <td class="total-value"><div id="total">Tk. {{$sum}}</div></td>
        </tr>

    </table>

</div>
</body>
</html>
