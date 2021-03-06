<!DOCTYPE html>
<html lang="en">
    @include('vueClient.partials.head')
    <body id="page-top">
        <!-- Navigation-->
        @include('vueClient.partials.menu')

        <section class="page-section portfolio" id="portfolio">
            <div class="container mt-5"> 
                <div class="row justify-content-center">
                    @foreach ($simulateurs as $simulateur)
                        <div class="col-md-6 col-lg-4 my-5">
                            <div class="h-25">
                                <h6 class="text-center text-uppercase text-secondary mb-5">{{$simulateur->typeSimulation->nom}}</h6>
                            </div>
                            <a href="{{route('simulateur.credits.show',$simulateur->id)}}">
                                <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                                    <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100 bg">
                                        <div class="portfolio-item-caption-content text-center text-uppercase text-white">{{$simulateur->slug}}</i></div>
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
