<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
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
            text-align: left; /* Align heading left */
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

        .success {
            color: #4CAF50; /* Green */
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
        }

        .ca:hover {
            color: #ff6b6b; /* Coral on hover */
        }
    </style>
</head>
<body>
    <h1>Hello Developers...! <br>Welcome to the Code Editor Synchronisation</h1>
    <div class="container">
        <form action="signup-check.php" method="post">
            <h2>SIGN UP</h2>
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>

            <?php if (isset($_GET['success'])) { ?>
                <p class="success"><?php echo $_GET['success']; ?></p>
            <?php } ?>

            <label>Name</label>
            <?php if (isset($_GET['name'])) { ?>
                <input type="text" 
                       name="name" 
                       placeholder="Name"
                       value="<?php echo $_GET['name']; ?>"><br>
            <?php } else { ?>
                <input type="text" 
                       name="name" 
                       placeholder="Name"><br>
            <?php } ?>

            <label>User Name</label>
            <?php if (isset($_GET['uname'])) { ?>
                <input type="text" 
                       name="uname" 
                       placeholder="User Name"
                       value="<?php echo $_GET['uname']; ?>"><br>
            <?php } else { ?>
                <input type="text" 
                       name="uname" 
                       placeholder="User Name"><br>
            <?php } ?>

            <label>Password</label>
            <input type="password" 
                   name="password" 
                   placeholder="Password"><br>

            <label>Re Password</label>
            <input type="password" 
                   name="re_password" 
                   placeholder="Re Password"><br>

            <button type="submit">Sign Up</button>
            <a href="index.php" class="ca">Already have an account?</a>
        </form>
    </div>
</body>
</html>
