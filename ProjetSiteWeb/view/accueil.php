<?php include'header.php';?>

<div class="">

        <div id="slider" class="sl-slider-wrapper">

        <div class="sl-slider">

          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-1"></div>
             <h2>Trouver votre appartenance</h2>
              <blockquote>
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 6400 16e Avenue, Montreal</p>
              <!--<p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p>-->
              <cite>$ 650</cite>
              </blockquote>
            </div>
          </div>

          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-2"></div>
              <h2>Trouver votre appartenance</h2>
              <blockquote>
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 6400 16e Avenue, Montreal</p>
              <cite>$ 655</cite>
              </blockquote>
            </div>
          </div>

          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
               <div class="sl-slide-inner">
              <div class="bg-img bg-img-3"></div>
              <h2>Trouver votre appartenance</h2>
              <blockquote>
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 6400 16e Avenue, Montreal</p>
              <cite>$ 620</cite>
              </blockquote>
            </div>
          </div>

          <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
              <div class="bg-img bg-img-4"></div>
              <h2>Trouver votre appartenance</h2>
              <blockquote>
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 6400 16e Avenue, Montreal</p>
              <cite>$ 550</cite>
              </blockquote>
            </div>
          </div>

          <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
            <div class="sl-slide-inner">
              <div class="bg-img bg-img-5"></div>
              <h2>Trouver votre appartenance</h2>
              <blockquote>
              <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 6400 16e Avenue, Montreala</p>
              <cite>$ 670</cite>
              </blockquote>
            </div>
          </div>
        </div><!-- /sl-slider -->

        <nav id="nav-dots" class="nav-dots">
          <span class="nav-dot-current"></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </nav>

      </div><!-- /slider-wrapper -->
</div>


<!-- begin banner -->
<div class="banner-search">
  <div class="container">
    <!-- banner -->
    <h3>Recherche</h3>
    <div class="searchbar">
      <div class="row">
        <div class="col-lg-6 col-sm-6">
          <input type="text" class="form-control" placeholder="Recherche par">

            <div class="row">
            <div class="col-lg-12 col-sm-12">
              <div class="slider slider-horizontal" style="width:100%; height:50px;">
              <span><b>0</b></span>
                <div class="slider-track">
                  <div class="slider-selection" >
                    <div class="slider-handle round"></div>
                    <div data-slider-min="100"></div>
                  </div>
                </div>
              <span class="pull-right"><b>1200</b></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-3 col-sm-3 ">
              <select class="form-control">
                <option>Acheter</option>
                <option>Louer</option>
                <option>Vendre</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
              <select class="form-control">
                <option>Prix</option>
                <option>$150,000 - $200,000</option>
                <option>$200,000 - $250,000</option>
                <option>$250,000 - $300,000</option>
                <option>$300,000 - plus</option>
              </select>
            </div>
            <div class="col-lg-3 col-sm-4">
            <select class="form-control">
                <option>Propriété</option>
                <option>Appartement</option>
                <option>Édifice</option>
                <option>Espaces de bureaux</option>
                </select>
              </div>
              <div class="col-lg-3 col-sm-5">
              <button class="btn btn-success"  onclick="window.location.href='?action=pageChercher'">Chercher</button>
              </div>
          </div>

        </div>
        <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
          <p>Inscrivez-vous et restez à l'affût des dernières annonces</p>
          <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Se connecter</button></div>
      </div>
    </div>
  </div>
</div>
<!-- end banner -->


<div class="container">
  <div class="properties-listing spacer"> <a href="?action=pageChercher" class="pull-right viewall">Voir l'ensemble de la liste</a>
    <h2>Présentation des propriétés</h2>
    <div id="owl-example" class="owl-carousel">
      <div class="properties">
        <div class="image-holder"><img src="images/properties/1.jpg" class="img-responsive" alt="properties"/>
          <div class="status sold">Vendu</div>
        </div>
        <h4><a href="?action=pageDetails">Royal Inn</a></h4>
        <p class="price">Price: $234,900</p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Chambres">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Salons">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Stationnement">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Cuisines">1</span> </div>
        <a class="btn btn-primary" href="?action=pageDetails">Voir les détails</a>
      </div>
      <div class="properties">
        <div class="image-holder"><img src="images/properties/2.jpg" class="img-responsive" alt="properties"/>
          <div class="status new">New</div>
        </div>
        <h4><a href="?action=pageDetails">Royal Inn</a></h4>
        <p class="price">Price: $234,900</p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Chambres">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Salons">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Stationnement">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Cuisines">1</span> </div>        <a class="btn btn-primary" href="?action=pageDetails">Voir les détails</a>
      </div>
      <div class="properties">
        <div class="image-holder"><img src="images/properties/3.jpg" class="img-responsive" alt="properties"/></div>
        <h4><a href="?action=pageDetails">Royal Inn</a></h4>
        <p class="price">Price: $234,900</p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Chambres">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Salons">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Stationnement">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Cuisines">1</span> </div>        <a class="btn btn-primary" href="?action=pageDetails">Voir les détails</a>
      </div>
      <div class="properties">
        <div class="image-holder"><img src="images/properties/4.jpg" class="img-responsive" alt="properties"/></div>
        <h4><a href="?action=pageDetails">Royal Inn</a></h4>
        <p class="price">Price: $234,900</p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Chambres">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Salons">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Stationnement">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Cuisines">1</span> </div>        <a class="btn btn-primary" href="?action=pageDetails">Voir les détails</a>
      </div>
      <div class="properties">
        <div class="image-holder"><img src="images/properties/1.jpg" class="img-responsive" alt="properties"/>
          <div class="status sold">Vendu</div>
        </div>
        <h4><a href="?action=pageDetails">Royal Inn</a></h4>
        <p class="price">Price: $234,900</p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Chambres">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Salons">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Stationnement">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Cuisines">1</span> </div>
        <a class="btn btn-primary" href="?action=pageDetails">Voir les détails</a>
      </div>
      <div class="properties">
        <div class="image-holder"><img src="images/properties/2.jpg" class="img-responsive" alt="properties"/>
          <div class="status sold">Vendu</div>
        </div>
        <h4><a href="?action=pageDetails">Royal Inn</a></h4>
        <p class="price">Price: $234,900</p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Chambres">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Salons">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Stationnement">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Cuisines">1</span> </div>
        <a class="btn btn-primary" href="?action=pageDetails">Voir les détails</a>
      </div>
      <div class="properties">
        <div class="image-holder"><img src="images/properties/3.jpg" class="img-responsive" alt="properties"/>
          <div class="status new">New</div>
        </div>
        <h4><a href="?action=pageDetails">Royal Inn</a></h4>
        <p class="price">Price: $234,900</p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Chambres">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Salons">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Stationnement">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Cuisines">1</span> </div>
        <a class="btn btn-primary" href="?action=pageDetails">Voir les détails</a>
      </div>
      <div class="properties">
        <div class="image-holder"><img src="images/properties/4.jpg" class="img-responsive" alt="properties"/></div>
        <h4><a href="?action=pageDetails">Royal Inn</a></h4>
        <p class="price">Price: $234,900</p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Chambres">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Salons">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Stationnement">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Cuisines">1</span> </div>
        <a class="btn btn-primary" href="?action=pageDetails">Voir les détails</a>
      </div>
      <div class="properties">
        <div class="image-holder"><img src="images/properties/1.jpg" class="img-responsive" alt="properties"/></div>
        <h4><a href="?action=pageDetails">Royal Inn</a></h4>
        <p class="price">Price: $234,900</p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Chambres">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Salons">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Stationnement">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Cuisines">1</span> </div>
        <a class="btn btn-primary" href="?action=pageDetails">Voir les détails</a>
      </div>
      <div class="properties">
        <div class="image-holder"><img src="images/properties/2.jpg" class="img-responsive" alt="properties"/></div>
        <h4><a href="?action=pageDetails">Royal Inn</a></h4>
        <p class="price">Price: $234,900</p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Chambres">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Salons">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Stationnement">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Cuisines">1</span> </div>
        <a class="btn btn-primary" href="?action=pageDetails">Voir les détails</a>
      </div>
      <div class="properties">
        <div class="image-holder"><img src="images/properties/3.jpg" class="img-responsive" alt="properties"/></div>
        <h4><a href="?action=pageDetails">Royal Inn</a></h4>
        <p class="price">Price: $234,900</p>
        <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Chambres">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Salons">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Stationnement">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Cuisines">1</span> </div>
        <a class="btn btn-primary" href="?action=pageDetails">Voir les détails</a>
      </div>
    </div>
  </div>


  <div class="spacer">
    <div class="row">
      <div class="col-lg-6 col-sm-9 recent-view">
        <h3>À propos de nous</h3>
        <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<br><a href="?action=pageAbout">Learn More</a></p>

      </div>
      <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
        <h3>Recommandé</h3>
        <div id="myCarousel" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1" class=""></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
            <li data-target="#myCarousel" data-slide-to="3" class=""></li>
          </ol>
          <!-- Carousel items -->
          <div class="carousel-inner">
            <div class="item active">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/1.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="?action=pageDetails">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p>
                  <a href="?action=pageDetails" class="more">Plus de détails</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/2.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="?action=pageDetails">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p>
                  <a href="?action=pageDetails" class="more">Plus de détails</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/3.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="?action=pageDetails">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p>
                  <a href="?action=pageDetails" class="more">Plus de détails</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-lg-4"><img src="images/properties/4.jpg" class="img-responsive" alt="properties"/></div>
                <div class="col-lg-8">
                  <h5><a href="?action=pageDetails">Integer sed porta quam</a></h5>
                  <p class="price">$300,000</p>
                  <a href="?action=pageDetails" class="more">Plus de détails</a> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
$("#ex15").slider({min:0,max:1000,value:[0,1000],focus:true});
</script>
<?php include'footer.php';?>
