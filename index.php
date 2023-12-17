<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="cache-control" content="no-cache">
    <title>SportShoeHub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./public/css/style.css">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <a class="navbar-brand" href="./views/Home.php"><b><span class="firstWord">SportShoeHub</span></b><span class="secondWord">
                    STEP INTO PERFORMANCE</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="./views/Login.php"><i class="bi bi-box-arrow-in-right"></i> Sign in</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./views//Signup.php"><i class="bi bi-r-circle"></i> Register</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

<body class="index-page">
    <main>
        <!-- Hero Section -->
        <section class="banner">
            <div class="container text-center">
                <h2>Discover the Perfect Fit<br>for Your Active Lifestyle</h2>
                <p class="lead">Step into a world of comfort, style, and performance. Elevate your game, enhance your
                    run, and conquer every step with our premium sports shoe collection.</p>
                <hr class="my-4">
            </div>
        </section>

        <!-- Image Section -->
        <section class="welcomeImg">
            <div class="container text-center">
                <img src="https://s3-media0.fl.yelpcdn.com/bphoto/DJQJtj_KXpyQGoL8DKY_Vg/l.jpg" alt="running" class="img-fluid">
            </div>
        </section>

        <!-- Quotes Section -->
        <section class="quotes">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="lead">In the fast-paced world of sports, where every step counts, your choice of
                            footwear is crucial. Our sports shoes are designed to provide the perfect blend of
                            performance, durability, and style.</p>
                    </div>
                    <div class="col-md-6">
                        <p class="lead">From running on the track to dominating the basketball court, our collection
                            caters to all athletes. Engineered with cutting-edge technology and crafted with precision,
                            our shoes will take your performance to new heights.</p>
                        <p class="lead">Step into the future of sports footwear. SportShoeHub is not just a store; it's a
                            destination for those who seek excellence in every stride.</p>
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
                            <img src="https://www.eatingwell.com/thmb/noKHUGYETXcLrxOHFEtbDd9fRlQ=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/best-running-shoes-for-men-01-52191575003b4281ac1cf2d7b29b5362.jpg" class="card-img-top" alt="Running Shoe Image">
                            <div class="card-body">
                                <h5 class="card-title">Running Shoes</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">#RunWithStyle</h6>
                                <p class="card-text">Experience unmatched comfort and support with our range of running
                                    shoes. Designed to cushion every step and propel you forward.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="https://blog.finishline.com/wp-content/uploads/2021/02/How_To_Buy_Choose_Basketball_Shoes-1024x683.jpg" class="card-img-top" alt="Basketball Shoe Image">
                            <div class="card-body">
                                <h5 class="card-title">Basketball Shoes</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">#HoopsLife</h6>
                                <p class="card-text">Elevate your game on the court with our high-performance basketball
                                    shoes. Designed for agility, stability, and style.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img src="https://static.standard.co.uk/2023/09/21/19/best%20winter%20running%20trainers.jpg?crop=8:5,smart&quality=75&auto=webp&width=1024" class="card-img-top" alt="Training Shoe Image">
                            <div class="card-body">
                                <h5 class="card-title">Training Shoes</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary">#TrainHard</h6>
                                <p class="card-text">Hit the gym in style with our versatile training shoes. Engineered
                                    for flexibility, durability, and maximum performance during your workouts.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php include "./views/includes/Footer.php"; ?>
</body>

</html>