
    <?php include('header.php'); ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="index.php"> <img src="assets/img/ftp.jpg" class="logo_img"></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li role="presentation"><a href="about.php">About </a></li>
                    <li role="presentation"><a href="gallery.php">Gallery </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="carousel slide" data-ride="carousel" id="carousel-1">
        <div class="carousel-inner" role="listbox">
            <div class="item"><img src="assets/img/1920x1080-wallpaper-1.jpg" alt="Slide Image"></div>
            <div class="item"><img src="assets/img/249342.jpg" alt="Slide Image"></div>
            <div class="item active"><img src="assets/img/hLGH5uk.jpg" alt="Slide Image"></div>
        </div>
        <div><a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i><span class="sr-only">Previous</span></a>
            <a class="right carousel-control" href="#carousel-1" role="button" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i><span class="sr-only">Next</span></a>
        </div>
        <ol class="carousel-indicators">
            <li data-target="#carousel-1" data-slide-to="0"></li>
            <li data-target="#carousel-1" data-slide-to="1"></li>
            <li data-target="#carousel-1" data-slide-to="2" class="active"></li>
        </ol>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Welcome To Fz</h1>
                <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-4"><i class="glyphicon glyphicon-shopping-cart icon-galaxy"></i>
                <h2 class="text-center">Galaxy </h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            </div>
            <div class="col-md-4"><i class="glyphicon glyphicon-shopping-cart icon-galaxy"></i>
                <h2 class="text-center">Galaxy </h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            </div>
            <div class="col-md-4"><i class="glyphicon glyphicon-shopping-cart icon-galaxy"></i>
                <h2 class="text-center">Galaxy </h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1>Gallery </h1></div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="thumbnail">
                    <a href="hLGH5uk.jpg" data-lightbox="glx"><img src="assets/img/hLGH5uk.jpg"></a>
                    <div class="caption">
                        <h3 class="text-center">Jupiter </h3>
                        <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                        <button class="btn btn-primary" type="button">Button</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail">
                    <a href="249342.jpg" data-lightbox="l1"><img src="assets/img/249342.jpg"></a>
                    <div class="caption">
                        <h3 class="text-center">Mars </h3>
                        <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                        <button class="btn btn-primary" type="button">Button</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail">
                    <a href="1920x1080-wallpaper-1.jpg" data-lightbox="l1"><img src="assets/img/1920x1080-wallpaper-1.jpg"></a>
                    <div class="caption">
                        <h3 class="text-center">Moon </h3>
                        <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                        <button class="btn btn-primary" type="button">Button</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="thumbnail">
                    <a href="galaxy-note8_design_planet.jpg" data-lightbox="l1"><img src="assets/img/galaxy-note8_design_planet.jpg"></a>
                    <div class="caption">
                        <h3 class="text-center">Eclipse </h3>
                        <p>Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                        <button class="btn btn-primary" type="button">Button</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>