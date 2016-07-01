<?php
$config = json_decode(file_get_contents('./config.json'));
?>
<!DOCTYPE html>
<html>
<head>
    <title>American dad! CZ fansite</title>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="media/css/style.css">
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/font-awesome.css">
    <script type="text/javascript" src="vendor/components/jquery/jquery.js"></script>
</head>

<body style="background-color: #dcdbe1">

<div class="container">
    <!-- NAVIGACE -->
    <div class="row">
        <div class="col-md-12" id="Header">
            <nav class="navbar">
                <a class="navbar-brand" href="http://americandad.wz.cz">
                    <img class="brand" src="media/img/flag.png">
                </a>
                <a class="navbar-brand pageName" href="http://americandad.wz.cz">
                    American Dad! CZ fansite
                </a>
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn btn-secondary archivLink" href="#"><strong>ARCHIV TITULKŮ</strong></a>
                    </li>
                    <li class="nav-item countDown" style="float: right">
                        <strong>
                            S13E01 : ??????
                        </strong>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="row">
        <!-- LEFT COLUMN -->
        <div class="col-md-8 leftColumn">
            <div class="row">
                <div class="col-md-12" id="Current">
                    <div class="row progressHolder">
                        <div class="col-md-1">
                            <?php
                                if ($config->episodes[0]->cz === true) {
                                    echo '<a href="subsdownload.php"><img src="media/img/cz.png"></a>';
                                } else {
                                    echo '<i class="fa fa-cog fa-spin fa-2x"></i>';
                                }
                            ?>
                        </div>
                        <div class="col-md-9">
                            <progress class="progress progress-danger progress-striped"
                              value="<?php echo $config->episodes[0]->progress ?>" max="100">
                            </progress>
                        </div>
                        <div class="col-md-2">
                            <div class="release">
                                <strong>
                                    <?php
                                        echo 'S'.$config->episodes[0]->season.
                                             'E'.$config->episodes[0]->episode.
                                             ' ('.$config->episodes[0]->release.')'
                                    ?>
                                </strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" id="Content">
                    <div class="row">
                        <div class="card-deck-wrapper">
                            <?php
                            $i = 0;
                            $closeCardDeck = false;
                            $deckClosed = false;
                            foreach ($config->episodes as $singleEpisode) {
                                $deckClosed = false;
                                if ($i % 3 === 0) {
                                    echo '<div class="card-deck">';
                                }
                                if ($i % 3 === 2) {
                                    $closeCardDeck = true;
                                }
                                echo '<div class="card">';
                                echo    '<div class="card-header" style="background-color: #D60000; border-bottom: none">'.
                                    '<strong>S'.$singleEpisode->season.'E'.$singleEpisode->episode.' - '.$singleEpisode->name.
                                    '</strong>'.
                                    '</div>';
                                echo    '<div class="card-block">';
                                echo        '<p class="card-text">'.$singleEpisode->article.'</p>';
                                echo        '<p class="card-text"><small class="text-muted date">';
                                echo        $singleEpisode->release.'<br>';
                                echo        $singleEpisode->date;
                                echo        '</small></p>';
                                echo    '</div>';
                                echo '</div>';
                                if ($closeCardDeck === true) {
                                    // konec card-decku
                                    echo '</div>';
                                    $deckClosed = true;
                                }
                                $i++;
                                $closeCardDeck = false;
                            }

                            if ($deckClosed !== true) {
                                echo '</div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-md-2 col-md-offset-1 rightColumn">
            <table class="subsList">
            <?php
                $season = $config->episodes[0]->season;
                $episode = $config->episodes[0]->episode - 1;

                for (; $episode > 0; $episode--) {
                    if ($episode < 10) {
                        $episode = '0'.$episode;
                    }
                    echo(
                        '<tr>'.
                            '<td><strong>S'.$season.'E'.$episode.'</strong></td>'.
                            '<td>'.
                                '<a href="#"><img class="flagLink" src="/media/img/cz.png"></a>'.
                            '</td>'.
                            '<td>'.
                                '<a href="#"><img class="flagLink" src="/media/img/gb.png"></a>'.
                            '</td>'.
                        '</tr>'
                    );
                }
            ?>
            </table>
            <div class="dbLink">
                <img src="media/img/csfd.png">
            </div>
            <div class="dbLink">
                <img src="media/img/imdb.png">
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-12">
            <footer>
                <div class="designedBy">
                    <strong>Designed by Lukane</strong>
                </div>
            </footer>
        </div>

    </div>
</div>
</body>

</html>
