<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
      body {
        margin: 0;
        padding: 0;
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        overflow-x: hidden;
      }

      /* Animated Gradient Background */
      .animated-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(-45deg, #ff9a9e, #fad0c4, #fad0c4, #a1c4fd, #c2e9fb, #ffecd2);
        background-size: 400% 400%;
        animation: gradientShift 15s ease infinite;
        z-index: -1;
      }

      @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
      }

      /* Floating bubbles animation */
      .bubbles {
        position: fixed;
        width: 100%;
        height: 100%;
        z-index: -1;
        overflow: hidden;
        top: 0;
        left: 0;
      }

      .bubble {
        position: absolute;
        bottom: -100px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        animation: float 8s infinite ease-in;
      }

      @keyframes float {
        0% {
          transform: translateY(0) rotate(0deg);
          opacity: 1;
        }
        100% {
          transform: translateY(-1000px) rotate(720deg);
          opacity: 0;
        }
      }

      /* Card styling */
      .card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: none;
        border-radius: 20px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
      }

      /* Navbar styling */
      .navbar {
        background: rgba(255, 255, 255, 0.95) !important;
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1);
      }

      /* Warm gradient headers */
      .warm-gradient-header {
        background: linear-gradient(45deg, #ff9a9e, #fecfef) !important;
        color: #333 !important;
        font-weight: 600;
        border: none;
      }

      /* Button enhancements - matching warm theme */
      .btn-warm {
        background: linear-gradient(45deg, #ff9a9e, #fecfef);
        border: none;
        color: #333;
        border-radius: 10px;
        font-weight: 600;
        transition: transform 0.3s ease;
      }

      .btn-warm:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 154, 158, 0.4);
        background: linear-gradient(45deg, #ff7b7f, #fdbae8);
        color: #333;
      }

      /* Text styling */
      .text-primary {
        color: #ff6b6b !important;
      }

      .text-dark {
        color: #2d3748 !important;
      }

      .text-muted {
        color: #718096 !important;
      }
    </style>
  </head>
  <body>
    <!-- Animated Background -->
    <div class="animated-bg"></div>
    
    <!-- Floating Bubbles -->
    <div class="bubbles" id="bubbles"></div>

    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
      <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="{{ route('posts.index') }}">
            <i class="bi bi-journal-text"></i> CRUD
        </a>
        <div class="ms-auto">
          <a href="{{ route('posts.create') }}" class="btn btn-warm">
            <i class="bi bi-plus-circle"></i> Create Post
          </a>
        </div>
      </div>
    </nav>

    <main class="container py-4">
      @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
      // Create floating bubbles
      function createBubbles() {
        const bubblesContainer = document.getElementById('bubbles');
        const bubblesCount = 15;
        
        for (let i = 0; i < bubblesCount; i++) {
          const bubble = document.createElement('div');
          bubble.classList.add('bubble');
          
          // Random size between 40px and 120px
          const size = Math.random() * 80 + 40;
          bubble.style.width = `${size}px`;
          bubble.style.height = `${size}px`;
          
          // Random position
          bubble.style.left = `${Math.random() * 100}vw`;
          
          // Random animation delay and duration
          bubble.style.animationDelay = `${Math.random() * 5}s`;
          bubble.style.animationDuration = `${Math.random() * 10 + 8}s`;
          
          bubblesContainer.appendChild(bubble);
        }
      }

      // Initialize bubbles when page loads
      document.addEventListener('DOMContentLoaded', createBubbles);
    </script>
  </body>
</html>