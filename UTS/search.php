<div class="relative w-64">
  <input type="text" id="searchInput" class="border border-gray-300 rounded p-2 w-full" placeholder="Cari Mahasiswa...">
  <select id="dropdownList" class="border border-gray-300 rounded p-2 w-full mt-2 absolute bg-white z-10 hidden">
    <option value="" disabled selected>Pilih Mahasiswa</option>
    <!-- Data Mahasiswa akan dimasukkan di sini menggunakan PHP -->
    <?php
    // Contoh data mahasiswa
    $mahasiswa = [
      "1331110026 - LAVINIO BUDI WIJAYANTO",
      "1442623008 - LAVINIA OKY ARMALA",
      "2132610168 - DILAVINSA INDAR PUTRI NADILA",
      "2341760062 - LAVINA",
      "243206010061 - FIDELA MARVA LAVINIA"
    ];

    // Tampilkan data mahasiswa di dalam dropdown
    foreach ($mahasiswa as $mhs) {
      echo "<option value=\"$mhs\">$mhs</option>";
    }
    ?>
  </select>
  <script>
    const searchInput = document.getElementById('searchInput');
    const dropdownList = document.getElementById('dropdownList');

    // Tampilkan dropdown saat mengetik
    searchInput.addEventListener('input', function() {
      const filter = searchInput.value.toLowerCase();
      const options = dropdownList.options;
      let hasResult = false;

      for (let i = 1; i < options.length; i++) {
        const textValue = options[i].textContent || options[i].innerText;
        if (textValue.toLowerCase().indexOf(filter) > -1) {
          options[i].style.display = "";
          hasResult = true;
        } else {
          options[i].style.display = "none";
        }
      }

      // Tampilkan atau sembunyikan dropdown berdasarkan hasil
      dropdownList.classList.toggle('hidden', !hasResult);
    });

    // Sembunyikan dropdown jika pengguna mengklik di luar
    document.addEventListener('click', function(event) {
      if (!event.target.closest('.relative')) {
        dropdownList.classList.add('hidden');
      }
    });
  </script>
</div>