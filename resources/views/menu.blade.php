<section class="section" id="menu">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="section-heading">
                    <h6>Our Menu</h6>
                    <h2>Our selection of cakes with quality taste</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item-carousel">
        <div class="col-lg-12">
            <div class="owl-menu-item owl-carousel">
                @foreach ($data as $d)
                <form action="{{url('/addcart',$d->id)}}" method="post">
                    @csrf
                    <div class="item">
                        <div style="background-image: url('{{asset($d->image)}}')" class='card'>
                            <div class="price">
                                <h6>
                                    {{$d->price}}
                                </h6></div>
                            <div class='info'>
                            <h1 class='title'>{{$d->title}}</h1>
                            <p class='description'>{{$d->description}}</p>
                            <div class="main-text-button">
                                <div class="scroll-to-section"><a href="#reservation">Make Reservation <i class="fa fa-angle-down"></i></a></div>
                            </div>
                            </div>
                        </div>
                        <input type="number" name="quantity" min="1" style="width: 80px">
                        <input type="submit" value="Add cart">
                    </div>

                </form>

                @endforeach
            </div>
        </div>
    </div>
</section>
