<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Details de la commande</h1>
    Customer Name: <h3>{{$order->name}}</h3>
    Customer Email: <h3>{{$order->email}}</h3>
    Customer Phone: <h3>{{$order->phone}}</h3>
    Customer address: <h3>{{$order->address}}</h3>
    Customer Id: <h3>{{$order->user_id}}</h3>

    Produit Nane: <h3>{{$order->product_title}}</h3>


    Produits price: <h3>{{$order->price}}</h3>
    Produits Quantity: <h3>{{$order->quantity}}</h3>
    Produits Status: <h3>{{$order->payment_status}}</h3>
    Produits Id: <h3>{{$order->product_id}}</h3>

    <img height="250" src="product/{{$order->image}}">
</body>
</html>