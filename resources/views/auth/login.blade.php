<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login | VMP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<style>
    .loading-spinner {
        position: absolute;
        top: 15px;
        right: 15px;
        width: 24px;
        height: 24px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #741efe;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        z-index: 999;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg)
        }
    }
</style>

<body>
    <div class="login-container" data-aos="fade-right">
        <div class="left-panel" data-aos="fade-left">
            <i class="fas fa-forward fa-3x mt-4"></i>
            <p>Get an endless experience to listening music</p>
        </div>
        <div class="right-panel" data-aos="fade-right">
            <h2>Welcome to <strong>VMP</strong></h2>
            <p>Virtual Music Player Web Application</p>
            <form id="loginForm">
                <div id="loader" class="loading-spinner" style="display: none;"></div>
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
                <h6>Dont have account? <a href="{{ url('/register') }}" class="basic-link">Register</a></h6>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
<script src="{{ asset('js/toast.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();
            const username = $('#username').val();
            const password = $('#password').val();
            $('#loader').show();

            $.ajax({
                url: 'http://10.21.1.125:8000/api/login',
                type: 'POST',
                dataType: 'json',
                data: {
                    username,
                    password
                },
                success: function(response) {
                    if (response.status === true) {
                        localStorage.setItem('user_id', response.user_id);
                        localStorage.setItem('user_name', response.user.name);
                        $.ajax({
                            type: 'POST',
                            url: '/set-session',
                            data: {
                                user_id: response.user.id,
                                user_name: response.user.name,
                                jwt_token: response.access_token
                            },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(sessionResponse) {
                                $('#loader').hide();
                                if (sessionResponse.status === true) {
                                    notify("success", "Login Success");
                                    setTimeout(() => {
                                        window.location.href = "{{url('/dashboard') }}"
                                    }, 2000);
                                } else {
                                    notify("error", "Something wrong please try again")
                                }
                            },
                            error: function(xhr) {
                                $('#loader').hide();
                                notify("error", xhr.responseText || 'Gagal set session');
                            }
                        });
                    } else {
                        notify("error", response.message || 'Gagal set session');
                    }
                },
                error: function(xhr) {
                    $('#loader').hide();
                    notify("error", "Password or username incorrect")
                }
            });
        });
    });
</script>

</html>