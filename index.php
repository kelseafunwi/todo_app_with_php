<?php
require_once 'includes/config.php';

if (isLoggedIn()) {
    $button_text = 'Get Started';
    $button_link = 'dashboard.php';
} else {
    $button_text = 'Login';
    $button_link = 'login.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App - Organize Your Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/landing.css" rel="stylesheet">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand text-white" href="#">Todo App</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline ms-2" href="<?php echo $button_link; ?>"><?php echo $button_text; ?></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">Organize Your Tasks, <span class="text-gradient">Boost Productivity</span></h1>
                    <p class="hero-subtitle">A simple yet powerful todo application to help you stay organized and achieve your goals.</p>
                    <div class="d-flex gap-3">
                        <a href="<?php echo $button_link; ?>" class="btn btn-primary"><?php echo $button_text; ?></a>
                        <?php if (!isLoggedIn()): ?>
                            <a href="register.php" class="btn btn-outline">Sign Up Free</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="https://illustrations.popsy.co/white/task-list.svg" alt="Task Management" class="img-fluid hero-image">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <h2 class="section-title">Why Choose Our <span class="text-gradient">Todo App</span></h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-check2-circle text-white fs-3"></i>
                        </div>
                        <h3>Simple & Intuitive</h3>
                        <p>Clean interface designed for maximum productivity and ease of use.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-shield-check text-white fs-3"></i>
                        </div>
                        <h3>Secure & Private</h3>
                        <p>Your data is encrypted and protected with enterprise-grade security.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="bi bi-graph-up text-white fs-3"></i>
                        </div>
                        <h3>Track Progress</h3>
                        <p>Monitor your productivity with detailed statistics and insights.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <img src="https://illustrations.popsy.co/blue/task-list.svg" alt="About Todo App" class="img-fluid about-image">
                </div>
                <div class="col-lg-6">
                    <h2 class="section-title text-start">About Our <span class="text-gradient">Todo App</span></h2>
                    <p class="lead">We've created a powerful yet simple todo application to help you stay organized and focused on what matters most.</p>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i> Easy task management</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i> Priority-based organization</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i> Progress tracking</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-primary me-2"></i> Mobile-friendly design</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <h2 class="section-title">Get in <span class="text-gradient">Touch</span></h2>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="contact-form">
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Your Email" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="4" placeholder="Your Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5 class="text-white mb-4">Todo App</h5>
                    <p class="text-white-50">Organize your tasks, stay productive, and achieve your goals with our simple and effective todo application.</p>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h6 class="text-white mb-4">Quick Links</h6>
                    <div class="footer-links">
                        <a href="#features" class="d-block mb-2">Features</a>
                        <a href="#about" class="d-block mb-2">About</a>
                        <a href="#contact" class="d-block mb-2">Contact</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0">
                    <h6 class="text-white mb-4">Legal</h6>
                    <div class="footer-links">
                        <a href="#" class="d-block mb-2">Privacy Policy</a>
                        <a href="#" class="d-block mb-2">Terms of Service</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h6 class="text-white mb-4">Connect With Us</h6>
                    <div class="d-flex gap-3">
                        <a href="#" class="text-white"><i class="bi bi-facebook fs-5"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-twitter fs-5"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-linkedin fs-5"></i></a>
                        <a href="#" class="text-white"><i class="bi bi-github fs-5"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4 mb-4 border-light">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="text-white-50 mb-0">&copy; 2024 Todo App. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="text-white-50 mb-0">Made with <i class="bi bi-heart-fill text-danger"></i> for productivity</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>