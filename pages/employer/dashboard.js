// JavaScript for Dashboard Functionality

document.addEventListener('DOMContentLoaded', () => {
    // Toggle Sidebar Visibility for Mobile
    const sidebarToggleBtn = document.querySelector('.hamburger-menu');
    const sidebar = document.querySelector('.sidebar');

    if (sidebarToggleBtn) {
        sidebarToggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });
    }

    // Notification Badge Update
    function updateNotificationCount(count) {
        const notificationBadge = document.querySelector('.notification-badge');
        if (notificationBadge) {
            notificationBadge.innerText = count;
        }
    }
    
    // Dummy update for notification count (example only)
    updateNotificationCount(5);

    // Highlight Important Dates on Calendar
    const importantDates = ['2024-03-13', '2024-03-15'];
    importantDates.forEach(date => {
        const dateElement = document.querySelector(`[data-date="${date}"]`);
        if (dateElement) {
            dateElement.classList.add('highlight');
        } else {
            console.error(`Element with data-date="${date}" not found.`);
        }
    });

    // Animate Recruitment Progress Bars
    const progressBars = document.querySelectorAll('.progress-bar');
    progressBars.forEach(bar => {
        let value = parseInt(bar.dataset.progress);
        let current = 0;
        const interval = setInterval(() => {
            if (current < value) {
                current++;
                bar.style.width = current + '%';
            } else {
                clearInterval(interval);
            }
        }, 20);
    });

    // Applicant Detail Modal
    const applicants = document.querySelectorAll('.applicant');
    const modal = document.querySelector('.modal');
    const modalContent = document.querySelector('.modal-content');
    const modalClose = document.querySelector('.modal-close');

    applicants.forEach(applicant => {
        applicant.addEventListener('click', function() {
            if (modal) {
                modal.classList.add('active');
                modalContent.innerHTML = this.dataset.details;
            }
        });
    });

    if (modalClose) {
        modalClose.addEventListener('click', function() {
            modal.classList.remove('active');
        });
    }

    // Sidebar Navigation Links
    const navLinks = document.querySelectorAll('.sidebar nav ul li a');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetSection = document.querySelector(this.getAttribute('href'));
            if (targetSection) {
                window.scrollTo({
                    top: targetSection.offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Generate Calendar with Dates
    const calendarGrid = document.querySelector('.calendar-grid');
    if (calendarGrid) {
        const daysInMonth = 31; // Assuming March 2020 as in the example
        for (let day = 1; day <= daysInMonth; day++) {
            const date = new Date(2024, 2, day); // March is month 2 (0-indexed)
            const dateString = date.toISOString().split('T')[0];
            const dayElement = document.createElement('div');
            dayElement.classList.add('calendar-date');
            dayElement.setAttribute('data-date', dateString);
            dayElement.innerText = day;
            calendarGrid.appendChild(dayElement);
        }
    }
});
 