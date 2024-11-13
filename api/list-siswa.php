<?php
include("config.php");

$sql = "SELECT * FROM calon_siswa";
$query = mysqli_query($db, $sql);

if (!$query) {
	die("Query Error: " . mysqli_error($db));
}

$siswaList = [];
while ($siswa = mysqli_fetch_assoc($query)) {
	$siswaList[] = $siswa;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../styles/style.css">
	<title>Daftar Siswa | SMK Coding</title>
	<script>
		function openEditModal(siswa) {
			document.getElementById("editModal").style.display = "block";
			document.getElementById("editId").value = siswa.id;
			document.getElementById("editNama").value = siswa.nama;
			document.getElementById("editAlamat").value = siswa.alamat;

			const jenisKelaminRadios = document.getElementsByName("jenis_kelamin");
			jenisKelaminRadios.forEach(radio => {
				radio.checked = (radio.value === siswa.jenis_kelamin);
			});

			document.getElementById("editAgama").value = siswa.agama;
			document.getElementById("editSekolahAsal").value = siswa.sekolah_asal;
		}

		function closeEditModal() {
			document.getElementById("editModal").style.display = "none";
		}

		function hapus(id) {
			if (confirm("Apakah Anda yakin ingin menghapus siswa ini?")) {
				fetch('hapus.php?id=' + id)
					.then(response => {
						if (response.ok) {
							return response.text();
						}
						throw new Error('Network response was not ok.');
					})
					.then(data => {
						alert('Data berhasil dihapus.');
						location.reload();
					})
					.catch(error => {
						console.error('Ada masalah dengan permintaan fetch:', error);
						alert('Terjadi kesalahan saat menghapus data.');
					});
			}
		}
	</script>
</head>

<body>
	<header>
		<h3>Daftar Siswa</h3>
	</header>

	<main>
		<table class="table">
			<tr>
				<th>ID</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Jenis Kelamin</th>
				<th>Agama</th>
				<th>Sekolah Asal</th>
				<th>Aksi</th>
			</tr>
			<?php
			if (count($siswaList) > 0) {
				foreach ($siswaList as $siswa) {
					echo "<tr>
                        <td>{$siswa['id']}</td>
                        <td>{$siswa['nama']}</td>
                        <td>{$siswa['alamat']}</td>
                        <td>{$siswa['jenis_kelamin']}</td>
                        <td>{$siswa['agama']}</td>
                        <td>{$siswa['sekolah_asal']}</td>
                        <td>
                            <button class='edit' onclick='openEditModal(" . htmlspecialchars(json_encode($siswa), ENT_QUOTES, 'UTF-8') . ")'>Edit</button>
                            <button class='delete' onclick='hapus(" . (int)$siswa['id'] . ")'>Hapus</button>
                        </td>
                      </tr>";
				}
			} else {
				echo "<tr><td colspan='7'>Tidak ada data siswa.</td></tr>";
			}
			?>
		</table>

		<div id="editModal" class="modal-container" style="display:none;">
			<div class="modal-content">
				<h3>Edit Siswa <span class="close" onclick="closeEditModal()">&times;</span></h3>
				<form action="proses-edit.php" method="POST">
					<input type="hidden" id="editId" name="id" />
					<div class="input-field">
						<label for="editNama">Nama: </label>
						<input type="text" id="editNama" name="nama" required />
					</div>
					<div class="input-field">
						<label for="editAlamat">Alamat: </label>
						<textarea id="editAlamat" name="alamat" required></textarea>
					</div>
					<div class="input-field">
						<label>Jenis Kelamin: </label>
						<label><input type="radio" name="jenis_kelamin" value="Laki-laki" required /> Laki-laki</label>
						<label><input type="radio" name="jenis_kelamin" value="Perempuan" required /> Perempuan</label>
					</div>
					<div class="input-field">
						<label for="editAgama">Agama: </label>
						<select id="editAgama" name="agama" required>
							<option>Islam</option>
							<option>Kristen</option>
							<option>Hindu</option>
							<option>Budha</option>
							<option>Atheis</option>
						</select>
					</div>
					<div class="input-field">
						<label for="editSekolahAsal">Sekolah Asal: </label>
						<input type="text" id="editSekolahAsal" name="sekolah_asal" required />
					</div>
					<div>
						<button type="submit" name="simpan">Simpan</button>
					</div>
				</form>
			</div>
		</div>

		<button class="back" onclick="window.location.href='index.php'">Kembali</button>
	</main>

</body>

</html>