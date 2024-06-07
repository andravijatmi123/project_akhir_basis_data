<!-- Footer -->
    <div class="card-footer  text-center fixed-bottom  border border-top-0 border-3  rounded-3">
     &copy;Made with ❤ by Tim 5
    </div>
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
