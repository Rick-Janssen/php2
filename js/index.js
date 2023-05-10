
var raak = 0;
var mis = 0;
var rondes = 0;
var telaat = 0;
let timer = 2000;
let maxRounds = 10;
document.getElementById("ROM").innerHTML = "START GAME";

function updateTimer(value) {
  timer = value * 1000;
  document.getElementById("timerValue").textContent = value + " seconds";
}

function updateMaxRoundsUnlimited() {
  const checkbox = document.getElementById("maxRoundsUnlimitedCheckbox");
  maxRounds = checkbox.checked ? Infinity : document.getElementById("roundsSlider").value;
  document.getElementById("roundsValue").textContent = checkbox.checked ? "∞" : maxRounds;
  document.getElementById("roundsSlider").disabled = checkbox.checked;
}

function start(){
myVar = setInterval(myTimer, timer);
document.getElementById("ROM").innerHTML = "STARTING SOON";
document.getElementById("gamedivcolor").innerHTML = "";
}

function myTimer(){
  telaat = rondes - (raak + mis);
  document.getElementById("telaat").innerHTML = telaat;
  rondes += 1;
  document.getElementById("rondes").innerHTML = rondes;
  document.getElementById("ROM").innerHTML = "GAME STARTED";
  var randomcolor = ['red', 'lightblue', 'lime','blue','yellow','purple','darkgreen','orange','pink'];
  randomize(randomcolor);
  console.log(randomcolor);
   let i;
   for (i = 0; i <= 8; i=i + 1) {
      console.log("de teller=" + i)
      console.log(" de kleur=" + randomcolor[i])
      document.getElementById("gamediv"+i).style.backgroundColor = randomcolor[i];
   }
   var aColor = ['red', 'lightblue', 'lime','blue','yellow','purple','darkgreen','orange','pink'];
   var aColor = aColor[Math.floor(
    Math.random() * aColor.length)];
   var x = document.getElementById('gamedivcolor');
   x.style.backgroundColor  = aColor;
      gameover();
}

function check(index) {
  if (!myVar) {
    return; // do nothing if timer not active
  }
  if (document.getElementById("gamedivcolor").style.backgroundColor == document.getElementById("gamediv" + index).style.backgroundColor) {
    raak += 1;
    document.getElementById("raak").innerHTML = raak;
  } else {
    mis += 1;
    document.getElementById("mis").innerHTML = mis;
    gameover();
  }
  telaat = rondes - (raak + mis);
  document.getElementById("telaat").innerHTML = telaat;
  gameover();
}

function randomize(values) {
  let index = values.length,
    randomIndex;
  while (index != 0) {
    randomIndex = Math.floor(Math.random() * index);
    index--;
    [values[index], values[randomIndex]] = [values[randomIndex], values[index]];
  }
}

function gameover() {
  if (rondes > maxRounds || telaat + mis > 2) {
    clearInterval(myVar);
    stop();
    for (let i = 0; i <= 8; i++) {
      document.getElementById(`gamediv${i}`).style.backgroundColor = "darkred";
    }
    document.getElementById("gamedivcolor").style.backgroundColor = "";
    document.getElementById("gamedivcolor").innerHTML = "GAME OVER";
  }
}

function changeFinalScore() {
  const finalscoreInput = document.getElementById("finalscore");
  finalscoreInput.value = finalraak;
}

function stop(){
  setTimeout(Myreset, 5000);
  clearInterval(myVar);
  finalraak = raak;
  document.getElementById("finalraak").innerHTML = finalraak;
  finalmis = mis;
  document.getElementById("finalmis").innerHTML = finalmis;
  finalrondes = rondes;
  document.getElementById("finalrondes").innerHTML = finalrondes;
  finaltelaat = telaat;
  document.getElementById("finaltelaat").innerHTML = finaltelaat;
  document.getElementById("ROM").innerHTML = "GAME OVER";
  if (document.getElementById("maxRoundsUnlimitedCheckbox").checked) {
    maxRounds = Infinity;
  } else {
    maxRounds = document.getElementById("roundsSlider").value;
  }
  if(finalraak > 999){
    document.getElementById("finalraak").innerHTML ='999+';
    
  }
}

function Myreset(){
  reset();
}

function reset() {
  raak = 0;
  mis = 0;
  rondes = 0;
  telaat = 0;
  document.getElementById("raak").innerHTML = raak;
  document.getElementById("mis").innerHTML = mis;
  document.getElementById("rondes").innerHTML = rondes;
  document.getElementById("telaat").innerHTML = telaat;
  document.getElementById("ROM").innerHTML = "START GAME";
  for (let i = 0; i <= 8; i++) {
    document.getElementById(`gamediv${i}`).style.backgroundColor = "";
  }
  document.getElementById("gamedivcolor").style.backgroundColor = "";
  document.getElementById("gamedivcolor").innerHTML = "";
  clearInterval(myVar)
}

var choices = ['scissors', 'rock', 'paper'];

function playGame(playerChoice) {
  const computerChoice = choices[Math.floor(Math.random() * choices.length)];
  
  let result;
  if (playerChoice === computerChoice) {
    result = "Tie!";
  } else if (
    (playerChoice === "rock" && computerChoice === "scissors") ||
    (playerChoice === "paper" && computerChoice === "rock") ||
    (playerChoice === "scissors" && computerChoice === "paper")
  ) {
    result = "You win!";
  } else {
    result = "Computer wins!";
  }

  const resultDisplay = document.getElementById("result");
  resultDisplay.innerHTML = `You chose ${playerChoice}, computer chose ${computerChoice}. ${result}`;
}