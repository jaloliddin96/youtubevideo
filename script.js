document.addEventListener('DOMContentLoaded', function () {
    updateVideoId();
    setInterval(updateVideoId, 60000);

    function updateVideoId() {
        fetch('get_video_id.php')
            .then(response => response.json())
            .then(data => {
                const iframe = document.getElementById('livestream');
                iframe.src = `https://www.youtube.com/embed/${data.videoId}`;
            })
            .catch(error => console.error('Error:', error));
    }
});
