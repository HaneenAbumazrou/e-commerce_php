// document.querySelectorAll('.filter-option').forEach(item => {
//     item.addEventListener('click', function(event) {
//         event.preventDefault();
//         const filter = this.getAttribute('data-filter');
        
//         // Update the filter title
//         document.getElementById('filter-title').innerText = '| ' + this.textContent;

//         // Fetch data via AJAX
//         fetch(`./admin/dashboard?filter=${filter}`)
//             .then(response => {
//                 if (!response.ok) {
//                     throw new Error(`Network response was not ok: ${response.statusText}`);
//                 }
//                 return response.json();
//             })
//             .then(data => {
//                 if (data.orderCount !== undefined) {
//                     document.getElementById('order-count').innerText = data.orderCount;
//                     document.getElementById('percentage-change').innerText = (data.percentageChange || 0) + '%';
//                 } else {
//                     console.error("Unexpected data format:", data);
//                 }
//             })
//             .catch(error => {
//                 console.error("AJAX request failed:", error);
//             });
//     });
// });


// document.querySelectorAll('.filter-option').forEach(item => {
//     item.addEventListener('click', function(event) {
//         event.preventDefault();
        
//         // Get the filter text from the clicked item
//         const filterText = this.textContent;
        
//         // Update the filter title to display the selected filter
//         document.getElementById('filter-title').innerText = '| ' + filterText;
        
//         // Optionally, update any other elements or styles based on the selected filter
//     });
// });




//  // Simulated order counts for demonstration
//     const orderCounts = {
//         today: 10, // replace with actual count from server if needed
//         month: 300, // replace with actual count from server if needed
//         year: 1000 // replace with actual count from server if needed
//     };

//     // Add click event listeners to filter options
//     document.querySelectorAll('.filter-option').forEach(item => {
//         item.addEventListener('click', function(event) {
//             event.preventDefault(); // Prevent the default link behavior
            
//             const filter = this.getAttribute('data-filter'); // Get the selected filter
//             document.getElementById('filter-title').innerText = '| ' + this.textContent; // Update filter title
            
//             // Update order count based on filter
//             document.getElementById('order-count').innerText = orderCounts[filter];

//             // Optionally, you could also update the percentage change dynamically here
//             // document.getElementById('percentage-change').innerText = somePercentageChange; // Replace with actual value
//         });
//     });