<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="cache-control" content="no-cache">
    <title>KsWears</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./public/css/style.css">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <a class="navbar-brand" href="./views/Home.php"><b><span class="firstWord">KS WEARS</span></b><span class="secondWord">
                    WORKOUT IN STYLE</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="./views/Login.php"><i class="bi bi-box-arrow-in-right"></i> Sign in</a>
                    <li class="nav-item">
                        <a class="nav-link active" href="./views//Signup.php"><i class="bi bi-r-circle"></i> Register</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

<body>
    <main>
        <!-- Hero Section -->
        <section class="banner">
            <div class="container text-center">
                <h2>The Best Sportswear<br>Designed for You in Town</h2>
                <p class="lead">Eat better. Wear better. Live better. <i>#betterlife</i><br>Make sport your medicine, and
                    our sportswear the comfort. <i>#lifestyle</i></p>
                <hr class="my-4">
            </div>
        </section>

        <!-- Image Section -->
        <section class="welcomeImg">
            <div class="container text-center">
                <img src="./Medias/Sportswear Shop.jpg" alt="running" class="img-fluid">
            </div>
        </section>

        <!-- Quotes Section -->
        <section class="quotes">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="lead">In the adrenaline-pumping world of sports, athletes strive for excellence, pushing
                            their bodies to the limits and surpassing boundaries. From the roar of the crowd to the sweet
                            taste of victory, sports create moments of pure euphoria.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="lead">Sportswear blends style with functionality, providing athletes with the perfect
                            gear to enhance their performance. From moisture-wicking fabrics to ergonomic designs, sportswear
                            is tailored to meet the demands of rigorous training.</p>
                        <p class="lead">Athleisure has become a fashion phenomenon, seamlessly integrating sportswear into
                            everyday outfits. Now, you can look chic and feel comfortable whether you're hitting the gym or
                            strolling down the streets.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cards Section -->
        <section class="cardcontainer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="..." class="card-img-top" alt="Running Image">
                            <div class="card-body">
                                <h5 class="card-title">Running</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">#Marathon</h6>
                                <p class="card-text">Jogging, the rhythmic and invigorating sport that embraces the spirit
                                    of freedom and movement. With each step, their feet kiss the pavement, forging a
                                    connection with the earth beneath them.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="..." class="card-img-top" alt="Soccer Image">
                            <div class="card-body">
                                <h5 class="card-title">Soccer</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">#PremierLeague</h6>
                                <p class="card-text">In the world of sports, few games can rival the sheer passion and
                                    excitement that soccer brings to millions of fans worldwide. Soccer is more than just a
                                    game; it has transcended cultural barriers and social divides.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="..." class="card-img-top" alt="Tennis Image">
                            <div class="card-body">
                                <h5 class="card-title">Tennis</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">#RolandGarros</h6>
                                <p class="card-text">A captivating sport that combines power, precision, and finesse, has
                                    been captivating audiences around the world. The elegance of the serve, the artistry of
                                    the volleys, and the thrill of a perfectly executed passing shot—tennis has it all.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include "./views/includes/Footer.php"; ?>