<footer class="footer_section">
    <div class="container">
        <p>
            &copy; <span id="displayYear"></span> All Rights Reserved By
            <a href="https://html.design/">Free Html Templates</a>
        </p>
    </div>
</footer>
<!-- footer section -->

<!-- jQery -->
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<!-- bootstrap js -->
<script src="{{ asset('js/bootstrap.js') }}"></script>
<!-- nice select -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"
    integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
<!-- owl slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<!-- custom js -->
<script src="{{ asset('js/custom.js') }}"></script>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    // Toggle user card display
    document.getElementById('userIcon').addEventListener('click', function() {
        var userCard = document.querySelector('.user-card');
        userCard.classList.toggle('show');
    });

    // Simulate a login status check
    var isLoggedIn = false; // Change to true to simulate logged-in state
    var userImageUrl = 'path/to/user/image.jpg'; // Replace with actual image URL

    // Function to update the icon based on login status
    function updateIcon() {
        var userIcon = document.getElementById('userIcon');
        var userImage = document.getElementById('userImage');
        if (isLoggedIn) {
            userIcon.querySelector('.user-icon').classList.add('d-none');
            userImage.src = userImageUrl;
            userImage.classList.remove('d-none');
        } else {
            userIcon.querySelector('.user-icon').classList.remove('d-none');
            userImage.classList.add('d-none');
        }
    }

    // Call the function on page load
    document.addEventListener('DOMContentLoaded', updateIcon);
</script>
