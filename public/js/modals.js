// Fetching all of the deleting modals 
let confirmIDs = document.querySelectorAll('[data-bs-target^="#delete"]');
// Getting the deletion form
let deleteForm = document.querySelectorAll('[id^="deleting"]');

// Setting the right URL for deleting selected category
confirmIDs.forEach(el => {
    el.addEventListener('click', _ => {
        deleteForm.forEach(form => {
            form.action = el.dataset.route;
        });
    });
});
