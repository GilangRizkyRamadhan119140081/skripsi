<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    </style>
</head>
<body>
<section>
    <div class="container">
        <div class="row">
            
            <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                <form id="align-form" action="{{ url('pages/komentar')}}/{{  $situs->id_situs }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <h4>Leave a comment</h4>
                        <label for="message">Comment</label>
                        <textarea name="message" id="message" cols="30" rows="5" class="form-control" style="background-color: rgb(255, 255, 255);" required></textarea>
                    </div>
                    {{-- <input type="hidden" name="page_id" value="{{ $situs->id_situs }}"> --}}
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="fullname" class="form-control" required>
                    </div>
                    {{-- <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control" required>
                    </div> --}}
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
</body>
</html>
