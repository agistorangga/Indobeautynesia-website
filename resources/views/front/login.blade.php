<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="{{ asset('front/style/css/style.css') }}">
</head>
<body>

<div class="login-container">
  <form action="{{ route('front.loginproses') }}" method="post" id="contactForm">
  @csrf
    <div class="form-container" >
      <div class="form-sections mb">
        <div class="heading-container">
          <h1 class="heading">Login</h1>
        </div>
      </div>
      <div class="form-sections">
        <div class="form-fields">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="input-field" tabindex="1" required />
        </div>
        <div class="form-fields">
          <label for="pass">Password</label>
          <div id="pass-field-container">

            <input type="password" name="password" id="pass" class="input-field" required tabindex="2" />
            <input type="checkbox" id="see" class="input-field" title="Click to view password" tabindex="3" />
          </div>
        </div>
        <div class="form-fields">
          <input type="submit" value="Log In" class="login-btn" tabindex="4" />
        </div>
      </div>
    </div>
  </form>
  @csrf
</div>

<script src="{{ asset('front/style/js/script.js') }}"></script>


</body>
</html>