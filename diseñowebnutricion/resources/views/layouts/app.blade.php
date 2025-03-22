<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema Crud FitEat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
      .navbar {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 0.8rem 1rem;
      }
      
      .navbar-brand {
        font-weight: 700;
        font-size: 1.5rem;
        color: #2c3e50;
      }
      
      .navbar-brand span {
        color: #3498db;
      }
      
      .nav-item {
        margin: 0 5px;
      }
      
      .nav-link {
        position: relative;
        padding: 0.5rem 1rem;
        font-weight: 500;
        color: #2c3e50;
        transition: color 0.3s;
        border-radius: 4px;
      }
      
      .nav-link:hover {
        color: #3498db;
        background-color: rgba(52, 152, 219, 0.05);
      }
      
      .nav-link.active {
        color: #3498db;
        font-weight: 600;
      }
      
      .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 30px;
        height: 3px;
        background-color: #3498db;
        border-radius: 3px;
      }
      
      @media (max-width: 991.98px) {
        .nav-link.active::after {
          left: 0;
          transform: none;
          width: 3px;
          height: 20px;
          top: 50%;
          transform: translateY(-50%);
        }
        
        .nav-link {
          padding-left: 1rem;
        }
      }
      
      .container {
        padding-top: 2rem;
        padding-bottom: 2rem;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-white">
      <div class="container">
        <a class="navbar-brand" href="#">Fit<span>Eat</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/recipes/crear">
                <i class="fas fa-plus-circle me-1"></i> Crear
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/recipes/leer">
                <i class="fas fa-book-open me-1"></i> Leer
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/recipes/eliminar">
                <i class="fas fa-trash-alt me-1"></i> Eliminar
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <div class="container">
      @yield('content')
    </div>
    
    <!-- Clean up duplicate Bootstrap references and properly order scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>