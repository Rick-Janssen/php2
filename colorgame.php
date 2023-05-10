<?php
session_start();
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
    <link rel="stylesheet" type="text/css" href="css\styleCSP.css">
    <title>colorgame</title>
 </head>
 <body>
<div class="area" >
    <ul class="circles">  
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
   <div id="parent">
      <div id="left">
      <h2>leaderboard</h2><br><br>
      <?php
        // $conn = mysqli_connect('rdbms.strato.de', 'dbu1035725', 'Stoeptegel3!3107', 'dbs10066227');
         $conn = mysqli_connect('localhost', 'root', '', 'php');
         if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
         }
         
         if (!empty($_POST['playerName'])) {
            $username = $_POST["playerName"];
            $finalscore = $_POST["finalscore"];
            $sql = "INSERT INTO scoreboard (username, score) VALUES ('$username', '$finalscore')";
            if ($conn->query($sql) === TRUE) {
            } else {
            }
         }
         $result = mysqli_query($conn, 'SELECT * FROM `scoreboard` ORDER BY `score`+0 DESC LIMIT 5');
         $collection = [];
         if (mysqli_num_rows($result) > 0) {
             while ($row = mysqli_fetch_assoc($result)) {
                 $collection[] = $row;
             }
         }
         $htmlTable = "<table>";
         $htmlTable .= "<tr><th style='padding: 5px'>Username</th><th style='padding: 5px'>Score</th></tr>";
         foreach ($collection as $value) {
             $htmlTable .= "<tr>
                 <td class='info' style='padding: 5px'>" . $value['username'] . "</td>" .
                 "<td class='info' style='padding: 5px'>" . $value['score'] . "</td>
             </tr>";
         }
         $htmlTable .= "</table>";
         echo $htmlTable;
         ?><br><hr>
                 <h3>submit your score</h3><br>
        <form action="" method="post">
            <label for="playerName">Enter your name:</label><br>
            <input type="text" id="playerName" name="playerName" value="player" min="1" max="10" required><br>
            <input type="hidden" id="finalscore"  name="finalscore" value="0">
            <button type="submit" value="leaderboard" name="leaderboard" onclick="changeFinalScore()">submit</button>
         </form>
      </div>
         <div id="left">
            <div><h2>settings</h2></div><br>
            <label for="timer">Timer Value:</label>
            <input type="range" min="0.5" max="5" step="0.5" value="2" onchange="updateTimer(this.value)"><br>
            <span id="timerValue">2 seconds</span><br><br>
            <label for="roundsSlider">Max Rounds:</label>
            <input type="range" id="roundsSlider" name="roundsSlider" min="3" max="25" value="10" onchange="updateMaxRoundsUnlimited()"><br>
            <span id="roundsValue">10</span>
            <label for="maxr">rounds</label><br>
            <input type="checkbox" id="maxRoundsUnlimitedCheckbox" name="maxRoundsUnlimitedCheckbox" onchange="updateMaxRoundsUnlimited()">
            <label for="maxRoundsUnlimitedCheckbox">Unlimited</label><br><br><br><br><br><br><br><br><br>
            <input type="checkbox" id="hardmode" name="hardmode">hardmode</input>
            <form action="index.php"><button type="submit">go back</button></form>
         </div>
         <div id="middle">
            <h1>colorgame</h1>
            <div class="container">
               <div onclick="check(0)" class="gamediv"id=gamediv0></div>
               <div onclick="check(1)" class="gamediv"id=gamediv1></div>
               <div onclick="check(2)" class="gamediv"id=gamediv2></div><br>
               <div onclick="check(3)" class="gamediv"id=gamediv3></div>
               <div onclick="check(4)" class="gamediv"id=gamediv4></div>
               <div onclick="check(5)" class="gamediv"id=gamediv5></div><br>
               <div onclick="check(6)" class="gamediv"id=gamediv6></div>
               <div onclick="check(7)" class="gamediv"id=gamediv7></div>
               <div onclick="check(8)" class="gamediv"id=gamediv8></div><br>
               <div class="gamediv extra"id=gamedivcolor></div>
               <button id="start-btn" onclick="start()">start</button>
               <button onclick="stop()">stop</button>
               <button onclick="reset()">reset</button>
            </div>
      </div>
      <div id="right">
      <div><h2>Score</h2></div><br><hr>

         <br><h3 id="ROM"></h3><br>
         <p>hit: <a id="raak">0</a></p>
         <p>mis: <a id="mis">0</a></p>
         <p>too late: <a id="telaat">0</a></p>
         <p>rounds: <a id="rondes">0</a></p><br><hr>

         <br><h2>eindscore</h2><br><br>
         <p>hit: <a id="finalraak">0</a></P>
         <P>mis: <a id="finalmis">0</a></P>
         <p>too late: <a id="finaltelaat">0</a></p>
         <p>rounds: <a id="finalrondes">0</a></P>
      </div>
      <div id="bottom">
         <h1>Rock Paper Scissors Game</h1>
         <button onclick="playGame('rock')">Rock</button>
         <button onclick="playGame('paper')">Paper</button>
         <button onclick="playGame('scissors')">Scissors</button>
         <div id="result"></div>
         <br>
      </div>
   </div>
</div>
      <script src="js/index.js"></script>
</body>
</html>