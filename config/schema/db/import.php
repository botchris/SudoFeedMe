<?php
    $json = json_decode(file_get_contents('./datasource.geojson'), true);
    $conn = new mysqli('localhost', 'root', '', 'bicis');

    foreach ($json['features'] as $track) {
        $shape = json_encode($track['geometry']['coordinates']);
        $sql = "INSERT INTO tracks (track_type, ccarril, shape) VALUES(
            '{$track['properties']['CARRILBICI']}',
            {$track['properties']['CCARRIL']},
            '{$shape}'
        )";
        //$conn->query($sql);
    }
