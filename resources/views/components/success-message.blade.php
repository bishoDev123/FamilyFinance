@if(session('success'))
    <div
        id="flash-message"
        class="mb-4 overflow-hidden rounded bg-green-100 px-4 py-2 text-green-800 transition-all duration-300"
    >
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            const flash = document.getElementById('flash-message');

            if (flash) {
                flash.style.opacity = '0';
                flash.style.height = '0';
                flash.style.margin = '0';
                flash.style.paddingTop = '0';
                flash.style.paddingBottom = '0';

                setTimeout(() => flash.remove(), 300);
            }
        }, 3000); // Hide after 3 seconds
    </script>
@endif
