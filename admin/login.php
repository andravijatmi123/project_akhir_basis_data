<?= $this->include('admin/header'); ?>
<!-- Notif -->
<?php if(session()->getFlashData('info')) :?>
<script>alert('<?= session()->getFlashData('info') ?>')</script>
<?php endif; ?>

   
    <div class="card text-bg-dark">
        <img src="assets/img/bg.jpg" class="card-img" alt="...">
        <div class="card-img-overlay" style="margin-top: 120px;">
        <div class="mx-auto w-50 p-5 w-5 bg-dark text-light mb-5">
            <form action="<?= base_url() ?>/admin/login/proses_login" method="post">
                <?= csrf_field() ?>

                <h1 class="text-center">Log In</h1>
                <label for="title">Username:</label>
                <input type="input" name="username" class="form-control mb-3" required autofocus>

                <label for="title">Password:</label>
                <input type="password" name="password" class="form-control mb-3" required>

                <input type="submit" name="submit" value="Masuk" class="btn btn-primary">

            </form>
        </div>
        </div>
        </div>



  <?= $this->include('admin/footer'); ?>