<h1>Edit <b>Password</b></h1>
<br>
<form id="passwordForm" method="POST" action="<?php echo base_url('Admin/aksi_update_password/' . $id) ?>">
    <label for="password" class="form-label">Password Baru</label>
    <input type="password" class="form-control" id="password" name="password" required>
    <br>
    <label for="password_ulang" class="form-label">Masukkan Ulang Password Baru</label>
    <input type="password" class="form-control" id="password_ulang" name="password_ulang" required>
    <div id="passwordMismatch" style="display: none; color: red;">Password tidak sama.</div>
    <button class="btn btn-primary mt-5" id="updateButton">Update</button>
</form>

<script>
document.getElementById("passwordForm").addEventListener("submit", function(event) {
    var password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("password_ulang").value;

    if (password !== confirmPassword) {
        event.preventDefault(); // Menghentikan pengiriman formulir jika password tidak sama
        document.getElementById("passwordMismatch").style.display = "block";
    } else {
        document.getElementById("passwordMismatch").style.display = "none";
        // Form akan terus dikirim jika password cocok
    }
});
</script>