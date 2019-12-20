@extends('layouts.app')


            @section('content')
            <div class="content">

                <div class="row top-15"> 

                    <div class="col"> 
                        <h5>Products</h5> 
                        <div class="row"> 
                            @foreach($products as $product) 
                            <div class="col-12 col-md-6 col-lg-4"> 
                                <div class="card" style="margin-bottom:5%"> 
                                    <!--<img class="card-img-top" height="100" width="100" src="https://sprbot.com/aliceapi/lookbook/img/blank_product.jpg" alt="Card image cap"> -->
                                    <div class="card-body"> 
                                        <h4 class="card-title">
                                        Name: {{$product->name}}</h4> 
                                        <p class="card-text">Detail: {{$product->detail}}</p> 
                                    <div class="row"> 
                                        <div class="col"> 
                                        <p class="card-text"> Price: ${{$product->price}}</p>
                                            <!--<p class="btn btn-outline-info btn-block">${{$product->price}}</p>  -->
                                        </div> 
                                    <div class="col">
                                        <form method="POST" action="{{route('cart.add')}}" class="form-inline my-2 my-lg-0" > @csrf 
                                        <input name="id" type="hidden" value="{{$product->id}}"> 
                                        <button class="btn btn-outline-success btn-block" type="submit">Add to cart</button> 
                                        </form> 
                                    </div>
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                @endforeach 
            </div> 
        </div>
    </div>

@endsection

