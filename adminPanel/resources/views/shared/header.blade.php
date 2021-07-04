@include('bootstrap')
<style>
    .carousel-item{
        height: 50rem;
    }
    .image{
        height: 50rem;
    }
</style>


<main role="main">

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="image" src="{{asset('images/banner/ea.jpg')}}" alt="First slide">
                <div class="container">
                </div>
            </div>
            <div class="carousel-item">
                <img class="second-slide" src="{{asset('images/banner/pubg.png')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="third-slide" src="{{asset('images/banner/VALORANT.jpg')}}" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



</main>


