<div >
    <div class="flex items-center justify-center w-full mb-3">
        <p class="uppercase text-[26px]">@lang('nav.audio_poems')</p>
    </div>
    <div class="flex flex-row flex-wrap items-center justify-center gap-2 md:justify-between">
        @foreach($audios as $audio)
            <div data-audio-src="{{ $audio->getAudio() }}" class="w-full md:w-[49%] p-1 text-white bg-[#c4b5a671] rounded-lg shadow-lg audio-player" >
                <div class="flex flex-row items-center justify-between pl-1">
                        <div style="background-image:url({{asset('images/G_Ezizow3.jpeg')}})" class="flex items-center justify-center p-3 text-gray-800 bg-cover rounded-sm playPauseBtn hover:bg-green-600 focus:outline-none">
                            <i class='playIcon bx bx-play-circle text-[28px] opacity-60'></i>
                            <i class='pauseIcon hidden bx bx-pause text-[28px]'></i>
                        </div>
                    <div class="items-start flex-1 pl-4">
                        <p class="text-sm text-white">{{ $audio['name_'.app()->getLocale()] }}</p>
                        <div class="relative pr-4">
                            <input type="range" min="0" max="100" value="0" class="w-full h-2 bg-gray-700 rounded-lg appearance-none cursor-pointer progressBar">
                            <span class="currentTime">00:00</span> / <span class="duration">00:00</span> 
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div id="galleries" class="w-full mb-10"></div>
</div>

<script>
    const audioPlayers = [];  // Array to keep track of all audio elements

    document.querySelectorAll('.audio-player').forEach(player => {
        const audio = new Audio(player.dataset.audioSrc);
        audioPlayers.push(audio);  // Add each audio element to the array
        const playPauseBtn = player.querySelector('.playPauseBtn');
        const playIcon = player.querySelector('.playIcon');
        const pauseIcon = player.querySelector('.pauseIcon');
        const progressBar = player.querySelector('.progressBar');
        const currentTimeEl = player.querySelector('.currentTime');
        const durationEl = player.querySelector('.duration');


        audio.addEventListener('loadedmetadata', () => {
            durationEl.textContent = formatTime(audio.duration);
            progressBar.max = audio.duration;
        });

        audio.addEventListener('timeupdate', () => {
            const currentTime = audio.currentTime;
            const progress = (currentTime / audio.duration) * 100;
            progressBar.value = progress;
            currentTimeEl.textContent = formatTime(currentTime);
        });

        progressBar.addEventListener('input', () => {
            audio.currentTime = progressBar.value;
        });

        playPauseBtn.addEventListener('click', () => {
            if (audio.paused) {
                // Pause all other audios before playing the new one
                audioPlayers.forEach(otherAudio => {
                    if (otherAudio !== audio) {
                        otherAudio.pause();
                        // Update the icons for all other players to show the play button
                        const otherPlayer = document.querySelector(`.audio-player[data-audio-src="${otherAudio.src}"]`);
                        if (otherPlayer) {
                            otherPlayer.querySelector('.playIcon').classList.remove('hidden');
                            otherPlayer.querySelector('.pauseIcon').classList.add('hidden');
                        }
                    }
                });
                audio.play();
                playIcon.classList.add('hidden');
                pauseIcon.classList.remove('hidden');
            } else {
                audio.pause();
                playIcon.classList.remove('hidden');
                pauseIcon.classList.add('hidden');
            }
        });
        function formatTime(time) {
            const minutes = Math.floor(time / 60);
            const seconds = Math.floor(time % 60);
            return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }
    });
</script>