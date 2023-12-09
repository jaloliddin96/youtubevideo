<?php
$apiKey = 'AIzaSyACkcXYzi2jnWuGvETy6Xd5l0yRVrRSQ-Y'; // O'zingizning YouTube API Key'ingizni qo'yib qo'ying
$channelId = 'UCGVteniSvklsKLmLZv2oDMA'; // Videolarni olishni istagan kanalingizning ID'sini qo'yib qo'ying

$apiUrl = "https://www.googleapis.com/youtube/v3/search?part=id&channelId={$channelId}&eventType=live&type=video&key={$apiKey}";

// API dan ma'lumotlarni olish
$response = file_get_contents($apiUrl);
$data = json_decode($response, true);

// Birinchi topilgan video ID sini qaytarish
if (isset($data['items'][0]['id']['videoId'])) {
    $videoId = $data['items'][0]['id']['videoId'];
    echo json_encode(['videoId' => $videoId]);
} else {
    echo json_encode(['error' => 'Video topilmadi']);
}
?>
