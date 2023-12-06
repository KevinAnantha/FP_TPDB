<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Popup Bootstrap</title>
  <!-- Tautan CSS Bootstrap -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Gaya khusus */
    .custom-toast {
      position: absolute;
      top: 20px;
      right: 20px;
      z-index: 9999;
    }
  </style>
</head>
<body>

  <!-- Tombol untuk memicu popup -->
  <button id="showToastBtn" class="btn btn-primary">Hapus User</button>

  <!-- Kontainer untuk toast -->
  <div class="toast custom-toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
    <div class="toast-header bg-success text-white">
      <strong class="mr-auto">Notifikasi</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      User berhasil dihapus
    </div>
  </div>

  <!-- Tautan JavaScript Bootstrap (jQuery diperlukan) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    // Fungsi untuk menampilkan toast saat tombol diklik
    document.getElementById('showToastBtn').addEventListener('click', function() {
      $('.toast').toast('show'); // Memunculkan toast
    });
  </script>

</body>
</html>
