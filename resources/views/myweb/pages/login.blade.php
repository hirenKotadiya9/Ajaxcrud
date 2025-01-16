<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Best Home Page with Animations</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="myweb/style.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header text-center">
                  <h4>Login</h4>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember" value="1">
                    <label class="form-check-label" for="remember">Remember Me</label>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <a href="{{ route('register') }}">New User? Click Here to Register</a>
                </div>
              </div>
            </div>
          </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
          @if (session('success'))
              Swal.fire({
                  icon: 'success',
                  title: 'Login Successful',
                  text: '{{ session('success') }}',
                  timer: 3000,
                  showConfirmButton: false
              });
          @endif
          @if (session('error'))
              Swal.fire({
                  icon: 'error',
                  title: 'Login Failed',
                  text: '{{ session('error') }}',
                  timer: 3000,
                  showConfirmButton: false
              });
          @endif
      });
    </script>
</body>
</html>
