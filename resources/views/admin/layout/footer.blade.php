<!-- js Detail pesan -->
<script>
    // JavaScript function to open the modal with full message
    function openDetailModal(fullMessage) {
        document.getElementById('full-message-modal').innerText = fullMessage;
        document.getElementById('messageModal').classList.remove('hidden');
    }

    // JavaScript function to close the modal
    function closeDetailModal() {
        document.getElementById('messageModal').classList.add('hidden');
    }
</script>


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
<!-- search -->

<!-- Skrip JavaScript edit akun-->
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

<!-- searching -->
<script>
    function myFunction() {
        var input, filter, table, tr, h6, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            h6 = tr[i].getElementsByTagName("h6")[0];
            if (h6) {
                txtValue = h6.textContent || h6.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>
</body>
<script src="{{ secure_asset('build/assets/js/plugins/chartjs.min.js') }}" async></script>
<!-- plugin for scrollbar  -->
<script src="{{ secure_asset('build/assets/js/plugins/perfect-scrollbar.min.js') }}" async></script>
<!-- github button -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- main script file  -->
<script src="{{ secure_asset('build/assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5') }}" async></script>

</html>