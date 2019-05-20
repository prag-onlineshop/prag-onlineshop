@extends('layouts.app')
@section('content')


<section class="main-content py-3 " >
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ asset('img/slides/img-slide.jpeg') }}" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
              <h5>Shoes and Clothes </h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, dolores?</p>
            </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/slides/img-slide2.jpeg') }}" alt="Second slide">
          <div class="carousel-caption d-none d-md-block">
              <h5>Clothes </h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, dolores?</p>
            </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ asset('img/slides/img-slide4.jpeg') }}" alt="Third slide">
          <div class="carousel-caption d-none d-md-block">
              <h5>Shoes </h5>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, dolores?</p>
            </div>
        </div>
      </div>
      
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    

    <div class="" id="HomeContentproduct">
        <div class="row-fluid">
            <h3 class="mt-4 ">Most popular:</h3>
            <div class="card-deck ">
                <div class="card">
                    <img src="{{ asset('img/Shirts/Lacoste/products/lacoste.jpg') }}" class="card-img-top " alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Brand: Lacoste</h5>
                      <p class="card-text">Lacoste This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Category: Clothes</small></p>
                    </div>
                  </div>
  
                  <div class="card">
                      <img src="{{ asset('img/Bags/Fendi/products/fendi-elitebag.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Brand: Fendi</h5>
                        <p class="card-text">GUCCI This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Category: Bag</small></p>
                    </div>
                  </div>
  
                  <div class="card">
                      <img src="{{ asset('img/Shirts/Lacoste/products/lacoste.jpg') }}" class="card-img-top " alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Brand: Lacoste</h5>
                        <p class="card-text">Lacoste This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Category: Clothes</small></p>
                      </div>
                    </div>
    
                    <div class="card">
                        <img src="{{ asset('img/Bags/Fendi/products/fendi-elitebag.jpg') }}" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">Brand: Fendi</h5>
                          <p class="card-text">GUCCI This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Category: Bag</small></p>
                      </div>
                    </div>

                    <div class="card">
                        <img src="{{ asset('img/Shirts/Lacoste/products/lacoste.jpg') }}" class="card-img-top " alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Brand: Lacoste</h5>
                          <p class="card-text">Lacoste This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Category: Clothes</small></p>
                        </div>
                      </div>
      
              </div>
          </div>
          <hr>
          <div class="row mt-4">
              <h3 class=" ">Most Recent:</h3>
              <div class="card-deck">

                  @forelse($products as $product)
                  <div class="card">
                      <img src="{{ url('images', $product->image) }}" class="card-img-top " alt="...">
                      <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text"><small class="text-muted">Category: </small></p>
                      </div>
                      <div class="d-flex justify-content-between align-items-center">
                          <div class="btn-group">
                            <a href="#" class="btn btn-sm btn-outline-secondary">View Product</a>
                            <a href="{{url('cart/addItem',$product->id)}}" class="btn btn-sm btn-outline-secondary">Add To Cart <i class="fa fa-shopping-cart"></i></a>
                          </div>
                      </div>
                    </div>
                    @empty
                        <h3>No Products</h3>
                    @endforelse
    
                    <!-- <div class="card">
                        <img src="{{ asset('img/Bags/Fendi/products/fendi-elitebag.jpg') }}" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">Brand: Fendi</h5>
                          <p class="card-text">GUCCI This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Category: Bag</small></p>
                      </div>
                    </div>
    
                    <div class="card">
                        <img src="{{ asset('img/Shirts/Lacoste/products/lacoste.jpg') }}" class="card-img-top " alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Brand: Lacoste</h5>
                          <p class="card-text">Lacoste This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Category: Clothes</small></p>
                        </div>
                      </div>
      
                      <div class="card">
                          <img src="{{ asset('img/Bags/Fendi/products/fendi-elitebag.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Brand: Fendi</h5>
                            <p class="card-text">GUCCI This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Category: Bag</small></p>
                        </div>
                      </div>

                        

                    <div class="card">
                        <img src="{{ asset('img/Bags/Fendi/products/fendi-elitebag.jpg') }}" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">Brand: Fendi</h5>
                          <p class="card-text">GUCCI This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Category: Bag</small></p>
                      </div>
                    </div>
                  
    
                   
              </div>
          </div>



          <div class="row mt-4">
              <div class="card-deck">
                  <div class="card">
                      <img src="{{ asset('img/Shirts/Lacoste/products/lacoste.jpg') }}" class="card-img-top " alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Brand: Lacoste</h5>
                        <p class="card-text">Lacoste This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Category: Clothes</small></p>
                      </div>
                    </div>
    
                  
      
                    
                        <div class="card">
                            <img src="{{ asset('img/Shirts/Lacoste/products/lacoste.jpg') }}" class="card-img-top " alt="...">
                            <div class="card-body">
                              <h5 class="card-title">Brand: Lacoste</h5>
                              <p class="card-text">Lacoste This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                              <p class="card-text"><small class="text-muted">Category: Clothes</small></p>
                            </div>
                          </div>
    
                    <div class="card">
                        <img src="{{ asset('img/Bags/Fendi/products/fendi-elitebag.jpg') }}" class="card-img-top" alt="...">
                      <div class="card-body">
                          <h5 class="card-title">Brand: Fendi</h5>
                          <p class="card-text">GUCCI This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Category: Bag</small></p>
                      </div>
                    </div>
    
                    <div class="card">
                        <img src="{{ asset('img/Shirts/Lacoste/products/lacoste.jpg') }}" class="card-img-top " alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Brand: Lacoste</h5>
                          <p class="card-text">Lacoste This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Category: Clothes</small></p>
                        </div>
                      </div>
      
                      <div class="card">
                          <img src="{{ asset('img/Bags/Fendi/products/fendi-elitebag.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Brand: Fendi</h5>
                            <p class="card-text">GUCCI This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            <p class="card-text"><small class="text-muted">Category: Bag</small></p>
                        </div>
                      </div> -->
              </div>

          </div>
    </div>
 
</section>
@endsection