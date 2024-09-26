<?php
session_start();

// Store the username and room ID
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['roomid'] = $_POST['roomid'];
}

// Sample member storage, replace with your data source
if (!isset($_SESSION['members'])) {
    $_SESSION['members'] = [];
}

// Add new member if not already in the list
if (isset($_SESSION['username']) && !in_array($_SESSION['username'], $_SESSION['members'])) {
    $_SESSION['members'][] = $_SESSION['username'];
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/e8fa2e31b4.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background-image: url('https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwyMDg5M3wwfDF8c2VhcmNofDF8fGJlYXV0aWZ1bCUyMGJhY2tncm91bmR8ZW58MHx8fHwxNjEyNTc3MjI4&ixlib=rb-1.2.1&q=80&w=1080'); /* Add your background image URL here */
            background-size: cover;
            background-position: center;
            color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            margin: 20px 0;
            color: #00BFFF;
            text-shadow: 1px 1px 2px #000;
            font-size: 36px;
            text-align: center;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            height: 85vh;
            padding: 20px;
            display: flex;
            gap: 20px;
            background-color: rgba(40, 40, 40, 0.8); /* Semi-transparent background for better visibility */
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.7);
        }
        .left, .right {
            flex-basis: 50%;
            padding: 10px;
            border-radius: 8px;
            background-color: #282828;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }
        .left {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .left .box {
            height: 25vh;
            border: 1px solid #666;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
        }
        textarea {
            width: 100%;
            height: 100%;
            background-color: #1f1f1f;
            color: #fff;
            padding: 10px 20px;
            border: none;
            outline: none;
            font-size: 18px;
            transition: background-color 0.3s;
            border-radius: 5px;
        }
        textarea:focus {
            background-color: #333;
        }
        iframe {
            width: 100%;
            height: 100%;
            background-color: #fff;
            border: none;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }
        label i {
            margin: 0 10px;
        }
        label {
            display: flex;
            align-items: center;
            background-color: #000;
            height: 30px;
            padding: 0 10px;
            border-radius: 5px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
        }
        .fa-solid, .fa-brands {
            color: aqua;
        }
        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 10px;
        }
        .button-container button {
            background: #4CAF50;
            color: white;
            padding: 10px 25px;
            font-size: 18px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
        }
        .button-container button:hover {
            background: #333;
            transform: translateY(-2px);
        }
        .button-container button:active {
            transform: translateY(0);
        }
        .exit-button {
            background: #e74c3c; /* Red background for exit button */
        }
        .exit-button:hover {
            background: #c0392b;
        }
        .members-container {
            margin-top: 20px;
            text-align: center;
        }
        .members-list {
            margin-top: 10px;
            font-size: 18px;
            list-style-type: none;
            padding: 0;
        }
        .members-list li {
            background-color: rgba(102, 102, 102, 0.8);
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .members-list li:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body>
    <h1>Code Editor Synchronisation</h1>

    <div class="container">
        <div class="left">
            <div class="box">
                <label for=""><i class="fa-brands fa-html5"></i> HTML</label>
                <textarea id="html-code" placeholder="Write your HTML code here..."></textarea>
            </div>

            <div class="box">
                <label for=""><i class="fa-brands fa-css3-alt"></i> CSS</label>
                <textarea id="css-code" placeholder="Write your CSS code here..."></textarea>
            </div>

            <div class="box">
                <label for=""><i class="fa-brands fa-js-square"></i> JavaScript</label>
                <textarea id="js-code" placeholder="Write your JavaScript code here..."></textarea>
            </div>

            <div class="button-container">
                <button onclick="runCode()">Run Code</button>
                <button class="exit-button" onclick="logout()">Exit</button>
            </div>
        </div>

        <div class="right">
            <div class="box">
                <iframe id="output" srcdoc=""></iframe>
            </div>
        </div>
    </div>

    <div class="members-container">
        <h2>Members in Room:</h2>
        <ul class="members-list">
            <?php foreach ($_SESSION['members'] as $member): ?>
                <li><?php echo htmlspecialchars($member); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>

    <script>
        function runCode() {
            const htmlCode = document.getElementById('html-code').value;
            const cssCode = "<style>" + document.getElementById('css-code').value + "</style>";
            const jsCode = "<script>" + document.getElementById('js-code').value + "<\/script>";
            const outputFrame = document.getElementById('output');
            outputFrame.srcdoc = htmlCode + cssCode + jsCode;
        }

        function logout() {
            // Redirect to the logout URL
            window.location.href = "?logout=true";
        }
    </script>
</body>
</html>
