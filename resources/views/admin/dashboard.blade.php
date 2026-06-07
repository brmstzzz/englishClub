@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<style>
    :root {
        --blue:    #1F3568;
        --blue-mid:#2a4a8a;
        --blue-light: #3a5db5;
        --yellow:  #FFD600;
        --white:   #FFFFFF;
        --light:   #F0F4FF;
        --muted:   #8492b0;
    }

    .ec-dash { font-family: 'Poppins', sans-serif; padding: 0; }

    /* ── HERO BANNER ── */
    .ec-hero {
        background: linear-gradient(135deg, #1F3568 0%, #2a4a8a 50%, #3a5db5 100%);
        border-radius: 20px;
        padding: 40px 48px;
        margin-bottom: 32px;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: space-between;
        animation: fadeSlideDown .6s ease both;
        box-shadow: 0 8px 32px rgba(31,53,104,.25);
    }
    .ec-hero::before {
        content: '';
        position: absolute;
        width: 320px; height: 320px;
        background: rgba(255,255,255,.05);
        border-radius: 50%;
        top: -80px; right: -60px;
    }
    .ec-hero::after {
        content: '';
        position: absolute;
        width: 180px; height: 180px;
        background: rgba(255,255,255,.04);
        border-radius: 50%;
        bottom: -60px; right: 120px;
    }
    .ec-hero-left h1 {
        color: #ffffff;
        font-size: 1.9rem;
        font-weight: 800;
        letter-spacing: -0.5px;
        margin: 0 0 6px;
    }
    .ec-hero-left p {
        color: rgba(255,255,255,.65);
        font-size: .9rem;
        margin: 0;
    }
    .ec-hero-badge {
        background: rgba(255,255,255,.15);
        color: #ffffff;
        font-weight: 600;
        font-size: .75rem;
        padding: 4px 12px;
        border-radius: 20px;
        display: inline-block;
        margin-bottom: 10px;
        letter-spacing: .5px;
        text-transform: uppercase;
        border: 1px solid rgba(255,255,255,.2);
    }
    .ec-hero-right {
        text-align: right;
        position: relative;
        z-index: 1;
    }
    .ec-hero-date {
        color: rgba(255,255,255,.5);
        font-size: .8rem;
    }
    .ec-hero-time {
        color: #ffffff;
        font-size: 2.2rem;
        font-weight: 700;
        line-height: 1;
    }

    /* ── STAT CARDS ── */
    .ec-stats {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 32px;
    }
    .ec-stat {
        background: var(--white);
        border-radius: 16px;
        padding: 28px 24px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 20px rgba(31,53,104,.07);
        animation: fadeSlideUp .5s ease both;
        transition: transform .2s, box-shadow .2s;
        border: 1px solid #eef1f8;
    }
    .ec-stat::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
    }
    .ec-stat:nth-child(1)::before { background: linear-gradient(90deg, #1F3568, #3a5db5); }
    .ec-stat:nth-child(2)::before { background: linear-gradient(90deg, #FFD600, #ffb300); }
    .ec-stat:nth-child(3)::before { background: linear-gradient(90deg, #00C896, #00a07a); }
    .ec-stat:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(31,53,104,.12); }

    .ec-stat-icon {
        width: 48px; height: 48px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.3rem;
        margin-bottom: 16px;
    }
    .ec-stat:nth-child(1) .ec-stat-icon { background: linear-gradient(135deg, #e8edf8, #d0d9f0); color: var(--blue); }
    .ec-stat:nth-child(2) .ec-stat-icon { background: linear-gradient(135deg, #fff8d6, #fff0a0); color: #8a6000; }
    .ec-stat:nth-child(3) .ec-stat-icon { background: linear-gradient(135deg, #d6f5ec, #a0ebd4); color: #008060; }

    .ec-stat-num {
        font-size: 2.4rem;
        font-weight: 800;
        color: var(--blue);
        line-height: 1;
        margin-bottom: 4px;
    }
    .ec-stat-label {
        font-size: .82rem;
        color: var(--muted);
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: .6px;
    }
    .ec-stat-sub {
        font-size: .78rem;
        color: var(--muted);
        margin-top: 8px;
    }
    .ec-stat-dot {
        width: 8px; height: 8px;
        border-radius: 50%;
        display: inline-block;
        margin-right: 4px;
        vertical-align: middle;
    }

    /* ── BOTTOM GRID ── */
    .ec-bottom {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    /* ── PANEL ── */
    .ec-panel {
        background: var(--white);
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(31,53,104,.07);
        overflow: hidden;
        animation: fadeSlideUp .6s ease both;
        animation-delay: .35s;
        border: 1px solid #eef1f8;
    }
    .ec-panel-head {
        background: linear-gradient(135deg, #1F3568 0%, #2a4a8a 100%);
        padding: 18px 24px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .ec-panel-head h3 {
        color: #ffffff;
        font-size: .95rem;
        font-weight: 700;
        margin: 0;
        letter-spacing: .3px;
    }
    .ec-panel-head a {
        color: rgba(255,255,255,.6);
        font-size: .78rem;
        text-decoration: none;
        transition: color .2s;
    }
    .ec-panel-head a:hover { color: #ffffff; }
    .ec-panel-body { padding: 20px 24px; }

    /* ── RECENT TABLE ── */
    .ec-mini-table { width: 100%; border-collapse: collapse; }
    .ec-mini-table th {
        font-size: .72rem;
        text-transform: uppercase;
        letter-spacing: .6px;
        color: var(--muted);
        padding: 0 0 12px;
        text-align: left;
        border-bottom: 1px solid #eef0f7;
    }
    .ec-mini-table td {
        padding: 12px 0;
        font-size: .84rem;
        color: #3a4a6b;
        border-bottom: 1px solid #f5f7ff;
    }
    .ec-mini-table tr:last-child td { border: none; }
    .ec-badge {
        display: inline-block;
        padding: 3px 10px;
        border-radius: 20px;
        font-size: .7rem;
        font-weight: 600;
    }
    .ec-badge.upcoming  { background: rgba(255,214,0,.15); color: #7a5500; }
    .ec-badge.ongoing   { background: rgba(0,200,150,.12); color: #007050; }
    .ec-badge.ended     { background: rgba(31,53,104,.08); color: var(--blue); }

    /* ── QUICK LINKS ── */
    .ec-quick { display: flex; flex-direction: column; gap: 10px; }
    .ec-quick-btn {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 13px 18px;
        border-radius: 12px;
        text-decoration: none;
        background: #f8faff;
        color: var(--blue);
        font-size: .86rem;
        font-weight: 600;
        transition: all .2s;
        border: 1.5px solid #eef1f8;
    }
    .ec-quick-btn:hover {
        background: linear-gradient(135deg, #1F3568, #2a4a8a);
        color: #ffffff;
        border-color: transparent;
        transform: translateX(4px);
        text-decoration: none;
    }
    .ec-quick-btn i { font-size: 1rem; width: 18px; text-align: center; }

    /* ── ANIMATIONS ── */
    @keyframes fadeSlideDown {
        from { opacity: 0; transform: translateY(-16px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeSlideUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }

    .count-up { display: inline-block; }
</style>

<div class="ec-dash">

    {{-- HERO --}}
    <div class="ec-hero">
        <div class="ec-hero-left">
            <span class="ec-hero-badge">&#9679; Admin Panel</span>
            <h1>Selamat Datang, Admin!</h1>
            <p>English Club — Event Management System</p>
        </div>
        <div class="ec-hero-right">
            <div class="ec-hero-date">{{ now()->translatedFormat('l, d F Y') }}</div>
            <div class="ec-hero-time" id="liveClock">--:--</div>
        </div>
    </div>

    {{-- STAT CARDS --}}
    <div class="ec-stats">
        <div class="ec-stat">
            <div class="ec-stat-icon"><i class="icon-star"></i></div>
            <div class="ec-stat-num"><span class="count-up" data-target="{{ $totalEvents ?? 0 }}">0</span></div>
            <div class="ec-stat-label">Total Event</div>
            <div class="ec-stat-sub">
                <span class="ec-stat-dot" style="background:#1F3568"></span>
                {{ $activeEvents ?? 0 }} aktif sekarang
            </div>
        </div>
        <div class="ec-stat">
            <div class="ec-stat-icon"><i class="icon-clock"></i></div>
            <div class="ec-stat-num"><span class="count-up" data-target="{{ $totalSchedules ?? 0 }}">0</span></div>
            <div class="ec-stat-label">Total Jadwal</div>
            <div class="ec-stat-sub">
                <span class="ec-stat-dot" style="background:#FFD600"></span>
                {{ $upcomingSchedules ?? 0 }} upcoming
            </div>
        </div>
        <div class="ec-stat">
            <div class="ec-stat-icon"><i class="icon-people"></i></div>
            <div class="ec-stat-num"><span class="count-up" data-target="{{ $totalParticipants ?? 0 }}">0</span></div>
            <div class="ec-stat-label">Total Peserta</div>
            <div class="ec-stat-sub">
                <span class="ec-stat-dot" style="background:#00C896"></span>
                Terdaftar di semua event
            </div>
        </div>
    </div>

    {{-- BOTTOM GRID --}}
    <div class="ec-bottom">

        {{-- Jadwal Terbaru --}}
        <div class="ec-panel">
            <div class="ec-panel-head">
                <h3>&#128197; Jadwal Terbaru</h3>
                <a href="{{ route('admin.schedules.index') }}">Lihat semua &rarr;</a>
            </div>
            <div class="ec-panel-body">
                @if(isset($latestSchedules) && $latestSchedules->count())
                    <table class="ec-mini-table">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Hari</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($latestSchedules as $s)
                            <tr>
                                <td>{{ Str::limit($s->title, 24) }}</td>
                                <td>{{ $s->day ?? '-' }}</td>
                                <td>
                                    <span class="ec-badge {{ $s->status }}">
                                        {{ ucfirst($s->status) }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p style="color:var(--muted);font-size:.85rem;text-align:center;padding:24px 0;">
                        Belum ada jadwal.
                    </p>
                @endif
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="ec-panel">
            <div class="ec-panel-head">
                <h3>&#9889; Quick Actions</h3>
            </div>
            <div class="ec-panel-body">
                <div class="ec-quick">
                    <a href="{{ route('admin.events.create') }}" class="ec-quick-btn">
                        <i class="icon-plus"></i> Tambah Event Baru
                    </a>
                    <a href="{{ route('admin.schedules.create') }}" class="ec-quick-btn">
                        <i class="icon-plus"></i> Tambah Jadwal Baru
                    </a>
                    <a href="{{ route('admin.participants.create') }}" class="ec-quick-btn">
                        <i class="icon-plus"></i> Tambah Peserta
                    </a>
                    <a href="{{ route('admin.participants.index') }}" class="ec-quick-btn">
                        <i class="icon-people"></i> Kelola Data Peserta
                    </a>
                    <a href="{{ route('admin.events.index') }}" class="ec-quick-btn">
                        <i class="icon-star"></i> Kelola Event
                    </a>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function updateClock() {
        const now = new Date();
        const h = String(now.getHours()).padStart(2,'0');
        const m = String(now.getMinutes()).padStart(2,'0');
        document.getElementById('liveClock').textContent = h + ':' + m;
    }
    updateClock();
    setInterval(updateClock, 1000);

    document.querySelectorAll('.count-up').forEach(el => {
        const target = parseInt(el.dataset.target) || 0;
        let current = 0;
        const step = Math.max(1, Math.ceil(target / 40));
        const timer = setInterval(() => {
            current = Math.min(current + step, target);
            el.textContent = current;
            if (current >= target) clearInterval(timer);
        }, 30);
    });
</script>

@endsection