@include('vueClient.partials.head')
@include('vueClient.partials.menu')
    
<section class="page-section sections" id="contact">
    <div class="container">
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0  mt-30">Contact Me</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"></div>
            <div class="divider-custom-line"></div>
        </div>

        <!-- Contact Section Form-->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <form  method="POST" action="{{route('simulateur.contact.store')}}">
                    @csrf

                    <div class="control-group">
                        <div class="form-group row floating-label-form-group controls mb-0 pb-2">
                            <div class="col-md-6">
                                <label>Nom</label>
                                <input class="form-control" name="nom"  id="name" type="text" placeholder="Nom" required="required" data-validation-required-message="Veillez renseigner votre nom." autofocus/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="col-md-6">
                                <label>Prénom</label>
                                <input class="form-control" name="prenom"  id="prenom" type="text" placeholder="Prénom" required="required" data-validation-required-message="Veillez rrenseigner votre prénom." autofocus/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group row floating-label-form-group controls mb-0 pb-2">
                            <div class="col-md-6">
                                <label>Email Address</label>
                                <input class="form-control" name="email"  id="email" type="email" placeholder="Email Address" required="required" data-validation-required-message="Veillez renseigner votre adresse email." autofocus/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="col-md-6">
                                <label>Date de naissance</label>
                                <input class="form-control" name="dateNaissance"  id="date_naissance" type="date" placeholder="Date de naissance" required="required" data-validation-required-message="ce champ est obligatoir." autofocus/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group row floating-label-form-group controls mb-0 pb-2">
                            <div class="col-md-6">
                                <label>Pays de résidence</label>
                                <input class="form-control" name="pays"  id="pays" type="text" placeholder="Pays" required="required" data-validation-required-message="Veillez renseigner votre pays." autofocus/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="col-md-6">
                                <label>Ville</label>
                                <input class="form-control" name="ville"  id="ville" type="text" placeholder="Ville" required="required" data-validation-required-message="Veillez renseigner votre ville." autofocus/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group row floating-label-form-group controls mb-0 pb-2">
                            <div class="col-md-6">
                                <label>Téléphone</label><br>
                                <input class="form-control" name="telephone"  id="phone" type="tel" placeholder="Téléphone" required="required" data-validation-required-message="Veillez renseigner votre numéro de téléphone." autofocus/>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="col-md-6">
                                <label>Agence Souhaitée</label><br>
                                <select name="agence_id" class="form-control selects" id="agence" placeholder="Agence" required="required" data-validation-required-message="ce champ est obligatoir." style="border: none;">
                                    <option value="">Choisir une agence</option>
                                    @foreach ($agences as $agence)
                                        <option value="{{$agence->id}}">{{$agence->nom}}</option>
                                    @endforeach
                                </select>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group row floating-label-form-group controls mb-0 pb-2">
                            <div class="col-md-6">
                                <label>Civilité</label><br>
                                <select class="form-control selects" name="etatCivil"  id="date" required="required" data-validation-required-message="ce champ est obligatoir !." style="border: none;" autofocus>
                                    <option value="">Genre</option>
                                    <option value="mme">Madame</option>
                                    <option value="mr">Monsieur</option>
                                </select>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="col-md-6">
                                <label>Date du rendez-vous</label><br>
                                <input class="form-control" name="dateRdv"  id="date" type="date" placeholder="Date du rendez-vous" required="required" data-validation-required-message="ce champ est obligatoir !." autofocus/>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-0 pb-2">
                            <label>Motif</label>
                            <textarea class="form-control" name="motif"  id="message" rows="5" placeholder="Motif" required="required" data-validation-required-message="Ce champ est obligatoire."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br />
                    <div id="success"></div>
                    <div class="form-group"><button class="btn btn-primary btn-xl"type="submit">Envoyer</button></div>
                </form>
            </div>
        </div>
        @include('vueClient.partials.footer')

    </div>
</section>