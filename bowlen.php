<?php
require_once('ScoreBoard.php');
require_once('BowlingGame.php');
$Bowlinggame = (new BowlingGame())->play();
?>