<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootsrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>FruitShakePos</title>
</head>
<body>
    <section class="vh-100 custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card" style="border-radius: 3rem;">
                        <div class="card-body p-5 bg" style="border-radius: 3rem;">

                            <div class="mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase text-center text-main">Fruit Shake Pos</h2>
                                <p class="mb-5 text-center text">Please enter your credentials below to continue</p>

                                <!-- Start Form -->
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf  
                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <label for="exampleInputEmail1" class="form-label text">Username</label>
                                        <input type="email" id="typeEmailX" class="form-control form-control-lg input" placeholder="Enter your username" name="email" required />
                                    </div>

                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <label class="form-label text" for="typePasswordX">Password</label>
                                        <input type="password" id="typePasswordX" class="form-control form-control-lg input" placeholder="Enter your password" name="password" required />
                                    </div>

                                    <p class="small mb-5 pb-lg-2 text-end text">
                                        <a class="text" href="#!">Forgot password?</a>
                                    </p>

                                    <div class="text-center submit-btn">
                                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-lg px-5" type="submit">Login</button>
                                    </div>
                                </form>
                                <!-- End Form -->

                                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                                </div>

                            </div>

                            <div>
                                <p class="mb-0 text-center text">Don't have an account? <a href="#!" class="text">Sign Up</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>