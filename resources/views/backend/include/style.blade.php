 <style>
    :root {
      --bg: #e0e5ec;
      --shadow-light: #ffffff;
      --shadow-dark: #a3b1c6;
      --primary: #6c63ff;
      --text: #333;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: var(--bg);
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      transition: background 0.3s;
    }

    body.dark {
      --bg: #2c2f36;
      --shadow-light: #3a3d44;
      --shadow-dark: #1a1c1f;
      --text: #f1f1f1;
    }

    /* Navbar */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: var(--bg);
      box-shadow: 5px 5px 10px var(--shadow-dark), -5px -5px 10px var(--shadow-light);
      padding: 15px 30px;
      margin: 15px;
      border-radius: 20px;
    }

    .nav-left {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .menu-btn {
      font-size: 22px;
      cursor: pointer;
      user-select: none;
      padding: 8px 12px;
      border-radius: 12px;
      box-shadow: 4px 4px 8px var(--shadow-dark), -4px -4px 8px var(--shadow-light);
    }

    .navbar h1 {
      color: var(--primary);
      font-size: 1.5rem;
      font-weight: 700;
    }

    .nav-right {
      display: flex;
      gap: 20px;
      align-items: center;
      position: relative;
    }

    .toggle-btn {
      width: 50px;
      height: 25px;
      background: var(--bg);
      border-radius: 30px;
      box-shadow: inset 4px 4px 8px var(--shadow-dark), inset -4px -4px 8px var(--shadow-light);
      position: relative;
      cursor: pointer;
    }

    .toggle-circle {
      width: 20px;
      height: 20px;
      background: var(--primary);
      border-radius: 50%;
      position: absolute;
      top: 2.5px;
      left: 3px;
      transition: 0.3s;
    }

    body.dark .toggle-circle {
      transform: translateX(24px);
    }

    .profile {
      display: flex;
      align-items: center;
      gap: 10px;
      background: var(--bg);
      padding: 5px 10px;
      border-radius: 15px;
      box-shadow: inset 3px 3px 6px var(--shadow-dark), inset -3px -3px 6px var(--shadow-light);
      cursor: pointer;
      position: relative;
    }

    .profile img {
      width: 30px;
      height: 30px;
      border-radius: 50%;
    }

    .dropdown {
      display: none;
      position: absolute;
      top: 50px;
      right: 0;
      background: var(--bg);
      box-shadow: 8px 8px 16px var(--shadow-dark), -8px -8px 16px var(--shadow-light);
      border-radius: 15px;
      overflow: hidden;
      flex-direction: column;
      min-width: 150px;
      z-index: 10;
    }

    .dropdown a {
      padding: 12px;
      text-decoration: none;
      color: var(--text);
      text-align: left;
      display: block;
      transition: background 0.3s;
    }

    .dropdown a:hover {
      background: var(--primary);
      color: white;
    }

    /* Sidebar */
    .container {
      display: flex;
      flex: 1;
    }

    .sidebar {
      width: 250px;
      background: var(--bg);
      box-shadow: 10px 10px 20px var(--shadow-dark), -10px -10px 20px var(--shadow-light);
      border-radius: 30px;
      margin: 20px;
      padding: 30px 20px;
      display: flex;
      flex-direction: column;
      gap: 20px;
      transition: transform 0.3s ease;
    }

    .sidebar.closed {
      transform: translateX(-280px);
    }

    .sidebar h2 {
      text-align: center;
      font-weight: 700;
      color: var(--primary);
      margin-bottom: 30px;
    }

    .sidebar a {
      text-decoration: none;
      color: var(--text);
      font-weight: 600;
      padding: 12px;
      border-radius: 15px;
      text-align: center;
      background: var(--bg);
      box-shadow: inset 5px 5px 10px var(--shadow-dark), inset -5px -5px 10px var(--shadow-light);
      transition: all 0.3s ease;
    }

    .sidebar a:hover {
      background: var(--primary);
      color: white;
      box-shadow: 5px 5px 10px var(--shadow-dark), -5px -5px 10px var(--shadow-light);
    }

    .main-content {
      flex: 1;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 25px;
      margin: 20px;
    }

    .card {
      background: var(--bg);
      box-shadow: 10px 10px 20px var(--shadow-dark), -10px -10px 20px var(--shadow-light);
      border-radius: 25px;
      padding: 25px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      transition: transform 0.2s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card h3 {
      margin: 0 0 10px;
      font-size: 1.3rem;
      color: var(--primary);
    }

    .count {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 15px;
      color: var(--text);
    }

    canvas {
      width: 100% !important;
      height: 120px !important;
    }

    @media (max-width: 768px) {
      .sidebar {
        position: absolute;
        top: 80px;
        left: 0;
        height: calc(100% - 100px);
        z-index: 999;
      }
    }
  </style>