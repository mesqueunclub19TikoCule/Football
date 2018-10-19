@extends('layouts.front')

@section('content')
    <div id="cat1" class="container-fluid">
        <div class="container-fluid block-1">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                {{--<!-- Indicators -->--}}
                <ol class="carousel-indicators">
                    @foreach($slider as $key => $dot)
                        @if($key==0)
                            <li data-target="#carousel-example-generic" data-slide-to="{{$key}}" class="active"></li>
                        @else
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        @endif
                    @endforeach


                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    @foreach($slider as $key => $slide )
                        @if($key==0)
                            <div class="item active">
                                <img class="slider-image" src="{{ asset('images') . '/' . $slide->name }}"
                                     alt="{{$slide->name}}">
                                <div class="carousel-caption"></div>
                            </div>
                        @else
                            <div class="item">
                                <img class="slider-image" src="{{ asset('images') . '/' .$slide->name}}"
                                     alt="{{$slide->name}}">
                                <div class="carousel-caption"></div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="about" id="about">
            <div class="container">
                <div class="col-md-6 about-leftgrid wow bounceInRight animated" data-wow-delay="0.4s"
                     style="visibility: visible; -webkit-animation-delay: 0.4s;">
                    <h2>Next match</h2>
                    <img src="images/valladolid.png" class="cook" alt="valladolid"/>
                    <p>R.Valladolid</p>
                    <img src="images/fcb.png" class="cook" alt="fcb"/>
                    <p>FC Barcelona</p>
                </div>
                <div class="col-md-6 about-leftgrid wow bounceInRight animated" data-wow-delay="0.4s"
                     style="visibility: visible; -webkit-animation-delay: 0.4s;">
                    <h2>Previous match</h2>
                    <img src="images/fcb.png" class="cook" alt="valladolid"/>
                    <p>FC Barcelona</p>
                    <img src="images/alaves.png" class="cook" alt="fcb"/>
                    <p>Alavés</p>
                </div>
                <div class="clearfix"></div>
            </div>


        </div>
        <div class="igredients" id="igredients">
            <div class="container">
                <div class="fine-igredients wow bounceInRight animated" data-wow-delay="0.4s"
                     style="visibility: visible; -webkit-animation-delay: 0.4s;">
                    <div class="fine-igredient agile">
                        <h3>Camp Nou</h3>
                        <img src="images/divider.png" alt=""/>
                        <p>Camp Nou (Catalan pronunciation: [kamˈnɔw], "new field", often referred to as the Nou Camp in
                            English)[3][4] is the home stadium of FC Barcelona since its completion in 1957.

                            With a seating capacity of 99,354,[5] it is the largest stadium in Spain and Europe, and the
                            third largest football stadium in the world in capacity..</p>
                    </div>
                    <div class="igredients-imgs w3layouts">
                        <div class="igredients-img w3l-agile">
                            <img src="images/pic-1.png" class="img-responsive" alt=""/>
                        </div>
                        <div class="igredients-img w3l-agile">
                            <img src="images/pic-2.png" class="img-responsive" alt=""/>
                        </div>
                        <div class="igredients-img w3l-agile">
                            <img src="images/pic-3.png" class="img-responsive" alt=""/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="menu9" id="menu">
            <div class="container">
                <div class="row">
                    <div class="row masonry" data-columns="">
                        @foreach($category as $cat)
                            <div class="col-md-6 menu-grids1  wow bounceIn animated" data-wow-delay="0.4s"
                                 style="visibility: visible; -webkit-animation-delay: 0.4s;">
                                <div class="menu-grid3">
                                    <h3>{{$cat->name}}</h3>
                                    <img src="images/img2.png" alt=""/>
                                    @foreach($cat->products as $prod)
                                        @if($prod->role == 0)
                                            <div class="menu-grid">
                                                <div class="tzatsikis">
                                                    <div class="tzatsiki">
                                                        <h4>{{$prod->name}}</h4>
                                                    </div>
                                                    <div class="dollar">
                                                        <h4>${{$prod->price}}</h4>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <p>{{$prod->desc}}</p>
                                            </div>
                                        @else
                                            <div class="menu1-grid">
                                                <a href="#">special</a>
                                                <div class="menu-grid5">
                                                    <div class="menu-grid">
                                                        <div class="tzatsikis">
                                                            <div class="tzatsiki">
                                                                <h4>{{$prod->name}}</h4>
                                                            </div>
                                                            <div class="dollar">
                                                                <h4>${{$prod->price}}</h4>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <p>{{$prod->desc}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endforeach
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

    </div>
    <div class="reviews" id="reviews">
        <div class="container">

            <div class="row staff-row">
                @foreach($staff as $member)
                    <div class="col-lg-3 staff">
                        <img class="circle" src="{{asset('images/'.$member->img)}}" width="200px" height=200px">
                        <h3>{{$member->name .' '.$member->surname}} <br></h3>
                        <hr>
                        <h2>{{$member->prof}}</h2>
                        <p>{{$member->desc}}</p>
                    </div><!-- /.col-lg-4 -->
                @endforeach
            </div>
        </div>
        <div class="reservations" id="reservations">
            <div class="container">
                <div class="col-md-6 grid-section wow bounceIn animated" data-wow-delay="0.4s"
                     style="visibility: visible; -webkit-animation-delay: 0.4s;">
                    <div class="reservation-leftgrid">
                        <img src="images/escudo.jpg" class="img-responsive" alt=""/>
                    </div>
                    <div class="reservation-leftgrid1">
                        <img src="images/escudo1.jpg" class="img-responsive" alt=""/>
                    </div>
                    <div class=" clearfix"></div>
                </div>
                <div class="col-md-6 reservation-rightgrid wow bounceIn animated" data-wow-delay="0.4s"
                     style="visibility: visible; -webkit-animation-delay: 0.4s;">
                    <h4>Contact With Us</h4>
                    <img src="images/img2.png" alt=""/>
                    <p>If you’ve been to one of our restaurants, you’ve seen – and tasted – what keeps our customers
                        coming
                        back for more. Perfect materials and freshly baked food.</p>
                    <span>Delicious Lambda cakes,  muffins, and gourmet coffees make us hard to resist! Stop in today and check us out! Perfect materials and freshly baked food.</span>
                    <div class="contact agileinfo">
                        <form action="{{route('send.mail')}}" method="post">
                            @csrf
                            <div class="contact-text wthree">
                                <h5>name</h5>
                                <label><input type="text" class="text" name="name" value="your name *"
                                              onfocus="this.value = '';"
                                              onblur="if (this.value == '') {this.value = 'your name*';}"></label>
                            </div>
                            <div class="contact-text">
                                <h5>name</h5>
                                <input type="text" class="text" name="email" value="your e-mail *"
                                       onfocus="this.value = '';"
                                       onblur="if (this.value == '') {this.value = 'your e-mail*';}">
                            </div>
                            <div class="contact-text">
                                <h5>date</h5>
                                <label><input name="date" class="date" id="datepicker" type="text" value="date*"
                                              onfocus="this.value = '';"
                                              onblur="if (this.value == '') {this.value = 'date*';}"></label>
                            </div>
                            <div class="contact-text">
                                <h5 class="number">party number</h5>
                                <div class="dropdown-button">
                                    <select name="number" class="dropdown" tabindex="10"
                                            data-settings='{"wrapperClass":"flat"}'>
                                        <option value="0">party number</option>
                                        <option value="1">0000001</option>
                                        <option value="2">0000002</option>
                                        <option value="3">0000003</option>
                                        <option value="4">0000004</option>
                                        <option value="5">0000005</option>
                                        <option value="6">0000006</option>
                                        <option value="7">0000007</option>
                                        <option value="8">0000008</option>
                                        <option value="9">0000009</option>
                                    </select>
                                </div>

                            </div>
                            <div class="clearfix"></div>

                            <input type="submit" class="btn btn-1 btn-1c" value="Book now!">
                        </form>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection