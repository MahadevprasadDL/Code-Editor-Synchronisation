<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('download.jpg') no-repeat center center fixed; /* Background image */
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #fff;
        }

        h1 {
            color: white; /* Bright yellow */
            margin-bottom: 20px;
            font-size: 2.5em;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
        }

        h2 {
            color: #ff6b6b; /* Coral */
            margin-bottom: 15px;
            text-align: center;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .container {
            background: rgba(255, 255, 255, 0.95); /* More opaque white */
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            width: 350px;
            text-align: left; /* Align text to the left */
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            transition: border 0.3s;
            font-size: 1em; /* Slightly larger text */
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #ff6b6b; /* Change border color on focus */
            outline: none;
        }

        .error {
            color: #ff3860; /* Red */
            margin: 10px 0;
        }

        button {
            background-color: #ff6b6b; /* Coral */
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            font-size: 1em; /* Slightly larger text */
        }

        button:hover {
            background-color: #ff4d4d; /* Darker coral on hover */
        }

        .ca {
            display: block;
            margin-top: 15px;
            color: #555;
            text-decoration: none;
            transition: color 0.3s;
            text-align: center; /* Center the link */
        }

        .ca:hover {
            color: #ff6b6b; /* Coral on hover */
        }
    </style>
</head>
<body>
    <h1>Hello Developers...! <br>Welcome to the Code Editor Synchronisation</h1>
    <div class="container">
        <form action="login.php" method="post">
            <h2>LOGIN</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>User Name</label>
            <input type="text" name="uname" placeholder="User Name" required><br>

            <label>Password</label>
            <input type="password" name="password" placeholder="Password" required><br>

            <button type="submit">Login</button>
            <a href="signup.php" class="ca">Create an account</a>
        </form>
    </div>
</body>
</html>
