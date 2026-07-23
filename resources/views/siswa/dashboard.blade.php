@extends('siswa.layout')

@section('title', 'Dashboard Siswa')

@section('content')
<!-- Clean Background Layer -->
<div class="fixed inset-0 -z-10 bg-gray-100 dark:bg-gray-900"></div>

<div class="relative min-h-screen">
<div class="space-y-8 p-4">
    <!-- Welcome Header -->
    <div class="bg-gradient-to-r from-green-600 via-emerald-600 to-teal-600 rounded-2xl shadow-xl p-8 text-white relative overflow-hidden">
        <!-- Decorative Background Elements -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl transform translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-teal-400 rounded-full blur-3xl transform -translate-x-1/2 translate-y-1/2"></div>
        </div>
        <!-- Decorative Pattern -->
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
        <div class="relative z-10">
            <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ $siswa->nama_siswa }}</h1>
            <p class="text-green-100 text-lg">Kelas {{ $siswa->kelas ?? 'XI' }} • NIS: {{ $siswa->nis }}</p>
            <div class="mt-4 flex items-center space-x-4">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-sm">{{ now()->format('l, d F Y') }}</span>
                </div>
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="text-sm">{{ now()->format('H:i') }} WIB</span>
                </div>
            </div>
        </div>
    </div>


    <!-- Main Dashboard Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Left Column: Pengumuman Penting -->
        <div class="lg:col-span-2">
            <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm rounded-xl shadow-lg p-6 transition-all duration-200 hover:shadow-2xl relative overflow-hidden h-full flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="mr-3">
                                <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-800 dark:text-white">Pengumuman Penting</h2>
                        </div>
                        <span class="text-green-600 hover:text-green-700 text-sm font-medium cursor-pointer">Lihat Semua</span>
                    </div>
                    @php
                        $announcements = App\Models\DashboardContent::active()
                            ->ofType('announcement')
                            ->orderBy('order')
                            ->orderBy('created_at', 'desc')
                            ->limit(4)
                            ->get();
                    @endphp
                    <div class="space-y-4">
                        @forelse($announcements as $announcement)
                            <div class="p-4 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/40">
                                <div class="flex items-start justify-between">
                                    <div class="pr-4">
                                        <h3 class="font-semibold text-gray-800 dark:text-white text-sm">{{ $announcement->title ?? 'Pengumuman' }}</h3>
                                        <p class="text-xs text-gray-600 dark:text-gray-300 mt-1">{{ $announcement->content }}</p>
                                        <div class="flex items-center space-x-2 text-[11px] text-gray-500 dark:text-gray-400 mt-2">
                                            <span>{{ $announcement->formatted_date ?? optional($announcement->created_at)->format('d M Y') }}</span>
                                            @if(!empty($announcement->author))
                                                <span>• {{ $announcement->author }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <span class="text-[11px] px-2 py-1 rounded-full bg-green-100 text-green-700 dark:bg-green-900/40 dark:text-green-200">{{ $announcement->category ?? 'Umum' }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-10">
                                <div class="bg-gray-100 dark:bg-gray-700/60 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-8 h-8 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                                    </svg>
                                </div>
                                <h4 class="text-base font-semibold text-gray-800 dark:text-white mb-1">Belum Ada Pengumuman</h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Pengumuman dan informasi terbaru dari admin akan muncul di sini.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column: Ekstrakurikuler Saya -->
        <div class="lg:col-span-1">
            <div class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-sm rounded-xl shadow-lg p-6 transition-all duration-200 hover:shadow-2xl relative overflow-hidden h-full flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="mr-3">
                                <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <h2 class="text-xl font-bold text-gray-800 dark:text-white">Ekstrakurikuler Saya</h2>
                        </div>
                        <a href="{{ route('siswa.eskul') }}" class="text-emerald-600 hover:text-emerald-700 text-sm font-medium">Lihat Semua</a>
                    </div>
                    @if($pendaftaran->isEmpty())
                        <div class="text-center py-8">
                            <div class="bg-gray-100 dark:bg-gray-700/60 w-14 h-14 rounded-full flex items-center justify-center mx-auto mb-3">
                                <svg class="w-7 h-7 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <h4 class="text-base font-semibold text-gray-800 dark:text-white mb-1">Belum Ada Eskul</h4>
                            <p class="text-xs text-gray-500 dark:text-gray-400 mb-4">Bergabunglah untuk mengembangkan minatmu.</p>
                            <a href="{{ route('siswa.eskul') }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 text-white text-xs font-semibold rounded-lg hover:bg-emerald-700 transition">
                                Daftar Sekarang
                            </a>
                        </div>
                    @else
                        <div class="space-y-3">
                            @foreach($pendaftaran as $p)
                                @php
                                    $status = strtolower($p->status);
                                    $statusClass = [
                                        'diterima' => 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-200',
                                        'pending' => 'bg-yellow-100 text-yellow-700 dark:bg-yellow-900/40 dark:text-yellow-200',
                                        'ditolak' => 'bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-200',
                                    ][$status] ?? 'bg-gray-100 text-gray-700 dark:bg-gray-700 dark:text-gray-200';
                                @endphp
                                <div class="p-3.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/40 flex items-center justify-between">
                                    <div class="flex items-center min-w-0 mr-2">
                                        <div class="flex-shrink-0 h-9 w-9 rounded-full bg-gradient-to-r from-green-500 to-emerald-500 flex items-center justify-center mr-3">
                                            <span class="text-white font-semibold text-xs">{{ substr($p->eskul->nama_eskul, 0, 2) }}</span>
                                        </div>
                                        <div class="truncate">
                                            <h4 class="text-xs font-semibold text-gray-800 dark:text-white truncate">{{ $p->eskul->nama_eskul }}</h4>
                                            <p class="text-[11px] text-gray-500 dark:text-gray-400 truncate">{{ $p->eskul->jadwal_latihan ?? '-' }}</p>
                                        </div>
                                    </div>
                                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-semibold flex-shrink-0 {{ $statusClass }}">{{ ucfirst($p->status) }}</span>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<button type="button" onclick="toggleChatbot()" aria-label="Tutorial Aplikasi Permulaan"
    class="fixed bottom-6 right-6 z-40 h-14 w-14 rounded-full bg-gradient-to-r from-emerald-500 to-teal-500 shadow-xl shadow-emerald-500/30 border-2 border-white flex items-center justify-center hover:scale-105 transition">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6h6M9 10h6m-9 8h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v10a2 2 0 002 2h1l2 2 2-2z" />
    </svg>
</button>

<div id="chatbot-panel" class="fixed bottom-24 right-6 z-40 w-80 max-w-full bg-white dark:bg-gray-900 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 hidden">
    <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-gray-700">
        <div class="flex items-center space-x-3">
            <img src="{{ asset('images/robot.png') }}" alt="Chatbot" class="h-10 w-10 rounded-full object-cover">
            <div>
                <p class="text-xs uppercase text-gray-500 dark:text-gray-400 tracking-[0.15em]">Panduan</p>
                <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Tutorial Aplikasi Permulaan</h4>
            </div>
        </div>
        <button type="button" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200" onclick="toggleChatbot()">✕</button>
    </div>
    <div class="px-4 py-3 space-y-3 max-h-72 overflow-y-auto" id="chatbot-messages">
        <div class="flex space-x-2">
            <img src="{{ asset('images/robot.png') }}" alt="Chatbot" class="h-8 w-8 rounded-full object-cover">
            <div class="bg-emerald-50 dark:bg-emerald-900/30 text-sm text-gray-800 dark:text-gray-100 rounded-2xl px-3 py-2 max-w-[75%]">
                Hai! Ini panduan cepat penggunaan aplikasi. Pilih salah satu topik di bawah.
            </div>
        </div>
        <div class="space-y-2" id="chatbot-quick">
            @php
                $faqsFloating = [
                    'Langkah awal setelah login?' => 'Cek profil untuk verifikasi data, lalu buka menu Eskul untuk memilih kegiatan.',
                    'Cara daftar eskul?' => 'Buka menu Eskul, pilih eskul, klik Daftar. Status menunggu approval admin.',
                    'Cek jadwal dan presensi?' => 'Lihat kartu Jadwal Hari Ini untuk agenda, dan menu Presensi untuk riwayat kehadiran.',
                    'Ubah foto atau data profil?' => 'Masuk halaman Profil, klik Ubah Data, unggah foto baru atau perbarui data, lalu Simpan.',
                ];
            @endphp
            @foreach($faqsFloating as $question => $answer)
                <button type="button" class="w-full text-left text-sm px-3 py-2 rounded-xl border border-gray-200 dark:border-gray-700 text-gray-800 dark:text-gray-200 hover:border-emerald-400 hover:bg-emerald-50 dark:hover:bg-emerald-900/30 transition"
                    onclick="chatbotSend('{{ addslashes($question) }}', '{{ addslashes($answer) }}')">
                    {{ $question }}
                </button>
            @endforeach
        </div>
    </div>
    <div class="px-4 py-3 border-t border-gray-200 dark:border-gray-700 text-xs text-gray-500 dark:text-gray-400">
        Chatbot statis: jawaban preset untuk pertanyaan umum.
    </div>
</div>

<script>
    const chatbotPanel = document.getElementById('chatbot-panel');
    const chatbotMessages = document.getElementById('chatbot-messages');

    function toggleChatbot() {
        if (!chatbotPanel) return;
        chatbotPanel.classList.toggle('hidden');
        if (!chatbotPanel.classList.contains('hidden') && chatbotMessages) {
            chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
        }
    }

    function chatbotSend(question, answer) {
        if (!chatbotMessages) return;
        if (chatbotPanel && chatbotPanel.classList.contains('hidden')) {
            chatbotPanel.classList.remove('hidden');
        }

        const userRow = document.createElement('div');
        userRow.className = 'flex justify-end';
        const userBubble = document.createElement('div');
        userBubble.className = 'bg-emerald-500 text-white text-sm rounded-2xl px-3 py-2 max-w-[75%]';
        userBubble.textContent = question;
        userRow.appendChild(userBubble);

        const botRow = document.createElement('div');
        botRow.className = 'flex space-x-2 mt-2';
        const botAvatar = document.createElement('img');
        botAvatar.src = '{{ asset('images/robot.png') }}';
        botAvatar.alt = 'Chatbot';
        botAvatar.className = 'h-8 w-8 rounded-full object-cover';
        const botBubble = document.createElement('div');
        botBubble.className = 'bg-emerald-50 dark:bg-emerald-900/30 text-sm text-gray-800 dark:text-gray-100 rounded-2xl px-3 py-2 max-w-[75%]';
        botBubble.textContent = answer;
        botRow.appendChild(botAvatar);
        botRow.appendChild(botBubble);

        chatbotMessages.appendChild(userRow);
        chatbotMessages.appendChild(botRow);
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    }
</script>

<style>
    @keyframes blob {
        0%, 100% {
            transform: translate(0, 0) scale(1);
        }
        25% {
            transform: translate(20px, -50px) scale(1.1);
        }
        50% {
            transform: translate(-20px, 20px) scale(0.9);
        }
        75% {
            transform: translate(50px, 50px) scale(1.05);
        }
    }
    
    .animate-blob {
        animation: blob 20s infinite;
    }
    
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    
    .animation-delay-4000 {
        animation-delay: 4s;
    }

    /* Chatbot scrollbar styling */
    #chatbot-messages {
        scrollbar-width: thin; /* Firefox */
        scrollbar-color: rgba(16, 185, 129, 0.6) transparent;
    }
    #chatbot-messages::-webkit-scrollbar {
        width: 8px; /* WebKit */
    }
    #chatbot-messages::-webkit-scrollbar-track {
        background: transparent;
        border-radius: 9999px;
    }
    #chatbot-messages::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, #10b981, #14b8a6); /* emerald -> teal */
        border-radius: 9999px;
        border: 2px solid rgba(255, 255, 255, 0.15);
    }
    #chatbot-messages::-webkit-scrollbar-thumb:hover {
        background: linear-gradient(to bottom, #34d399, #2dd4bf);
    }
    .dark #chatbot-messages {
        scrollbar-color: rgba(16, 185, 129, 0.75) transparent;
    }
    .dark #chatbot-messages::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, rgba(16,185,129,0.8), rgba(20,184,166,0.8));
        border: 2px solid rgba(31, 41, 55, 0.4); /* gray-800 border */
    }
</style>
@endsection