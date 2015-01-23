<?php

// A list of permitted file extensions
$allowed = array('mp3', 'm4a', 'pdf', 'zip', 'jpg', 'png');

if (isset($_FILES['upl']) && $_FILES['upl']['error'] == 0) {




    $extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

    if (!in_array(strtolower($extension), $allowed)) {
        echo '{"status":"error"}';
        exit;
    }

    if (move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/' . $_FILES['upl']['name'])) {
        echo '{"status":"success"}';


        $file = file_get_contents('testList.json', true);
        $data = json_decode($file, true);
        unset($file);

        $basename = pathinfo($_FILES['upl']['name'], PATHINFO_BASENAME);
        //$data[0]["name"] = $basename;


        $data[] = array('name' => $basename);

        $result = json_encode($data);
        file_put_contents('testList.json', $result);
        unset($result);

        echo "<script> $scope.updateJSON; </script>";


        exit;
    }
}

echo '{"status":"error"}';
exit;
