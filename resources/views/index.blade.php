<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtering Email - Naive Bayes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="https://www.upnjatim.ac.id/wp-content/uploads/2018/05/logoupnbaru.png">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">
                {{-- <img src="https://www.upnjatim.ac.id/wp-content/uploads/2018/05/logoupnbaru.png" alt="Logo"
                    width="30" height="30" class="d-inline-block align-text-top"> --}}
                Filtering Email
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item "><a class="nav-link active" href="/testing">Testing</a></li>
                    <li class="nav-item"><a class="nav-link" href="/akurasi">Akurasi</a></li>
                    {{-- <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" target="_blank"
                            href="https://www.instagram.com/lovianub/">Contact</a></li> --}}
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <header class="bg-light text-center pt-5">
        <div class="container">
            <h1 class="text-primary">Naive Bayes Email Filtering</h1>
            <p class="lead">A simple and efficient way to classify emails.</p>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container my-5" style="height: 50vh">
        <div class="row">
            <div class="col-md-8 mx-auto border bg-white shadow-sm p-4 rounded border border">
                <form action="/analyze" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="keywordInput" class="form-label">Keyword</label>
                        <input type="text" class="form-control" id="keywordInput"
                            placeholder="e.g., spam, offer, discount" name="keywords" required>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="emailBody" class="form-label">Email Body</label>
                        <textarea class="form-control" id="emailBody" rows="5" name="body" placeholder="Type email content here..."></textarea>
                    </div> --}}
                    <button type="submit" class="btn btn-primary w-100">Analyze</button>

                </form>

            </div>
        </div>

    </main>


    <!-- Footer -->
    <footer class="bg-primary py-4 text-center text-light mt-auto">
        <div class="container">
            <p class="mb-0">&copy; Kelompok 14. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
