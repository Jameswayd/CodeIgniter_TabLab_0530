<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .container h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input {
            width: 288px;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .form-group .error-message {
            color: red;
        }
        .form-group .success-message {
            color: green;
        }
        .form-group .btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #a5ffee;
            color: black;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="form-group">
                <p class="error-message"><?= session()->getFlashdata('error') ?></p>
            </div>
        <?php endif; ?>
        <form action="login" method="post">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
