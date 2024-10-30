
// Validate the login form
// import Swal from 'sweetalert2'

function validateForm() {
    const email = document.getElementById("yourUsername").value.trim();
    const password = document.getElementById("yourPassword").value.trim();

    // Check if email or password fields are empty
    if (email === "" || password === "") {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please enter both email and password.',
            confirmButtonText: 'OK'
        });
    
        return false; // Prevent form submission
    }
    

    // Validate email format using a regular expression
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailPattern.test(email)) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please enter a valid email.',
            confirmButtonText: 'OK'
        });
        return false; // Prevent form submission
    }

    // Validation passed
    return true;
}


document.addEventListener("DOMContentLoaded", function() {
    if (typeof loginError !== 'undefined' && loginError) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Invalid email or password.',
            confirmButtonText: 'OK'
        });
    }
});