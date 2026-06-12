document.addEventListener("DOMContentLoaded", function() {
    
    const navLinks = document.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('section');
    const headerHeight = document.querySelector('header').offsetHeight;

    // 1. Logika Klik Navigasi (Smooth Scroll)
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if(targetId === "#") return; 

            e.preventDefault();
            const targetSection = document.querySelector(targetId);

            if (targetSection) {
                const targetPosition = targetSection.getBoundingClientRect().top + window.scrollY - headerHeight;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // 2. Logika Scroll Spy (Warna menu berubah sesuai posisi scroll)
    window.addEventListener('scroll', () => {
        let currentSection = '';

        sections.forEach(section => {
            // Toleransi offset agar menu lebih responsif berganti warna
            const sectionTop = section.offsetTop - headerHeight - 150; 
            if (window.scrollY >= sectionTop) {
                currentSection = section.getAttribute('id');
            }
        });

        // --- PERBAIKAN FITUR MENU CONTACTS ---
        // Jika user melakukan scroll sampai batas layar paling bawah (mentok), 
        // paksa sistem untuk mengaktifkan menu 'contacts'
        if ((window.innerHeight + Math.round(window.scrollY)) >= document.body.offsetHeight - 10) {
            currentSection = 'contacts';
        }

        // Jalankan perubahan warna biru (active) pada menu
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href') === `#${currentSection}`) {
                link.classList.add('active');
            }
        });
    });

    // 3. Logika Jadwal (Event Info) Interaktif untuk Mobile Klik
    const activityGroups = document.querySelectorAll('.activity-group');
    
    activityGroups.forEach(group => {
        group.addEventListener('click', function() {
            this.classList.toggle('active-info');
        });
    });

});
// 4. Logika Modal Registrasi
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById('registerModal');
    const openButtons = document.querySelectorAll('.btn-register');
    const closeButton = document.querySelector('.modal-close');

    openButtons.forEach(btn => {
        btn.addEventListener('click', function (e) {
            e.preventDefault();
            if (modal) modal.classList.add('show');
        });
    });

    if (closeButton) {
        closeButton.addEventListener('click', function () {
            modal.classList.remove('show');
        });
    }

    if (modal) {
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.classList.remove('show');
            }
        });
    }

    // Jika ada error validasi dari server, otomatis buka modal lagi
    if (modal && modal.getAttribute('data-has-error') === '1') {
        modal.classList.add('show');
    }
});