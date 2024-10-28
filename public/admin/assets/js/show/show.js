// function confirmDelete(adminId) {
//     if (confirm("Are you sure you want to delete this admin?")) {
//         // Send a request to the delete endpoint
//         fetch('delete_admin.php', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json'
//             },
//             body: JSON.stringify({ id: adminId }) // Pass the ID in the body
//         })
//         .then(response => response.json())
//         .then(data => {
//             if (data.success) {
//                 alert("Admin deleted");
//                 // Optionally, redirect or remove the admin from the page
//                 window.location.reload(); // Reload the current page
//             } else {
//                 alert("Error deleting admin");
//             }
//         })
//         .catch(error => console.error('Error:', error));
//     }
// }



function confirmDelete() {
    return confirm('Are you sure you want to delete this admin? This action cannot be undone.');
  }

  function confirmActive() {
    return confirm('Are you sure you want to active this admin?');
  }