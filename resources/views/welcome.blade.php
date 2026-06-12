<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grow Together - English Club</title>
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>

    <header id="navbar">
        <div class="container nav-wrapper">
            <div class="logo">
                <img src="{{ asset('assets/images/favicon.png') }}" alt="Logo">
            </div>
            <nav>
                <a href="#home" class="nav-link">Home</a>
                <a href="#activities" class="nav-link">Activities</a>
                <a href="#events" class="nav-link">Events</a>
                <a href="#featured" class="nav-link">Featured</a>
                <a href="#contacts" class="nav-link">Contacts</a>
                <a href="{{ route('admin.login') }}" class="btn-blue-outline">Admin</a>
            </nav>
        </div>
    </header>

    <main class="container">

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <section id="home" class="section-hero">
            <div class="hero-box">
                <h1 class="hero-title">GROW TOGETHER</h1>
                <div class="hero-content">
                    <div class="hero-image-box">
                        <img src="{{ asset('assets/images/grow.png') }}" alt="Student">
                    </div>
                    <div class="hero-text-box">
                        <p>Move beyond the classroom and master the natural, flowing English used in real-world situations every day. Our club bridges the gap between textbooks and true fluency, offering a dynamic space to practice the idioms, tone, and cultural nuances you won't find in a lesson plan. Don't just study the language, start living it.</p>
                        <a href="#activities" class="btn-white">See More</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="activities" class="section-activities">
            <h2 class="section-title">Activity</h2>
            <div class="activity-list">

                @forelse ($schedules as $schedule)
                    @php $layout = $loop->even ? 'layout-text-left' : 'layout-img-left'; @endphp
                    <div class="activity-group">
                        <div class="activity-card {{ $layout }}">
                            @if ($layout === 'layout-img-left')
                                <div class="act-img">
                                    <img src="{{ asset('images/grow.png') }}" alt="{{ $schedule->title }}">
                                </div>
                            @endif

                            <div class="act-text">
                                <h3>{{ $schedule->title }}</h3>
                                <p>{{ $schedule->activity }}</p>
                                <button type="button"
                                        class="btn-register">
                                    Register
                                </button>
                            </div>

                            @if ($layout === 'layout-text-left')
                                <div class="act-img">
                                    <img src="{{ asset('images/grow.png') }}" alt="{{ $schedule->title }}">
                                </div>
                            @endif
                        </div>
                        <div class="activity-info">
                            <div class="info-top">
                                <h4>{{ $schedule->title }}</h4>
                                <span class="badge">{{ ucfirst($schedule->status) }}</span>
                            </div>
                            <div class="info-bottom">
                                <div class="info-col">{{ \Carbon\Carbon::parse($schedule->day)->format('d M Y') }}</div>
                                <div class="info-col">{{ \Carbon\Carbon::parse($schedule->time)->format('H.i') }} WIB</div>
                                <div class="info-col">Basecamp English Club</div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="empty-state">Belum ada jadwal kegiatan terbaru. Silakan cek kembali nanti.</p>
                @endforelse

            </div>
        </section>

        <section id="events" class="section-activities">
            <h2 class="section-title">Events</h2>
            <div class="activity-list">

                @forelse ($events as $event)
                    <div class="activity-group">
                        <div class="activity-card layout-img-left">
                            <div class="act-img">
                                <img src="{{ asset('images/grow.png') }}" alt="{{ $event->title }}">
                            </div>
                            <div class="act-text">
                                <h3>{{ $event->title }}</h3>
                                <p>{{ $event->description }}</p>
                            </div>
                        </div>
                        <div class="activity-info">
                            <div class="info-top">
                                <h4>{{ $event->title }}</h4>
                                <span class="badge">{{ ucfirst($event->status) }}</span>
                            </div>
                            <div class="info-bottom">
                                <div class="info-col">{{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</div>
                                <div class="info-col">Status: {{ ucfirst($event->status) }}</div>
                                <div class="info-col">Basecamp English Club</div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="empty-state">Belum ada event yang tersedia. Silakan cek kembali nanti.</p>
                @endforelse

            </div>
        </section>

        <section id="featured" class="section-featured">
            <h2 class="section-title">Featured</h2>
            <div class="featured-grid">
                <div class="featured-card">
                    <div class="feature-icon"><i class="fas fa-brain"></i></div>
                    <h4>Immersive Learning</h4>
                    <hr>
                    <p>We dry the theory and simulate environments where you spend more time speaking. Learn by doing to build muscle memory.</p>
                </div>
                <div class="featured-card">
                    <div class="feature-icon"><i class="fas fa-users"></i></div>
                    <h4>A Community of Growth</h4>
                    <hr>
                    <p>Join a diverse network of learners. Share resources and enjoy a safe space to make mistakes and grow together.</p>
                </div>
                <div class="featured-card">
                    <div class="feature-icon"><i class="fas fa-chalkboard-teacher"></i></div>
                    <h4>Expert Mentorship</h4>
                    <hr>
                    <p>Our regular sessions pair experienced speakers with beginners. Everyone has something to teach and room to improve.</p>
                </div>
                <div class="featured-card">
                    <div class="feature-icon"><i class="fas fa-award"></i></div>
                    <h4>Real-World Success</h4>
                    <hr>
                    <p>From acing job interviews to confident university presentations, see tangible results in professional and academic lives.</p>
                </div>
            </div>
        </section>

        <section id="contacts" class="section-contacts">
            <h2 class="section-title">Contact</h2>
            <div class="contact-box">
                <div class="contact-text">
                    <h3 class="contact-subtitle">Ready to Start Your Journey?</h3>
                    <p class="contact-desc">We'd love to have you! Whether you're a beginner looking to build a foundation or an advanced speaker aiming for perfection, there's a place for you here. Drop us a message or stop by our next session.</p>
                </div>
                <div class="social-links">
                    <div class="social-item">
                        <i class="fab fa-instagram"></i>
                        <p>@englishclub.id</p>
                    </div>
                    <div class="social-item">
                        <i class="fab fa-tiktok"></i>
                        <p>@englishclub.id</p>
                    </div>
                    <div class="social-item">
                        <i class="fas fa-envelope"></i>
                        <p>englishclubid@gmail.com</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="admin" class="section-admin">
            <div class="admin-box">
                <div class="admin-left">
                    <i class="fas fa-user-shield"></i>
                    <div>
                        <h4>Administrator Area</h4>
                        <p>Manage club schedules, activities, and member data.</p>
                    </div>
                </div>
                <div class="admin-right">
                    <a href="{{ route('admin.login') }}" class="btn-blue-outline">Login as Admin</a>
                </div>
            </div>
        </section>
    </main>

    {{-- Modal Registrasi Participant --}}
    <div class="modal-overlay {{ $errors->any() ? 'show' : '' }}"
         id="registerModal"
         data-has-error="{{ $errors->any() ? '1' : '0' }}">
        <div class="modal-box">
            <button type="button" class="modal-close" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
            <h3 class="modal-title">Join This Activity</h3>
            <p class="modal-subtitle">Isi data dirimu untuk mendaftar kegiatan English Club.</p>

            <form action="{{ route('register.submit') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Enter your full name">
                    @error('name') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
                    @error('email') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx">
                    @error('phone') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Gender</label>
                    <select id="jenis_kelamin" name="jenis_kelamin">
                        <option value="">-- Select Gender --</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin') <span class="form-error">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="btn-submit">Register Now</button>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/landing.js') }}"></script>
</body>
</html>