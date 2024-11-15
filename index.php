<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../styles/style.css">
  <title>Pendaftaran Siswa Baru</title>
</head>

<body>
  <header>
    <h1>Yayasan Dentha Jefry</h1>
    <h3>Pendaftaran Siswa Baru</h3>
  </header>

  <div class="button-container">
    <button class="daftar" onclick="openModal()">Daftar Baru</button>
    <button class="pendaftar" onclick="window.location.href='list-siswa.php'">
      Pendaftar
    </button>
  </div>

  <?php include 'form-daftar.php'; ?>

  <?php if (isset($_GET['status'])): ?>
    <p class="status">
      <?php if ($_GET['status'] == 'sukses') {
        echo "Pendaftaran siswa baru berhasil!";
      } else {
        echo "Pendaftaran gagal!";
      }
      ?>
    </p>
  <?php endif; ?>

  <script>
    function openModal() {
      document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
      document.getElementById("myModal").style.display = "none";
    }
  </script>
</body>

</html>