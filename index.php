<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css"
      integrity="sha512-Velp0ebMKjcd9RiCoaHhLXkR1sFoCCWXNp6w4zj1hfMifYB5441C+sKeBl/T/Ka6NjBiRfBBQRaQq65ekYz3UQ=="
      crossorigin="anonymous"
    />
    <style>
        .clickable{
      cursor : pointer;
    }
    </style>
    <!-- My CSS -->
    <link rel="stylesheet" href="style.css" />

    <title>Gi-Pay</title>
  </head>
  <body id="home">
    <!-- Navbar -->
<div class="card bord">
  <div class="card-header  fixed-top ">
   <div class="row">
      <div class="col-3">
        <a class="nav-link active px-5 py-2">
          <img src="assets/img/logo.png" class="clickable" alt="GIPAY" style="width:170px">
        </a>
      </div>
      <div class="col-9">
   <ul class="nav justify-content-end container">
    <li class="nav-item dropdown ">
               
                <button class="btn nav-link  dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-sun theme-icon-active text-dark" 
                  data-theme-icon-active="bi-sun"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-dark ">
                  <li>
                    <button class="dropdown-item d-flex align-items-center" 
                    type="button" data-bs-theme-value="light" >
                      <i class="bi bi-sun me-2 opacity-50" data-theme-icon="bi-sun" ></i> Light
                    </button>
                  </li>
                  <li> 
                    <button class="dropdown-item d-flex align-items-center" 
                    type="button" data-bs-theme-value="dark" >
                      <i class="bi bi-moon-fill me-2 opacity-50" data-theme-icon="bi-moon-fill" ></i> Dark
                    </button>
                  </li>
                  <li><hr class="dropdown-divider"></li>
                  <li>
                    <button class="dropdown-item d-flex align-items-center" 
                    type="button" data-bs-theme-value="auto" >
                      <i class="bi bi-circle-half me-2 opacity-50" data-theme-icon="bi-circle-half" ></i> Auto
                    </button>
                  </li>
                </ul>
              
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>
</div>  
    </div>
  </div>
  </div>                 
    <!-- Akhir Navbar -->

    <!-- Jumbotron -->
    <section class="jumbotron text-center">
      
      <h1 class="display-1">Baru! Aplikasi Gi-Pay</h1>
      <h2 class="display-4">  Bayar ini itu mudah aja!</h2>
        <div class="row justify-content-center">
          <div class="col-3" style="width: 16rem;">
          <div class="card border border-dark">
          <img src="assets/img/cart.png"  class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Ingin masuk sebagai pembeli?</h5>
              <a href="SISU/SISU-public.php" class="btn btn-outline-primary">Klik disini!</a>
            </div>
          </div> 
          </div>
          <div class="col-3" style="width: 16rem;">
          <div class="card border border-dark ">
          <img src="assets/img/market.png"  class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Ingin  sebagai pedagang?</h5>
              <a href="SISU/SISU-toko.php" class="btn btn-outline-primary">Klik disini!</a>
            </div>
          </div>
          </div>
        </div>
      </div>
      
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="fffff"
          fill-opacity="10 "
          d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,80C672,64,768,64,864,96C960,128,1056,192,1152,186.7C1248,181,1344,107,1392,69.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg> 
    </section>

    <div id="carouselExampleIndicators" class="carousel slide carousel-dark slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="assets/img/aman.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="assets/img/needs.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="assets/img/cash.png" class="d-block w-100" alt="...">
          <p class="fs-2 text-center">Coming-Soon</p>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  
    <!-- Akhir Jumbotron -->
  <br><br><br><br><br>
    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row text-center mb-3">
          <div class="col" data-aos="fade-down">
            <h2>About Gi-Pay</h2>
          </div>
        </div>
        <div class="row justify-content-center fs-5 text-center">
          <div class="col-md-4" data-aos="fade-right">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure mollitia voluptatum corrupti sint delectus facilis pariatur recusandae! Eveniet, iure debitis?</p>
          </div>
          <div class="col-md-4" data-aos="fade-left">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est quibusdam animi odit unde sequi voluptatibus quo rem perferendis eos, numquam in porro cumque a hic!</p>
          </div>
        </div>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path
          fill="#e2edff"
          fill-opacity="10"
          d="M0,96L48,122.7C96,149,192,203,288,192C384,181,480,107,576,80C672,53,768,75,864,101.3C960,128,1056,160,1152,165.3C1248,171,1344,149,1392,138.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
        ></path>
      </svg>
    </section>
    <!-- Akhir About -->

      
    </section>
    <!-- Akhir Contact -->

    <!-- Footer -->
    <footer class="text-center pb-5">
      <p>Created with <i class="bi bi-heart-fill text-danger"></i> by Tim 5</p>
    </footer>
    <!-- Akhir Footer -->

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" 
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" 
  integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script>
      /*!
 * Color mode toggler for Bootstrap's docs (https://getbootstrap.com/)
 * Copyright 2011-2024 The Bootstrap Authors
 * Licensed under the Creative Commons Attribution 3.0 Unported License.
 */

(() => {
  'use strict'

  const getStoredTheme = () => localStorage.getItem('theme')
  const setStoredTheme = theme => localStorage.setItem('theme', theme)

  const getPreferredTheme = () => {
    const storedTheme = getStoredTheme()
    if (storedTheme) {
      return storedTheme
    }

    return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
  }

  const setTheme = theme => {
    if (theme === 'auto') {
      document.documentElement.setAttribute('data-bs-theme', (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'))
    } else {
      document.documentElement.setAttribute('data-bs-theme', theme)
    }
  }

  setTheme(getPreferredTheme())

  const showActiveTheme = (theme, focus = false) => {
    const themeSwitcher = document.querySelector('#bd-theme')

    if (!themeSwitcher) {
      return
    }

    const themeSwitcherText = document.querySelector('#bd-theme-text')
    const activeThemeIcon = document.querySelector('.theme-icon-active ')
    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
    const iconOfActiveBtn = btnToActive.querySelector('i').dataset.themeIcon

    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
      element.classList.remove('active')
      element.setAttribute('aria-pressed', 'false')
    })

    btnToActive.classList.add('active')
    btnToActive.setAttribute('aria-pressed', 'true')
    activeThemeIcon.classList.remove(activeThemeIcon.dataset.themeIconActive)
    activeThemeIcon.classList.add(iconOfActiveBtn)
    activeThemeIcon.dataset,iconOfActive = iconOfActiveBtn
    const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`
    themeSwitcher.setAttribute('aria-label', themeSwitcherLabel)

    if (focus) {
      themeSwitcher.focus()
    }
  }

  window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
    const storedTheme = getStoredTheme()
    if (storedTheme !== 'light' && storedTheme !== 'dark') {
      setTheme(getPreferredTheme())
    }
  })

  window.addEventListener('DOMContentLoaded', () => {
    showActiveTheme(getPreferredTheme())

    document.querySelectorAll('[data-bs-theme-value]')
      .forEach(toggle => {
        toggle.addEventListener('click', () => {
          const theme = toggle.getAttribute('data-bs-theme-value')
          setStoredTheme(theme)
          setTheme(theme)
          showActiveTheme(theme, true)
        })
      })
  })
})()
    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/TextPlugin.min.js"></script>

    <script>
      gsap.from('.img-thumbnail', { duration: 2, rotationX: 360 });
      gsap.from('.navbar', { duration: 1.5, opacity: 0, y: '-100%', ease: 'bounce' });
      gsap.from('.display-4', { delay: 1, duration: 1, opacity: 0, x: '-10%' });

      gsap.registerPlugin(TextPlugin);
      gsap.to('.lead', { delay: 1.5, duration: 2, text: 'Lecturer | Content Creator' });

      const galleryImages = document.querySelectorAll('.gallery-img');
      const delayTimes = [0, 50, 100, 150, 200, 250, 300, 350, 400, 450];

      function shuffleArray(array) {
        for (var i = array.length - 1; i > 0; i--) {
          var j = Math.floor(Math.random() * (i + 1));
          var temp = array[i];
          array[i] = array[j];
          array[j] = temp;
        }
        return array;
      }
      const newDelay = shuffleArray(delayTimes);
      galleryImages.forEach((img, i) => {
        img.dataset.aos = 'fade-up';
        img.dataset.aosDelay = i * 50 + '';
        // img.dataset.aosDelay = newDelay[i];
      });

      AOS.init({
        once: true,
        duration: 3000,
      });
    </script>

    <script>
      const scriptURL = 'https://script.google.com/macros/s/AKfycbzjWwvjJihKz3-24SxEnHM5XFjNPgQd_dv3uD_fgjLSp_4AAXsC6IC4C_ECvWyLkGsuBg/exec';
      const form = document.forms['wpu-contact-form'];
      const btnKirim = document.querySelector('.btn-kirim');
      const btnLoading = document.querySelector('.btn-loading');
      const myAlert = document.querySelector('.my-alert');

      form.addEventListener('submit', (e) => {
        e.preventDefault();
        // ketika tombol submit diklik
        // tampilkan tombol loading, hilangkan tombol kirim
        btnLoading.classList.toggle('d-none');
        btnKirim.classList.toggle('d-none');
        fetch(scriptURL, { method: 'POST', body: new FormData(form) })
          .then((response) => {
            // tampilkan tombol kirim, hilangkan tombol loading
            btnLoading.classList.toggle('d-none');
            btnKirim.classList.toggle('d-none');
            // tampilkan alert
            myAlert.classList.toggle('d-none');
            // reset formnya
            form.reset();
            console.log('Success!', response);
          })
          .catch((error) => console.error('Error!', error.message));
      });
    </script>

    <script type="text/javascript" src="js/vanilla-tilt.min.js"></script>
    <script type="text/javascript">
      VanillaTilt.init(document.querySelectorAll('.keyboard-box'), {
        max: 35,
        speed: 1000,
        glare: true,
      });
    </script>
  </body>
</html>
