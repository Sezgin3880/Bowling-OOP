<?php

class ScoreBoard
{
    private $scores;
    private $extraPointsSpare = 5;
    private $extraPointsStrike = 10;

    public function __construct($players)
    {
        foreach ($players as $player) {
            $this->scores[$player] = 0;
        }
    }

    public function calculatePlayerScore($player, $score)
    {
        $totalScore = $score[0] + $score[1];
        if ($score[0] === 10) {
            $totalScore += $this->extraPointsStrike;
        } else {
            if ($score[0] + $score[1] === 10) {
                $totalScore += $this->extraPointsSpare;
            }
        }

        $this->scores[$player] += $totalScore;
    }

    public function displayEndScores()
    {
        $winner = null;
        $winnerPoints = max($this->scores);
        $playerNames = array_keys($this->scores);
        $otherPlayers = [];
        for ($i = 0; $i < count($this->scores); $i++) {
            $playerName = $playerNames[$i];
            $playerScore = $this->scores[$playerName];
            if ($playerScore === $winnerPoints) {
                $winner['name'] = $playerName;
                $winner['score'] = $playerScore;
            } else {
                $otherPlayers[] = [
                    'name' => $playerName,
                    'score' => $playerScore
                ];
            }
        }
        echo 'Winnaar aan het berekenen' . PHP_EOL;
        sleep(5);
        echo "{$winner['name']} heeft gewonnen met {$winner['score']} en is daarom heel blij!";
        echo PHP_EOL;
        echo PHP_EOL;
        echo "De scores van de andere spelers zijn:" . PHP_EOL;
        foreach ($otherPlayers as $otherPlayer) {
            echo "{$otherPlayer['name']} heeft {$otherPlayer['score']} punten en heeft daarbij verloren!" . PHP_EOL;
        }
    }
}