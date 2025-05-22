<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register | VMP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<style>

</style>

<body>
    <div class="register-container">
        <div class="back-container">
            <a href="{{ url('login') }}">
                <i class="fa fa-arrow-left"></i>
                <span class="back-text">Back</span>
            </a>
        </div>
        <div class="left-panel">
            <h1>Register VMP</h1>
            <p>registration form</p>
            <i class="fa fa-file-audio fa-3x mt-4"></i>
        </div>
        <div class="right-panel">
            <p>Fill the registration requirements bellow</p>
            <div class="loader" class="loading-spinner" style="display: none;">
                <div class="tenor-gif-embed" data-postid="17442480" data-share-method="host" data-aspect-ratio="1" data-width="100%"><a href="https://tenor.com/view/bttv-rolling-cat-cute-pixelated-gif-17442480">Bttv Rolling Cat Sticker</a>from <a href="https://tenor.com/search/bttv-stickers">Bttv Stickers</a></div>
                <script type="text/javascript" async src="https://tenor.com/embed.js"></script>
            </div>
            <form id="registerForm">
                <div class="form-group">
                    <i class="fa fa-user"></i>
                    <input type="text" name="username" id="username" placeholder="" required>
                    <label for="userame">Username</label>
                </div>
                <div class="form-group">
                    <i class="fa fa-envelope"></i>
                    <input type="text" name="email" id="email" placeholder="" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-group">
                    <i class="fa fa-key"></i>
                    <input type="password" name="password" id="password" placeholder="" required>
                    <label for="password">Password</label>
                </div>
                <div class="form-group">
                    <i class="fa fa-key"></i>
                    <input type="password" name="password_confirm" id="password_confirm" placeholder="" required>
                    <label for="password_confirm">Confirm Password</label>
                </div>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>

    <div id="loadingOverlay" style="display: none;">
        <div class="loader-container">
            <div class="dot-loader">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
<script src="{{ asset('js/toast.js') }}"></script>
<script>
    function showLoading() {
        document.getElementById("loadingOverlay").style.display = "flex";
    }

    function hideLoading() {
        document.getElementById("loadingOverlay").style.display = "none";

    }

    function loadingStart() {
        //fungsi untuk menambahkan loading setiap masuk ke halaman ini
        showLoading();
        setTimeout(() => {
            hideLoading();
        }, 3000);
    }


    $(document).ready(function() {
        loadingStart();
        $('#registerForm').on('submit', function(e) {
            e.preventDefault();
            const data = {
                name: $('#username').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                password_confirm: $('#password_confirm').val()
            };
            $.ajax({
                url: 'http://10.21.1.125:8000/api/register',
                type: 'POST',
                contentType: 'application/json',
                headers: {
                    'Accept': 'application/json'
                },
                data: JSON.stringify(data),
                success: function(response) {
                    if (response.status === true) {
                        notify("success", "Registration complete")
                        setTimeout(() => {
                            showLoading();
                            window.location.href = "{{ url('/login') }}";
                        }, 2000);
                    } else {
                        notify("error", "Registration failed, try again")
                    }
                },
                error: function(xhr) {
                    notify("error", xhr.responseText)
                }
            });
        });

    });
</script>

</html>