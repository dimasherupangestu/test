<?php $this->extend('templateadmin'); ?>

<?php $this->section('css'); ?>

<?php $this->endSection(); ?>

<?php $this->section('content'); ?>
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <?= $this->include('header-admin'); ?>

                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-3">Hello, Admin</h5>
                        <?= alert(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>

<?php $this->section('js'); ?>


<?php $this->endSection(); ?>