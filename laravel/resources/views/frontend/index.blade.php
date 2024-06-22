@extends('frontend.main')
@section('content')


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-lg-4 text-start">
                            <h1>Sản phẩm</h1>
                        </div>
                        <div class="col-lg-8 text-end">
                            <ul class="nav nav-pills d-inline-flex text-center mb-5">
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                        <span class="text-dark" style="width: 130px;">Tất cả sản phẩm</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                        <span class="text-dark" style="width: 130px;">Robot </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                        <span class="text-dark" style="width: 130px;">Ô tô</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                        <span class="text-dark" style="width: 130px;">Ghế Gaming</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-5">
                                        <span class="text-dark" style="width: 130px;">Kính Thực Tế Ảo</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                    @foreach ($sp as $spp)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                     <div class="rounded position-relative fruite-item">
                                         <div class="fruite-img" style="height: 200px; overflow: hidden;">
                                          <img src="{{asset('uploads/admin')}}/{{$spp->anhsp}}" class="img-fluid w-100 rounded-top" alt="" style="object-fit: cover; height: 100%;" />
                                         </div>
                                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"></div>
                                            <div class="p-4 border border-secondary border-top-0 rounded-bottom " style="height: 50%">
                                              <a href="{{route('Shopdetail',$spp->id)}}"><h4>{{$spp->tensp}}</h4></a>  
                                                <p>{{$spp->tensp}}</p>
                                                <div class="d-flex justify-content-center flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">{{$spp->giasp}}</p>
                                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Thêm vào giỏ hàng</a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     @endforeach

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                @foreach($sprobot as $robot)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img" style="height: 200px; overflow: hidden;">
                                            <img src="{{asset('uploads/admin')}}/{{$robot->anhsp}}" class="img-fluid w-100 rounded-top" alt="" style="object-fit: cover; height: 100%;">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Robot</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom" style="height: 50%">
                                            <a href="{{route('Shopdetail',$robot->id)}}"><h4>{{$robot->tensp}}</h4></a> 
                                            <p>{{$robot->tensp}}</p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">{{$robot->giasp}}</p> 
                                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>    
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        
                        <div id="tab-4" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                @foreach($spghe as $ghe)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img" style="height: 200px; overflow: hidden;">
                                            <img src="{{asset('uploads/admin')}}/{{$ghe->anhsp}}" class="img-fluid w-100 rounded-top" alt="" style="object-fit: cover; height: 100%;">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Ghế Gaming</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom" style="height: 50%">
                                            <a href="{{route('Shopdetail',$ghe->id)}}"><h4>{{$ghe->tensp}}</h4></a> 
                                            <p>{{$ghe->tensp}}</p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">{{$ghe->giasp}}</p>
                                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                @foreach($spoto as $oto)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img" style="height: 200px; overflow: hidden;">
                                            <img src="{{asset('uploads/admin')}}/{{$oto->anhsp}}" class="img-fluid w-100 rounded-top" alt="" style="object-fit: cover; height: 100%;">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Oto</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom" style="height: 50%">
                                            <a href="{{route('Shopdetail',$oto->id)}}"><h4>{{$oto->tensp}}</h4></a> 
                                            <p>{{$oto->tensp}}</p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">{{$oto->giasp}}</p>
                                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="tab-5" class="tab-pane fade show p-0">
                            <div class="row g-4">
                                @foreach($spkinh as $kinh)
                                <div class="col-md-6 col-lg-4 col-xl-3">
                                    <div class="rounded position-relative fruite-item">
                                        <div class="fruite-img" style="height: 200px; overflow: hidden;">
                                            <img src="{{asset('uploads/admin')}}/{{$kinh->anhsp}}" class="img-fluid w-100 rounded-top" alt="" style="object-fit: cover; height: 100%;">
                                        </div>
                                        <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Kính</div>
                                        <div class="p-4 border border-secondary border-top-0 rounded-bottom" style="height: 50%">
                                            <a href="{{route('Shopdetail',$kinh->id)}}"><h4>{{$kinh->tensp}}</h4></a> 
                                            <p>{{$kinh->tensp}}</p>
                                            <div class="d-flex justify-content-between flex-lg-wrap">
                                                <p class="text-dark fs-5 fw-bold mb-0">{{$kinh->giasp}}</p>
                                                <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
        <!-- Fruits Shop End-->


        <!-- Featurs Start -->
        <div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-secondary rounded border border-secondary">
                                <img src="img/featur-1.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-primary text-center p-4 rounded">
                                        <h5 class="text-white">Robot</h5>
                                        <h3 class="mb-0">Giảm giá 20%</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-dark rounded border border-dark">
                                <img src="img/featur-2.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-light text-center p-4 rounded">
                                        <h5 class="text-primary">Sản Phẩm Tốt</h5>
                                        <h3 class="mb-0">Giao hàng miễn phí</h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <a href="#">
                            <div class="service-item bg-primary rounded border border-primary">
                                <img src="img/featur-3.jpg" class="img-fluid rounded-top w-100" alt="">
                                <div class="px-4 rounded-bottom">
                                    <div class="service-content bg-secondary text-center p-4 rounded">
                                        <h5 class="text-white">Sản phẩm chất lượng</h5>
                                        <h3 class="mb-0">Giảm giá </h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Featurs End -->


 

        <!-- Banner Section Start-->
        <div class="container-fluid banner bg-secondary my-5">
            <div class="container py-5">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="py-4">
                            <h1 class="display-3 text-white">Đồ chơi </h1>
                            <p class="fw-normal display-3 text-dark mb-4">trong cửa hàng</p>
                            <p class="mb-4 text-dark">Luôn đề cao chất lượng và giá thành phù hợp với nhu cầu vui chơi của trẻ nhỏ.</p>
                            <a href="#" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="img/baner-1.png" class="img-fluid w-100 rounded" alt="">
                            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute" style="width: 140px; height: 140px; top: 0; left: 0;">
                                <h1 style="font-size: 100px;">1</h1>
                                <div class="d-flex flex-column">
                                    <span class="h2 mb-0">50đ</span>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Section End -->


        <!-- Bestsaler Product Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="text-center mx-auto mb-5" style="max-width: 700px;">
                    <h1 class="display-4">Sản phẩm bán chạy</h1>
                    <p>Được thiết kế và sản xuất tại các công ty lớn trên thế giới an toàn về chất lượng .</p>
                </div>
                <div class="row g-4">
                    @foreach ($spbanchay as $sanph)
                    <div class="col-lg-6 col-xl-4">
                        <div class="p-4 rounded bg-light">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <img src="{{asset('uploads/admin')}}/{{$sanph->anhsp}}" class="img-fluid rounded-circle w-100" alt="">
                                </div>
                                <div class="col-6">
                                    <a href="{{route('Shopdetail',$sanph->id)}}" class="h5">{{$sanph->tensp}}</a>
                                    <div class="d-flex my-3">
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star text-primary"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <h4 class="mb-3">{{$sanph->giasp}}</h4>
                                    <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
            
              @endforeach
                
            
               
              
                 
                 
                 
                </div>
            </div>
        </div>
        <!-- Bestsaler Product End -->


        <!-- Fact Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="bg-light p-5 rounded">
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>khách hàng hài lòng</h4>
                                <h1>1963</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>chất lượng dịch vụ</h4>
                                <h1>99%</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>Giấy chứng nhận chất lượng</h4>
                                <h1>33</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>Sản phẩm có sẵn</h4>
                                <h1>789</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fact Start -->

        @stop()

     


       