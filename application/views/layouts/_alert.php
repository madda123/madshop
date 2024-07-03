<?php 
    $success = $this->session->flashdata('success');
    $error = $this->session->flashdata('error');
    $warning = $this->session->flashdata('warning');

    if ($success) {
        $alert_status   = 'alert-success';
        $status         = 'Success!';
        $massage        = $success;
    }

    if ($error) {
        $alert_status   = 'alert-danger';
        $status         = 'Error!';
        $massage        = $error;
    }

    if ($warning) {
        $alert_status   = 'alert-warning';
        $status         = 'Warning!';
        $massage        = $warning;
    }
?>

<?php if ($success || $error || $warning): ?>
<div class="row">
    <div class="col-md-12">
        <div class="alert <?= $alert_status ?> alert-dismissible fade show" role="alert">
            <strong><?= $status ?></strong> <?= $massage ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>
<?php endif ?>