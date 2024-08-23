

<div class="relative w-full h-full mt-2 overflow-y-auto shadow-md custom-scrollbar sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th class="px-6 py-4">
                    id
                </th>
                <th scope="col" class="px-6 py-4">
                    @lang('nav.audio_poems')
                </th>
                <th scope="col" class="px-6 py-4">
                    @lang('nav.name_of_poems')
                </th>
                <th scope="col" class="px-6 py-4">
                    {{__('nav.status')}}
                </th>
                <th scope="col" class="px-6 py-4">
                    @lang('nav.order')
                </th>
                <th scope="col" class="px-6 py-4">
                    {{__('nav.actions')}}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($audios as $audio)
            <tr class="bg-white border-b hover:bg-gray-50 ">
                <td class="px-6 py-4">
                    {{ $audio->id }}
                </td>
                <td  class="px-6 py-4 ">
                    <div data-audio-src="{{ $audio->getAudio() }}" class="p-1 text-white rounded-lg shadow-lg audio-player" >
                        <div class="flex flex-row items-center justify-between pl-1">
                                <div style="background-image:url({{asset('images/G_Ezizow3.jpeg')}})" class="flex items-center justify-center p-3 text-gray-800 bg-cover rounded-sm playPauseBtn hover:bg-green-600 focus:outline-none">
                                    <i class='playIcon bx bx-play-circle text-[28px] opacity-60'></i>
                                    <i class='pauseIcon hidden bx bx-pause text-[28px]'></i>
                                </div>
                            <div class="items-start flex-1 pl-4">
                                <p class="text-sm text-gray-400 text-nowrap">{{ $audio['name_'.app()->getLocale()] }}</p>
                                <div class="relative text-gray-400">
                                    <input type="range" min="0" max="100" value="0" class="w-full h-2 bg-gray-400 rounded-lg appearance-none cursor-pointer progressBar">
                                    <span class="currentTime">00:00</span> / <span class="duration">00:00</span> 
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    {{$audio["name_".app()->getLocale()]}}
                </td>
                <td class="px-6 py-4">
                    <form action="{{ route('audioPoem.active', ['audioPoem' => $audio->id])}}" 
                        method="post">
                        @csrf
                        @method('PUT')
                        <label class="relative inline-flex items-center cursor-pointer ">
                            <input type="checkbox" name="status" @if($audio->status) checked @endif class="sr-only peer">
                            <div class="relative w-11 h-6 bg-red-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <button type="submit" class="w-[45px] h-[25px] absolute top-0"></button>{{-- image activate and disactivate button --}}
                        </label>
                    </form>
                </td>

                <td class="px-6 py-4">
                    {{ $audio->order }}
                </td>
                
                <td class="px-6 py-3">
                    <div class="flex flex-row gap-1">
                        <a href="{{route('audioPoem.edit',['audioPoem' => $audio->id])}}">
                            <div>
                                <button type="submit" class="flex p-2.5 rounded-xl transition-all duration-300">
                                    <i class='bx bx-edit text-[24px]'></i>
                                </button>
                            </div>
                        </a>
                        <div>
                            @if(auth()->user()->is_admin == 1)
                                <form action="{{ route('audioPoem.delete', ['audioPoem' => $audio->id])}}" 
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex p-2.5 rounded-xl transition-all duration-300 text-red-600">
                                        <i class='text-[24px] bx bx-trash'></i>
                                    </button>
                                </form>
                            @endif
                        </div> 
                    </div>
                                       
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>


<script>
    const audioPlayersRunning = [];
    document.addEventListener("DOMContentLoaded", function() {
    const audioPlayers = document.querySelectorAll('.audio-player');

    audioPlayers.forEach(player => {
        const playPauseBtn = player.querySelector('.playPauseBtn');
        const playIcon = player.querySelector('.playIcon');
        const pauseIcon = player.querySelector('.pauseIcon');
        const progressBar = player.querySelector('.progressBar');
        const currentTimeElement = player.querySelector('.currentTime');
        const durationElement = player.querySelector('.duration');
        let audio = null;

        playPauseBtn.addEventListener('click', function() {
            if (!audio) {
                // Create a new Audio object and load the source
                const audioSrc = player.getAttribute('data-audio-src');
                audio = new Audio(audioSrc);
                audioPlayersRunning.push(audio);

                // Update the duration when metadata is loaded
                audio.addEventListener('loadedmetadata', function() {
                    durationElement.textContent = formatTime(audio.duration);
                    progressBar.max = Math.floor(audio.duration);
                });

                // Update the progress bar and current time while playing
                audio.addEventListener('timeupdate', function() {
                    progressBar.value = Math.floor(audio.currentTime);
                    currentTimeElement.textContent = formatTime(audio.currentTime);
                });

                // Reset icons when the audio ends
                audio.addEventListener('ended', function() {
                    playIcon.classList.remove('hidden');
                    pauseIcon.classList.add('hidden');
                });
            }

            // Toggle play/pause
            if (audio.paused) {
                // Pause all other audios before playing the new one
                audioPlayersRunning.forEach(otherAudio => {
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

        // Helper function to format time in mm:ss
            function formatTime(seconds) {
                const minutes = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${minutes}:${secs < 10 ? '0' : ''}${secs}`;
            }
        });
    });

</script>