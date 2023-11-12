<?php
$player1 = 0;
$player2 = 5;
$round = 0;
//WIN 
//player must rreach a score of 11
//player must be minimum of 2 point higher than opponent
//NOT WINNER
while (abs($player1 - $player2) < 2 ||( $player1 < 11 && $player2 < 11)){
    //NOT WINNER
    //randomly increment on of player scores each round
    $round++;
    echo "<h2> Round $round </h2>\n";
    if (rand(0,1)) {
        $player1++;
    } else {
        $player2++;
    }
    echo "Player1 = $player1<br />\n";
    echo "Player2 = $player2<br />\n";
}
echo "<h1>";
if ($player1 > $player2){
    echo "Player1";
} else{
    echo "Player2";
}
echo "is the winner after $round rounds!</h1>";
?>