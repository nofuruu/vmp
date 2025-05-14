<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Login vmp</title>
</head>
<style>
    body {
        background-color: #24252a;
    }
</style>

<body>
    <div class="container d-flex justify-content-center mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">login vmp</h3>
            </div>
            <div class="card-body">
                <form id="loginForm">
                    <div class="form-group">
                        <span class="label"><i class="fa fa-user"></i> Username</span>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="form-group">
                        <span class="label"><i class="fa fa-key"></i>Password</span>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script>
    $(document).ready(function() {

        const username = $('#username').val();
        const password = $('#password'.val())

        $('#loginForm').on('submit', function() {
            $.ajax({
                url: '',
                type: 'POST',
                data: {
                    username,
                    password
                },
                success: function(response) {
                    if (response.status === true) {
                        Swal.fire({
                            icon: 'success',
                            text: 'login success'
                        }).then(() => {
                            windows.response.redirect
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: 'something wrong, please again later'
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: response.status
                    })
                }
            })
        })
    })
</script>

</html>