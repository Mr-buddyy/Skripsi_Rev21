<script>
    var menu = document.getElementById("menu");

    // open/close the menu when the user clicks on the button
    function toggleMenu() {
        if (menu.classList.contains('hidden')) {
            menu.classList.remove('hidden');
        } else {
            menu.classList.add('hidden');
        }
    }

    // close the menu when the user clicks outside of it 
    window.onclick = function(event) {
        var dropdownWrapper = document.getElementById('dropdown-wrapper');
        if (!dropdownWrapper.contains(event.target) && !menu.classList.contains('hidden')) {
            menu.classList.add('hidden');
        }
    }
</script>
<!-- status -->
<!-- <script>
    function confirmStatusChange() {
        var selectedStatus = document.getElementsByName('sponsor_status').value;
        if (selectedStatus === 'rejected') {
            return confirm('Anda yakin ingin menolak? Ini akan memiliki konsekuensi tertentu.');
        }
        return confirm('Apakah Anda yakin ingin menyimpan perubahan status?');
    }
</script> -->
<!-- hide modal -->

<!-- <script>
    const modal = document.getElementById('statusModal');
    const showModalButton = document.getElementById('showModalButton');
    const cancelButton = document.getElementById('cancelButton');
    const saveButton = document.getElementById('saveButton');

    showModalButton.addEventListener('click', () => {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    });

    cancelButton.addEventListener('click', () => {
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    });

    saveButton.addEventListener('click', () => {
        // Lanjutkan dengan mengirimkan perubahan status ke server atau melakukan tindakan lainnya.
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    });
</script> -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var showModalButtons = document.querySelectorAll('.showModalButton');
        var cancelButton = document.querySelectorAll('.cancelButton');
        var saveButton = document.querySelectorAll('.saveButton');

        showModalButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var modalId = button.getAttribute('data-modal-id');
                var modal = document.getElementById('modal' + modalId);
                modal.classList.remove('hidden');
            });
        });

        cancelButton.forEach(function(button) {
            button.addEventListener('click', function() {
                var modal = button.closest('.modal');
                modal.classList.add('hidden');
            });
        });

        saveButton.forEach(function(button) {
            button.addEventListener('click', function() {
                var modal = button.closest('.modal');
                modal.classList.add('hidden');
            });
        });
    });
</script>

<!-- js status -->
<!-- <script>
    const modal = document.querySelector('.modal');
    const showModalButton = document.getElementById('showModalButton');
    const cancelButton = document.getElementById('cancelButton');
    const saveButton = document.getElementById('saveButton');

    showModalButton.addEventListener('click', () => {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    });

    cancelButton.addEventListener('click', function(e) {
        e.preventDefault();
        modal.classList.remove('flex');
        modal.classList.add('hidden');

    });

    saveButton.addEventListener('click', () => {
        // Lanjutkan dengan mengirimkan perubahan status ke server atau melakukan tindakan lainnya.
        modal.classList.remove('flex');
        modal.classList.add('hidden');
    });
</script> -->


<!-- js upload mou -->
<!-- <script>
    // Fungsi untuk membuka modal
    function openDetailModal() {
        document.getElementById('detailModal').classList.remove('hidden');
    }

    // Fungsi untuk menutup modal
    function closeDetailModal() {
        document.getElementById('detailModal').classList.add('hidden');
    }

    // Menampilkan modal ketika tombol "Detail" diklik
    document.getElementById('openDetailModal').addEventListener('click', openDetailModal);

    // Menutup modal saat tombol "Batal" diklik
    document.getElementById('cancelButton').addEventListener('click', closeDetailModal);

    // Tambahkan kode untuk mengirim data ketika tombol "Konfirmasi" diklik
    document.getElementById('confirmButton').addEventListener('click', function() {
        // Tambahkan kode pengiriman data di sini
        // Setelah pengiriman data selesai, Anda bisa menutup modal dengan memanggil closeDetailModal()
        closeDetailModal();
    });
</script> -->


</body>
<!-- plugin for charts  -->
<script src="/assets/js/plugins/chartjs.min.js" async></script>
<!-- plugin for scrollbar  -->
<script src="/assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- github button -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- main script file  -->
<script src="/assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script>

</html>