{{-- Modal Preview Image --}}
<div class="fixed top-0 left-0 z-30 hidden justify-center items-center w-screen h-screen bg-[#000000e6]"
    id="modal-preview-image">
    <div onclick="closeModalPreview()" class="fixed z-40 right-2 top-2">
        <img class="w-10 md:w-14 lg:w-12" src="{{ asset('assets/icons/x-white.png') }}">
    </div>
    <img class="w-full h-auto md:w-1/2" id="modalImage">
    <div class="fixed z-40 flex justify-center w-screen bottom-2 md:bottom-4 lg:bottom-2">
        <div class="flex justify-center w-1/3 gap-4 bg-white rounded-md md:w-1/4 lg:w-[15%] md:py-2 md:gap-6 lg:py-1">
            <img class="md:w-8 lg:w-9" onclick="zoomIn()" src="{{ asset('assets/icons/zoomIn.svg') }}">
            <img class="md:w-8 lg:w-9" onclick="zoomOut()" src="{{ asset('assets/icons/zoomOut.svg') }}">
        </div>
    </div>
</div>

@push('script')
<script>
    let currentScale = 1;
    let isDragging = false;
    let startCoords = { x: 0, y: 0 };
    let currentCoords = { x: 0, y: 0 };

    function openModalPreview() {
        const modalPreviewImage = document.getElementById("modal-preview-image");
        const modalImage = document.getElementById("modalImage");
        const clickedImage = event.currentTarget;

        modalPreviewImage.classList.add('flex');
        modalPreviewImage.classList.remove('hidden');

        modalImage.src = clickedImage.src;

        currentScale = 1;
        updateScale();
    }

    function closeModalPreview() {
        const modalPreviewImage = document.getElementById("modal-preview-image");
        modalPreviewImage.classList.remove('flex');
        modalPreviewImage.classList.add('hidden');
    }

    function updateScale() {
        const modalImage = document.getElementById("modalImage");
        modalImage.style.transform = `scale(${currentScale})`;
    }

    function updateTransform() {
        const modalImage = document.getElementById('modalImage');
        modalImage.style.transform = `scale(${currentScale}) translate(${currentCoords.x}px, ${currentCoords.y}px)`;
    }

    function zoomIn(){
        currentScale += 0.1;
        updateScale();
        updateTransform();
    }

    function zoomOut(){
        currentScale -= 0.1;
        updateScale();
        updateTransform();
    }

    function handleMouseDown(event) {
        isDragging = true;
        startCoords = { x: event.clientX, y: event.clientY };
    }

    function handleMouseMove(event) {
        if (!isDragging) return;

        const deltaX = event.clientX - startCoords.x;
        const deltaY = event.clientY - startCoords.y;

        currentCoords = { x: currentCoords.x + deltaX, y: currentCoords.y + deltaY };
        startCoords = { x: event.clientX, y: event.clientY };

        updateTransform();
    }

    function handleMouseUp() {
        isDragging = false;
    }

    function detectDeviceType() {
        const screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

        if (screenWidth > 1024) {
            return 'Desktop';
        } else if (screenWidth > 600) {
            return 'Tablet';
        } else {
            return 'Phone';
        }
    }

    // Add event listeners for dragging
    document.getElementById('modalImage').addEventListener('mousedown', handleMouseDown);
    document.getElementById('modalImage').addEventListener('mousemove', handleMouseMove);
    document.getElementById('modalImage').addEventListener('mouseup', handleMouseUp);

    if (detectDeviceType() === "Phone" || detectDeviceType() === "Tablet") {
        document.getElementById('modal-preview-image').addEventListener('touchstart', handleTouchStart);
        document.getElementById('modal-preview-image').addEventListener('touchmove', handleTouchMove);
        document.getElementById('modal-preview-image').addEventListener('touchend', handleTouchEnd);
    }


    // Disable default image dragging behavior
    document.getElementById('modalImage').addEventListener('dragstart', function (event) {
         event.preventDefault();
    });


</script>
@endpush