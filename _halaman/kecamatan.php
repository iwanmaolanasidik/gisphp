<?php 
$title = 'Kecamatan';
$page = 'Kecamatan Page';
$url = 'kecamatan';

// Proses tambah dan edit
if(isset($_POST['simpan'])) {
	if($_POST['id_kecamatan'] == "") {
		$data['kode_kecamatan'] = $_POST['kode_kecamatan'];
		$data['nama_kecamatan'] = $_POST['nama_kecamatan'];
		$db->insert("m_kecamatan", $data); ?>
		<script>
			window.alert('Data berhasil di simpan');
			window.location.href='<?= url($url) ?>';
		</script>
	<?php
	}else{
		$data['kode_kecamatan'] = $_POST['kode_kecamatan'];
		$data['nama_kecamatan'] = $_POST['nama_kecamatan'];
		$db->where('id_kecamatan', $_POST['id_kecamatan']);
		$db->update("m_kecamatan", $data);
	}
}

// IF Form (Munculkan form untuk kondisi tambah / edit)
if (isset($_GET['tambah']) OR isset($_GET['edit'])) {
	if(isset($_GET['tambah'])) {
		$nameCard = 'Form Tambah Kecamatan'; //nama card
	} else {
		$nameCard = 'Form Edit Kecamatan'; //nama card
	}
$id_kecamatan = '';
$kode_kecamatan = '';
$nama_kecamatan = '';
	if(isset($_GET['edit']) AND isset($_GET['id'])) {
		$id = $_GET['id'];
		$db->where('id_kecamatan', $id);
		$row = $db->ObjectBuilder()->getOne('m_kecamatan');
		if($db->count > 0) {
			$id_kecamatan = $row->id_kecamatan;
			$kode_kecamatan = $row->kode_kecamatan;
			$nama_kecamatan = $row->nama_kecamatan;
		}
	}
?>


<!-- Card Form Kecamatan -->
<?= content_open($nameCard)?>
<form method="post">
	<div class="card-body">
		<!-- Form input -->
		<?= input_hidden('id_kecamatan', $id_kecamatan) ?>

		<div class="form-group">
			<label for="kode_kecamatan">Kode Kecamatan</label>
			<?= input_text('kode_kecamatan', $kode_kecamatan) ?>
		</div>

		<div class="form-group">
			<label for="nama_kecamatan">Nama Kecamatan</label>
			<?= input_text('nama_kecamatan', $nama_kecamatan) ?>
		</div>
	</div>
	<!-- /.Form input -->
	<div class="card-footer">
		<button class="btn btn-sm btn-info" name="simpan" type="submit"><i class="fas fa-save"></i> simpan</button>
		<a href="<?= url($url) ?>" class="btn btn-sm btn-default"><i class="fas fa-reply"></i> Kembali</a>
	</div>
</form>
<?= content_close()?>
<!-- /.Card Form Kecamatan -->

<?php } else { ?> 
<!-- Else Form -->

<!-- Card Data Kecamatan -->
<?= content_open('Data Kecamatan') ?>
<?php 
$kecamatan = $db->ObjectBuilder()->get('m_kecamatan');
?>
<div class="card-body">
	<a href="<?= url($url.'&tambah') ?>" class="btn btn-sm btn-info"><i class="fas fa-plus"></i> Tambah Data</a>
	<table class="table table-bordered mt-3">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode</th>
				<th>Nama</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			foreach ($kecamatan as $row) { 
			?>
			<tr>
				<td><?= $no++ ?></td>
				<td><?= $row->kode_kecamatan ?></td>
				<td><?= $row->nama_kecamatan ?></td>
				<td>
					<a href="<?= url($url.'&edit&id='.$row->id_kecamatan) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Edit</a>
					<a href="<?= url($url.'&hapus&id='.$row->id_kecamatan) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda akan menghapus data ?')"><i class="fas fa-trash"></i> Hapus</a>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?= content_close('Data Kecamatan') ?>
<!-- /.Card Data Kecamatan -->

<!-- End IF Form -->
<?php } ?>