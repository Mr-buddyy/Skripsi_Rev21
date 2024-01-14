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