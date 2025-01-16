<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Add Customers</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="myweb/style.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="row justify-content-center">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header text-center">
                  <h4>Register Customers</h4>
                </div>
                <div class="card-body">

                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                  @endif
                  <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname"class="form-control"value="{{ old('firstname') }}"required>
                  </div>
                  <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname"class="form-control"value="{{ old('lastname') }}"required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email"class="form-control"value="{{ old('email') }}"required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="passwrod"class="form-control"value="{{ old('password') }}"required>
                  </div>
                  <div class="form-group">
                    <label for="county">Country</label>
                    <input type="text" name="country" id="county"class="form-control"value="{{ old('county') }}"required>
                  </div>
                  <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" name="state" id="state"class="form-control"value="{{ old('state') }}"required>
                  </div>
                  <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city"class="form-control"value="{{ old('city') }}"required>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary">Register</button>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <a href="{{ route('login') }}">Already have an account? Login</a>
                </div>
              </div>
            </div>
          </div>
        </form>
    </div>
</body>
</html>
