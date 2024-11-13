<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Formulir Edit Siswa | SMK Coding</title>
    <script>
        function openEditModal() {
            document.getElementById("editModal").style.display = "block";
        }

        function closeEditModal() {
            document.getElementById("editModal").style.display = "none";
        }
    </script>
</head>

<body>
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
</body>

</html>