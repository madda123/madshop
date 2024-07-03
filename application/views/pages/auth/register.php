<main role="main" class="container">
    <?php $this->load->view('layouts/_alert') ?>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                      Registrasi
                    </div>
                    <div class="card-body">
                        <?= form_open('register', ['method' => 'POST']) ?>
                        <div class="mb-3">
                            <label for="">Nama</label>
                            <?= form_input('name', $input->name, ['class' => 'form-control', 'placeholder' => 'Masukkan nama anda', 'required'=> true, 'autofocus'=> true]) ?>
                            <?= form_error('name') ?>
                        </div>
                        <div class="mb-3">
                            <label for="">E-mail</label>
                            <?= form_input(['type' => 'email', 'name' => 'email', 'value' => $input->email, 'class' => 'form-control', 'placeholder' => 'Masukkan email aktif', 'required'=> true]) ?>
                            <?= form_error('email') ?>
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <?= form_password('password', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password minimal 8 digit', 'required' => true]) ?>
                            <?= form_error('password') ?>
                        </div>
                        <div class="mb-3">
                            <label for="">Konfirmasi Password</label>
                            <?= form_password('password_confirmation', '', ['class' => 'form-control', 'placeholder' => 'Masukkan password yang sama', 'required' => true]) ?>
                            <?= form_error('password_confirmation') ?>
                        </div>
                        <button type="submit" class="btn btn-primary ">Register</button>
                        <?= form_close() ?>
                    </div>
                  </div>
            </div>
        </div>
</main>