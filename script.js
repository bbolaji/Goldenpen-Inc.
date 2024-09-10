document.addEventListener('DOMContentLoaded', function () {
    const links = document.querySelectorAll('nav ul li a');

    for (const link of links) {
        link.addEventListener('click', smoothScroll);
    }

    function smoothScroll(event) {
        event.preventDefault();

        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        window.scrollTo({
            top: targetElement.offsetTop - 50,
            behavior: 'smooth'
        });
    }
});
<script>
        // JavaScript to toggle dropdown menu
        document.addEventListener('DOMContentLoaded', function() {
            var dropdown = document.querySelector('.dropbtn');
            var dropdownContent = document.querySelector('.dropdown-content');

            dropdown.addEventListener('click', function() {
                dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
            });

            window.addEventListener('click', function(event) {
                if (!event.target.matches('.dropbtn')) {
                    if (dropdownContent.style.display === 'block') {
                        dropdownContent.style.display = 'none';
                    }
                }
            });
        });
    </script>
