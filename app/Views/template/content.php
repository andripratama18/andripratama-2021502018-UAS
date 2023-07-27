<?php
echo $this->extend('template/index');
echo $this->section('content');
?>
<style>
    .card {
  display: flex;
  justify-content: center; 
  align-items: center; 
  
}

.card_body {
  text-align: center;
}

.bold-text {
            font-weight: bold;
        }

.responsive-img {
  max-width: 100%;
  height: auto;
  display: block; 
  margin: 0 auto; 
}

</style>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                <span class="bold-text"><?php echo $title_card; ?></span>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <span class="bold-text">
                <?php echo $selamat_datang; ?>
            </span>
            </div>
            <!-- /.card-body -->
            
        </div>
        <!-- /.card -->
    </div>
</div>
    
    <?php
echo $this->endSection();