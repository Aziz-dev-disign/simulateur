@include('vueClient.partials.head')
@include('vueClient.partials.menu')

<section class="page-section portfolio" id="portfolio">

    <div class="container mt-5">
        <div class="row justify-content-between">
            <div class="col-md-6 simulateur">
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-3">Simulation</h2>
                <div class="col-md-12 mb-5">
                    <div>
                        <p>Renseignez votre salaire mensuel afin de calculer la quotité !</p>
                        <span></span>
                        <div class="input-group mb-3">
                        <input type="text" class="form-control focus" placeholder="Renseignez votre salaire" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2" style="border-radius: 0px">Calculer</button>
                    </div>
                    <div>
                        <p>Selectionnez la souhaiter pour le prêt !</p>
                        <div class="input-group mb-3">
                        <input type="date" class="form-control focus" placeholder="Renseignez votre salaire" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-secondary" id="button-addon2" style="border-radius: 0px">Date</button>
                    </div>
                </div>
                <div class="col-md-12 my-5 p-0">
                    <label for="montant">Montant</label><input type="text" name="" id="" class="form-control col-md-3 float-right" value="{{ $simulateur->montantMin }}"><br>
                </div>
                <div class="col-md-12 m-0 p-0">
                    <div class="col-md-12 mb-2 p-0">                        
                        <span>{{ $simulateur->montantMin }}</span>                         
                        <span class="float-right">{{ $simulateur->montantMax }}<span>
                    </div>
                    <div class="col-md-12 m-0 p-0">
                        <input type="range" name="" id="" min="{{ $simulateur->montantMin }}" max="{{ $simulateur->montantMax }}" value="{{$simulateur->montantMin}}" step="100" class="form-control-range  focus">
                    </div>
                </div>
                <div class="col-md-12 mt-5 p-0">
                    <label for="montant">Durée</label><input type="text" name="" id="" class="form-control col-md-3 float-right" value="{{$simulateur->dureeMin}}"><br>
                </div>
                <div class="col-md-12 mt-4 p-0">
                    <span>{{$simulateur->dureeMin}}</span>
                    <span class="float-right">{{$simulateur->dureeMax}}</span>
                    <div class="input-group mb-3">
                        <input type="range" name="" id="" min="{{$simulateur->dureeMin}}" max="{{$simulateur->dureeMax}}" step="1" value="{{$simulateur->dureeMin}}" class="form-control focus">
                    </div>
                </div>
                <button id="btn" class="btn btn-danger mt-3 lancer" type="submit">Lancer la simulation !</button>
            </div>
        </div>
    </div>
    <div class="col-md-6 justify-content-between resultat">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-3">Résultat</h2>
        <div class="col-md-12 justify-content-between border">
            <dt class="col-md-6 d-inline">Montant du crédit</dt>
            <span class="col-md-6 float-right">1000000<span> FCFA</span></span>
        </div>
        <div class="col-md-12 border ">
            <dt class="col-md-6 d-inline">Mensualité</dt>
            <span class="col-md-6 d-inline result float-right">422523<span> FCFA</span></span>
        </div>
        <div class="col-md-12 border">
            <dt class="col-md-6 d-inline">Taux</dt>
            <span class="col-md-6  d-inline result float-right">{{ $simulateur->taux }}<span> %</span></span>
        </div>
        <div class="col-md-12 border">
            <dt class="col-md-6 d-inline">Durée</dt>
            <span class="col-md-6  d-inline result float-right">1<span> Mois</span></span>
        </div>
        <div class="col-md-12 border">
            <dt class="col-md-6 d-inline">Montant Total</dt>
            <span class="col-md-6  d-inline result float-right">10.000.000<span> FCFA</span></span>
        </div>
        <h5 class="page-section-heading text-center text-uppercase text-secondary my-3">Tableau d'amortissement</h5>
        <div class="col-md-12 mb-5 p-0">
            <table class="table table-hover table-responsive">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Dates</th>
                    <th scope="col">Capital</th>
                    <th scope="col">Échéances</th>
                    <th scope="col">Intérêts</th>
                    <th scope="col">Capital remboursé</th>
                    <th scope="col">Capital restant</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                </tbody>
              </table>
        </div>
        <a href="#" class="btn btn-secondary">Enregistrer le Pdf !</a>
        <a href="{{route('simulateur.credits.index')}}" class="btn btn-danger">Prendre un rendez-vous !</a>
    </div>
</section>

@include('vueClient.partials.footer')

<script>
    $('.resultat').hide();
    $('.lancer').click(function() {
        $('.resultat').show();
    });
</script>
