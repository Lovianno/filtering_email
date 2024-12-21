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
                    <li class="nav-item "><a class="nav-link " href="/">Testing</a></li>
                    <li class="nav-item"><a class="nav-link active" href="/akurasi">Akurasi</a></li>
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
            <h1 class="text-primary">Akurasi Data Testing</h1>
            {{-- <p class="lead">A simple and efficient way to classify emails.</p> --}}
        </div>
    </header>

    <!-- Main Content -->
    <main class="container my-4">
        <div class="row">
            <div class="col-md-8 mx-auto border bg-white shadow-sm p-4 rounded border border">
                <div class="alert alert-primary" role="alert">
                    Akurasi Data Uji <span class="text-decoration-underline ">80%</span>
                </div>
                <table class="table   table-striped ">
                    <thead class="bg-primary table-primary">
                        <tr>
                            <th scope="col">Data Uji</th>
                            <th scope="col">Daftar Kata Email</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Credit, investigation, money, security</td>
                            <td>SPAM</td>
                            <td>Benar</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>debt, financial, solution, number</td>
                            <td>SPAM</td>
                            <td>Benar</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Symposium, computational, semantics, speakers</td>
                            <td>HAM</td>
                            <td>Benar</td>
                        </tr>
                        <tr>
                            <th scope="row">4</th>
                            <td>Workshop, genre, speakers, translation</td>
                            <td>HAM</td>
                            <td>Benar</td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Corpus, frequency, preference, analysis</td>
                            <td>HAM</td>
                            <td>Salah</td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
                            <td>Symbols, International, Collaboration, Membership</td>
                            <td>HAM</td>
                            <td>Benar</td>
                        </tr>
                        <tr>
                            <th scope="row">7</th>
                            <td>Reminder, Package, Order, Service</td>
                            <td>SPAM</td>
                            <td>Benar</td>
                        </tr>
                        <tr>
                            <th scope="row">8</th>
                            <td>Spam, Donation, Investigation, Action</td>
                            <td>SPAM</td>
                            <td>Benar</td>
                        </tr>
                        <tr>
                            <th scope="row">9</th>
                            <td>Application, Period, Send, Inform</td>
                            <td> HAM
                            </td>
                            <td>Salah</td>
                        </tr>
                        <tr>
                            <th scope="row">10</th>
                            <td>Attitudes, Thesis, Vocabulary, Research</td>
                            <td>HAM</td>
                            <td>Benar</td>
                        </tr>

                    </tbody>
                </table>
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
