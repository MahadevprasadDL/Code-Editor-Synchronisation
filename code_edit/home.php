<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create or Join Classroom</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: url('room.jpg') no-repeat center center fixed;
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
            color: #ffdd57; /* Bright yellow */
            margin-bottom: 20px;
            font-size: 2.5em;
            text-align: center;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
            width: 350px;
            text-align: left;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            transition: border 0.3s;
            font-size: 1em;
        }

        input[type="text"]:focus {
            border-color: #ff6b6b; /* Change border color on focus */
            outline: none;
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
            font-size: 1em;
        }

        button:hover {
            background-color: #ff4d4d; /* Darker coral on hover */
        }

        .generate-id {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #555;
            text-decoration: underline;
            cursor: pointer;
            transition: color 0.3s;
        }

        .generate-id:hover {
            color: #ff6b6b; /* Coral on hover */
        }
    </style>
    <script>
        function generateRoomId() {
            // Generate a unique room ID (e.g., random number)
            const roomId = 'ROOM-' + Math.floor(Math.random() * 10000);
            document.getElementById('roomid').value = roomId;
        }
    </script>
</head>
<body>
    <h1>Create or Join Classroom</h1>
    <div class="container">
        <form action="room.php" method="post">
            <label for="roomid">Room ID</label>
            <input type="text" id="roomid" name="roomid" placeholder="Enter Room ID" required>

            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter Your Username" required>

            <button type="submit">Join</button>
            <span class="generate-id" onclick="generateRoomId()">Generate Unique Room ID</span>
        </form>
    </div>
</body>
</html>
