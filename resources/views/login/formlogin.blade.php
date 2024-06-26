<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Persuratan</title>
    @vite(['resources/js/app.js','resources/css/app.css'])
</head>
<body class="bgColor">
    <div class="container">
        <div class="row">
            <div class="d-flex flex-column min-vh-100 min-wh-100">
                <div class="d-flex flex-grow-1 justify-content-center align-items-center">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <h1>Form Login</h1>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="username@email.com" />
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" class="form-control" name="username" placeholder="username@email.com" />
                                </div>
                            </div>
                            <div class="card-footer">
                                <btn class=" btn btn-success">Login</btn>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>