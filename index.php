<?php  require_once "Parts/Header.php"; ?>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-sm-12 col-md-6">
            <div id="carouselExampleCaptions" class="carousel slide carouselMain" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="Pics/family-list.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Manage you list shopping with family</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="Pics/multiple-list.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Manage a multiple Lists in one place</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="Pics/products.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Manage all you products</h5>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>


        </div>

        <div class="col-md-3"></div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-3">
            <div class="row">
                <div class="col-sm-12">
                    <img class="img-fluid howToUseImg" src="Pics/howToUse.jpg" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button class="btn btn-primary btn-lg howToUse">How to Use</button>
                </div>
            </div>
        </div>

        <div class=" col-sm-12 col-md-9 about">

            <div class="row">
                <div class=""></div>
                <div class="col-sm-12 col-md-10">

                    <b> This Website and app is builed to make the shopping experience more
                        efficient and easier.<br>
                        Part of the site's services is to help manage our shopping lists,
                        share and manage them with the family, save
                        products and restore lists</b>
                </div>
                <div class=" col-md-2"></div>

            </div>

        </div>
    </div>

</div>





<?php  require_once "Parts/footer.php"; ?>
</body>

</html>