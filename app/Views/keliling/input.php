<?php
echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
            </div>
            <!-- /.card-header --> 
             <form action="<?php echo $action; ?>" method="post" autocomplate="off">
                <div class="card-body">
                    <?php if (validation_errors()) {
                    ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <h5><i class="icon fas fa-ban"></i>SALAAH</h5>
                            <?php echo validation_list_errors() ?>
                        </div>
                    <?php
                    }
                    ?>
                    <?php 
                    if (session()->getFlashdata('error')){
                    ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                                <h5><i class="icon fas fa-warning"></i>!SALAAH</h5>
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                            <?php
                    }
                    ?>
                    <?php echo csrf_field() ?>
<?php 
if(current_url(true)->getSegment(2) =='edit'){
    ?>
    <input type="hidden" name="param" id="param" value="<?php echo $edit_data['nama'];?>">
    <?php
}
?>
                    <div class="form-group">
                        <label for="nama">nama</label>
                        <input type="text" name="nama" id="nama" value="<?php echo empty(set_value('nama')) ? (empty($edit_data['nama']) ? "":$edit_data['nama']) : set_value('nama') ; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="kamar">Kamar</label>
                        <input type="text" name="kamar" id="kamar" value="<?php echo empty(set_value('kamar')) ? (empty($edit_data['kamar']) ? "":$edit_data['kamar']) : set_value('kamar') ; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="nm_buku">nm.buku</label>
                        <input type="text" name="nm_buku" id="nm_buku" value="<?php echo empty(set_value('nm_buku')) ? (empty($edit_data['nm_buku']) ? "":$edit_data['nm_buku']) : set_value('nm_buku') ; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tgl_pinjam">tgl.pinjam</label>
                        <input type="text" name="tgl_pinjam" id="tgl_pinjam" value="<?php echo empty(set_value('tgl_pinjam')) ? (empty($edit_data['tgl_pinjam']) ? "":$edit_data['tgl_pinjam']) : set_value('tgl_pinjam') ; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="tgl_kembali">tgl.kembali</label>
                        <input type="text" name="tgl_kembali" id="tgl_kembali" value="<?php echo empty(set_value('tgl_kembali')) ? (empty($edit_data['tgl_kembali']) ? "":$edit_data['tgl_kembali']) : set_value('tgl_kembali') ; ?>" class="form-control">
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> <?php
echo $this->endSection();