<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Incoming webhooks log</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container-fluid p-0 m-0">
    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Incoming webhooks log</h4>
        <p><a href="?clear_file=true">Clear requests log</a> | auto refresh at: <?php echo($_GET['refresh'] ?? '60'); ?>
            seconds
            (?refresh=INT will change this)</p>
    </div>

    <?php

    if ($_GET['clear_file']) {
        $fh = fopen('requests.log', 'w');
        fclose($fh);

        header("Location: show.php");
    } else {
        echo '<meta http-equiv="refresh" content="' . ($_GET['refresh'] ?? '60') . '">';
    }
    $file_lines = file('requests.log');

    $file_lines = array_reverse($file_lines);
    echo "<table class='table table-striped'>";
    echo "<tr><th>Time</th><th>HEADERS</th><th>GET</th><th>POST</th><th>RAW INPUT</th></tr>";
    foreach ($file_lines as $line) {
        $data = json_decode(trim($line));
        echo "<tr>";

        echo "<td>" . ($data->datetime ?? NULL) . "</td>";
        echo "<td><pre>";
        print_r($data->headers ?? []);
        print_r(['Remote IP: ' => $data->ip ?? NULL]);
        echo "</pre></td>";
        echo "<td><pre>";
        print_r($data->GET ?? []);
        echo "</pre></td>";

        echo "<td><pre>";
        print_r($data->POST ?? []);
        echo "</pre></td>";

        echo "<td><pre>";
        print_r($data->INPUT ?? []);
        echo "</pre></td>";

        echo "</tr>";
    }

    echo "</table>";
    ?>
</div>
</body>
</html>
