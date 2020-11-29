<!DOCTYPE html>
<html lang="en">
    @include('vueClient.partials.head')
    <body id="page-top">
        <!-- Navigation-->
        @include('vueClient.partials.menu')

        <section class="page-section portfolio" id="portfolio">
            <div class="container mt-5"> 
                <div class="row justify-content-center">
                    <!-- Portfolio Item 1-->
                    @foreach ($simulateurs as $simulateur)
                        <div class="col-md-6 col-lg-4 mb-5">
                            <h6>{{$simulateur->typeSimulation->nom}}</h6>
                            <a href="{{route('simulateur.credits.show',$simulateur->id)}}">
                            <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                                <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100 bg">
                                    <div class="portfolio-item-caption-content text-center text-white">{{$simulateur->slug}}</i></div>
                                </div>
                                <img class="img-fluid" src="{{asset('storage').'/'.$simulateur->image}}" alt="" />
                            </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @include('vueClient.partials.footer')
</html>
