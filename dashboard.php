<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full Stack Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            text-align: center;
            padding: 2rem;
        }

        .dashboard {
            max-width: 800px;
            margin: auto;
            background: rgba(255, 255, 255, 0.1);
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .welcome-message {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        .roadmap {
            text-align: left;
            margin-top: 2rem;
            background: rgba(255, 255, 255, 0.2);
            padding: 1.5rem;
            border-radius: 8px;
        }

        .roadmap h2 {
            text-align: center;
            margin-bottom: 1rem;
        }

        .roadmap ul {
            list-style-type: none;
            padding: 0;
        }

        .roadmap li {
            padding: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .logout-btn {
            background: #ff4d4d;
            color: white;
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        .logout-btn:hover {
            background: #cc0000;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1 class="welcome-message">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>! 👋</h1>
        <p>You're now logged into your Full Stack Developer Dashboard.</p>

        <div class="roadmap">
            <h2>📌 Full Stack Developer Roadmap</h2>
            <ul>
                <li>✅ Learn HTML, CSS & JavaScript</li>
                <li>✅ Master Frontend Frameworks (React, Vue, Angular)</li>
                <li>✅ Backend Development (Node.js, Express, PHP, Django)</li>
                <li>✅ Database (MySQL, MongoDB, PostgreSQL)</li>
                <li>✅ APIs & Authentication (JWT, OAuth, REST, GraphQL)</li>
                <li>✅ Version Control (Git, GitHub)</li>
                <li>✅ Deployment (Docker, AWS, Firebase, Vercel)</li>
            </ul>
        </div>

        <form action="logout.php" method="POST">
            <button type="submit" class="logout-btn">Log Out</button>
        </form>
    </div>
</body>
</html>
