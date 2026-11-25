<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>College Complaint Portal</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
            color: #172033;
        }

        /* NAVBAR */

        .navbar {
            height: 70px;
            background: #0f172a;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 7%;
            color: white;
        }

        .logo {
            font-size: 22px;
            font-weight: bold;
        }

        .logo span {
            color: #3b82f6;
        }

        .nav-btn {
            color: white;
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 8px;
            border: 1px solid #475569;
            transition: 0.3s;
        }

        .nav-btn:hover {
            background: #2563eb;
            border-color: #2563eb;
        }

        /* HERO */

        .hero {
            min-height: 470px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 50px 20px;

            background:
                linear-gradient(135deg, #eff6ff, #ffffff);
        }

        .hero-content {
            max-width: 750px;
        }

        .badge {
            display: inline-block;
            background: #dbeafe;
            color: #1d4ed8;
            padding: 8px 15px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero h1 {
            font-size: 48px;
            line-height: 1.15;
            margin-bottom: 20px;
            color: #0f172a;
        }

        .hero h1 span {
            color: #2563eb;
        }

        .hero p {
            font-size: 18px;
            color: #64748b;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        /* BUTTONS */

        .buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            text-decoration: none;
            padding: 14px 25px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        .primary {
            background: #2563eb;
            color: white;
        }

        .primary:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        .secondary {
            background: white;
            color: #2563eb;
            border: 1px solid #2563eb;
        }

        .secondary:hover {
            background: #eff6ff;
        }

        /* FEATURES */

        .features {
            padding: 60px 7%;
            background: white;
        }

        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .section-title h2 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .section-title p {
            color: #64748b;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 25px;
            max-width: 1100px;
            margin: auto;
        }

        .card {
            padding: 30px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 15px;
            text-align: center;
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .icon {
            width: 60px;
            height: 60px;
            margin: auto;
            margin-bottom: 20px;
            border-radius: 50%;
            background: #dbeafe;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .card h3 {
            margin-bottom: 10px;
        }

        .card p {
            color: #64748b;
            line-height: 1.5;
        }

        /* ADMIN */

        .admin-section {
            padding: 60px 20px;
            text-align: center;
            background: #0f172a;
            color: white;
        }

        .admin-section p {
            color: #94a3b8;
            margin: 12px 0 25px;
        }

        .admin-btn {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 13px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        .admin-btn:hover {
            background: #3b82f6;
        }

        /* FOOTER */

        footer {
            background: #020617;
            color: #94a3b8;
            text-align: center;
            padding: 20px;
            font-size: 14px;
        }

        /* MOBILE */

        @media (max-width: 768px) {

            .hero h1 {
                font-size: 36px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .navbar {
                padding: 0 20px;
            }

            .logo {
                font-size: 18px;
            }

        }

    </style>

</head>

<body>


<!-- NAVBAR -->

<nav class="navbar">

    <div class="logo">
        College<span>Complaint</span>
    </div>

    <a href="login.php" class="nav-btn">
        Student Login
    </a>

</nav>


<!-- HERO -->

<section class="hero">

    <div class="hero-content">

        <div class="badge">
            🎓 Student Support System
        </div>

        <h1>
            Your Voice,
            <span>Your Solution.</span>
        </h1>

        <p>
            Submit your college complaints online and track
            their progress easily. A simple and transparent
            complaint management system for students.
        </p>

        <div class="buttons">

            <a href="register.php" class="btn primary">
                Get Started →
            </a>

            <a href="login.php" class="btn secondary">
                Student Login
            </a>

        </div>

    </div>

</section>


<!-- FEATURES -->

<section class="features">

    <div class="section-title">

        <h2>How It Works</h2>

        <p>
            Simple, fast and transparent complaint management.
        </p>

    </div>


    <div class="cards">


        <div class="card">

            <div class="icon">
                📝
            </div>

            <h3>Submit Complaint</h3>

            <p>
                Students can easily submit complaints
                related to college facilities and services.
            </p>

        </div>


        <div class="card">

            <div class="icon">
                🔍
            </div>

            <h3>Track Status</h3>

            <p>
                Check your complaint status anytime
                from your student account.
            </p>

        </div>


        <div class="card">

            <div class="icon">
                ✅
            </div>

            <h3>Get Resolution</h3>

            <p>
                Receive updates and replies from the
                college administration.
            </p>

        </div>


    </div>

</section>


<!-- ADMIN -->

<section class="admin-section">

    <h2>College Administration</h2>

    <p>
        Admin can manage complaints, update status
        and communicate with students.
    </p>

    <a href="admin_login.php" class="admin-btn">
        Admin Login →
    </a>

</section>


<!-- FOOTER -->

<footer>

    © 2026 College Complaint Portal
    | BCA Mini Project

</footer>


</body>

</html>