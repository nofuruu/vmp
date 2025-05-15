<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | VMP Music</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login-container" data-aos="fade-right">
        <div class="left-panel" data-aos="fade-left">
            <h1>Join VMP</h1>
            <p>Get an endless experience to listening music</p>
            <i class="fas fa-music fa-3x mt-4"></i>
        </div>
        <div class="right-panel" data-aos="fade-right">
            <h2>Welcome to <strong>VMP</strong></h2>
            <p>Virtual Music Player Web Application</p>
            <div id="loader" class="loading-spinner" style="display: none;"></div>
            <form id="loginForm">
                <div class="form-group">
                    <i class="fa fa-user"></i>
                    <input type="text" id="username" name="usernm" placeholder=" " required>
                    <label for="username">Username</label>
                </div>
                <div class="form-group">
                    <i class="fa fa-key"></i>
                    <input type="password" id="password" name="password" placeholder=" " required>
                    <label for="password">Password</label>
                </div>
                <button type="submit" class="login-btn" data-aos="fade-right">Log in</button>
            </form>
            <div class="footer mt-2">
                <h6>Dont have account? <a href="" class="basic-link">Register</a></h6>
            </div>
        </div>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('#formLogin').on('submit', function(e) {
            e.preventDefault(); // penting: mencegah reload
            const username = $('#username').val();
            const password = $('#password').val();

            $.ajax({
                url: '', // ganti dengan URL proses login kamu
                type: 'POST',
                dataType: 'json',
                data: {
                    username,
                    password
                },
                success: function(response) {
                    if (response.status === true) {
                        Swal.fire({
                            icon: 'success',
                            text: 'Login success'
                        }).then(() => {
                            window.location.href = response.redirect;
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: 'Something went wrong, please try again.'
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        text: 'Connection error. Please try later.'
                    });
                }
            });
        });
    });
</script>

</html>