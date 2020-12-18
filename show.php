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
<div class="container-fluid">
    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Incoming webhooks log</h4>
        <p><a href="?clear_file=true">Clear requests log</a> | auto refresh at: <?php echo($_GET['refresh'] ?? '60'); ?>
            seconds
            (?refresh=INT will change this)</p>
    </div>
    <div class='card'>
        <div class="row">

            <div class="col-2">Time</div>
            <div class="col-2">Data</div>

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

        foreach ($file_lines as $index => $line) {
            $data = json_decode(trim($line));
            ?>
            <div class="row">
                <div class="col-2"><?php echo $data->datetime; ?></div>
                <div class="col-10">
                    <div id="accordion<?php echo $index; ?>">
                        <div class="card">
                            <div class="card-header" id="heading<?php echo $index; ?>">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse"
                                            data-target="#collapse<?php echo $index; ?>" aria-expanded="true"
                                            aria-controls="collapse<?php echo $index; ?>">
                                        Collapsible Group Item #1.<?php echo $index; ?>
                                    </button>
                                </h5>
                            </div>

                            <div id="collapse<?php echo $index; ?>" class="collapse show"
                                 aria-labelledby="heading<?php echo $index; ?>"
                                 data-parent="#accordion<?php echo $index; ?>">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                    ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="heading2<?php echo $index; ?>">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapse2<?php echo $index; ?>">
                                        Collapsible Group Item #2.<?php echo $index; ?>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="heading2<?php echo $index; ?>"
                                 data-parent="#accordion<?php echo $index; ?>">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                    ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree<?php echo $index; ?>">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                            data-target="#collapseThree" aria-expanded="false"
                                            aria-controls="collapseThree<?php echo $index; ?>">
                                        Collapsible Group Item #3.<?php echo $index; ?>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree<?php echo $index; ?>"
                                 data-parent="#accordion<?php echo $index; ?>">
                                <div class="card-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                    richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor
                                    brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt
                                    aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
                                    Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente
                                    ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                                    farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

        ?>
    </div>
</div>
</div>
</body>
</html>
