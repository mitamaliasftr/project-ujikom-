@extends('base.layout')

@push('style')
@endpush

@section('content')
{{-- Jumbotron --}}
<section class="jumbotron text-center">
    <img src="img/pantai.jpg" class="img-fluid d-fixed" width="100%" height="500" alt="Hotel">
    <h1 class="display-4 fw-bold">Nginep.in Hotel</h1>
    <h4>Mau pesan hotel no ribet? Nginep in aja!</h4>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffc107" fill-opacity="1"
            d="M0,128L40,138.7C80,149,160,171,240,165.3C320,160,400,128,480,138.7C560,149,640,203,720,197.3C800,192,880,128,960,112C1040,96,1120,128,1200,133.3C1280,139,1360,117,1400,106.7L1440,96L1440,320L1400,320C1360,320,1280,320,1200,320C1120,320,1040,320,960,320C880,320,800,320,720,320C640,320,560,320,480,320C400,320,320,320,240,320C160,320,80,320,40,320L0,320Z">
        </path>
    </svg>
</section>
{{-- Akhir Jumbotron --}}

{{-- Tentang --}}
<section id="about">
    <div class="container">
        <div class="row text-center mb-3">
            <div class="col">
                <h2>Tentang Nginep.in</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center fs-5">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, velit? Consectetur, quia quod?
                    Pariatur, distinctio illo. Cumque consequuntur sequi numquam necessitatibus? Nemo sit eveniet non!
                </p>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1"
            d="M0,96L48,101.3C96,107,192,117,288,149.3C384,181,480,235,576,240C672,245,768,203,864,192C960,181,1056,203,1152,197.3C1248,192,1344,160,1392,144L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
        </path>
    </svg>
</section>
{{-- Akhir Tentang --}}

{{-- Kamar --}}
<section id="kamar">
    <div class="container">
        <div class="row text-center">
            <div class="col mb-3">
                <h2>Tipe Nginep</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 mb-3">
                <div class="card bg-warning">
                    <img src="img/kamar/deluxe.jpg" class="card-img-top" alt="deluxe">
                    <div class="card-body">
                        <h5 class="card-title">Nginep Deluxe</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card bg-warning">
                    <img src="img/kamar/superior.jpg" class="card-img-top" alt="superior">
                    <div class="card-body">
                        <h5 class="card-title">Nginep Superior</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
            <hr class="opacity-0">
            <div class="col-md-4 mb-3">
                <div class="card bg-warning">
                    <img src="img/kamar/standar.jpg" class="card-img-top" alt="standar">
                    <div class="card-body">
                        <h5 class="card-title">Nginep Standar</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card bg-warning">
                    <img src="img/kamar/twin.jpg" class="card-img-top" alt="twin">
                    <div class="card-body">
                        <h5 class="card-title">Nginep Twin</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffc107" fill-opacity="1" d="M0,160L30,176C60,192,120,224,180,224C240,224,300,192,360,202.7C420,213,480,267,540,250.7C600,235,660,149,720,138.7C780,128,840,192,900,208C960,224,1020,192,1080,186.7C1140,181,1200,203,1260,213.3C1320,224,1380,224,1410,224L1440,224L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z"></path></svg>
</section>
{{-- Akhir Kamar --}}
@endsection

@push('script')
@endpush