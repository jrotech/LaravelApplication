import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', (event) => {
    const form = document.getElementById('create_project_form');
    form.addEventListener('submit', function(event) {
        const title = document.getElementById('title').value;
        const description = document.getElementById('description').value;
        const startDate = document.getElementById('start_date').value;
        const endDate = document.getElementById('end_date').value;

        if(!title) {
            alert('Title is required');
            event.preventDefault();
        } else if(title.length > 100) {
            alert('Title should not exceed 100 characters');
            event.preventDefault();
        }

        if(!description) {
            alert('Description is required');
            event.preventDefault();
        } else if(description.length > 500) {
            alert('Description should not exceed 500 characters');
            event.preventDefault();
        }

        if(!startDate) {
            alert('Start date is required');
            event.preventDefault();
        }

        if(!endDate) {
            alert('End date is required');
            event.preventDefault();
        } else if(new Date(startDate) >= new Date(endDate)) {
            alert('End date should be after start date');
            event.preventDefault();
        }
    });
});
