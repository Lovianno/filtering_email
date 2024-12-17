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

    <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="scoreModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title " id="staticBackdropLabel">HASIL SCORE :</h5>
                    <a href="/"> <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button></a>
                </div>
                <div class="modal-body text-center">
                    <!-- Judul -->
                    <h5 class="fw-bold"></h5>

                    <!-- Score HAM -->
                    <p>Score HAM: <strong>{{ sprintf('%.10f', $finalScore['hamProbability']) }}</strong></p>

                    <!-- Score SPAM -->
                    <p>Score SPAM: <strong>{{ sprintf('%.10f', $finalScore['spamProbability']) }}</strong></p>

                    <!-- Hasil Dokumen -->
                    <p class="mb-2">Dokumen Uji Termasuk:</p>
                    <button class="btn btn-success btn-lg" disabled>{{ $finalScore['score'] }}</button>
                </div>
                {{-- <div class="modal-footer">
                    <a href="/"> <button type="button" class="btn btn-primary">Continue</button>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if ($result) // Jika $result ada, tampilkan modal
                var resultModal = new bootstrap.Modal(document.getElementById('resultModal'));
                resultModal.show();
            @endif
        });
    </script>

</body>

</html>
