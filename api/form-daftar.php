<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../styles/style.css">
	<title>Formulir Pendaftaran Siswa Baru</title>
</head>

<body>
	<div id="myModal" class="modal-container">
		<div class="modal-content">
			<h3>Formulir Pendaftaran Siswa Baru <span class="close" onclick="closeModal()">&times;</span></h3>

			<form action="proses-pendaftaran.php" method="POST" class="register-form">
				<div class="input-field">
					<label for="nama">Nama: </label>
					<input type="text" name="nama" placeholder="nama lengkap" />
				</div>
				<div class="input-field">
					<label for="alamat">Alamat: </label>
					<textarea name="alamat"></textarea>
				</div>
				<div class="input-field">
					<label for="jenis_kelamin">Jenis Kelamin: </label>
					<label><input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki</label>
					<label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
				</div>
				<div class="input-field">
					<label for="agama">Agama: </label>
					<select name="agama">
						<option>Islam</option>
						<option>Kristen</option>
						<option>Hindu</option>
						<option>Budha</option>
						<option>Atheis</option>
					</select>
				</div>
				<div class="input-field">
					<label for="sekolah_asal">Sekolah Asal: </label>
					<input type="text" name="sekolah_asal" placeholder="nama sekolah" />
				</div>

				<button type="submit" value="Daftar" name="daftar" class="send" onclick="closeModal()">Daftar</button>
			</form>
		</div>
	</div>

</body>

</html>