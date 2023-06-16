var timePicker1 = document.getElementById('myTime-1')
var timePicker = document.getElementById('myTime');
var timePicker3 = document.getElementById('myTime-3')
var timePicker4 = document.getElementById('myTime-4');
function onTimeChange1() {
  var timeSplit = timePicker1.value.split(':'),
    hours,
    minutes,
    meridian;
  hours = timeSplit[0];
  minutes = timeSplit[1];
  if (hours > 12) {
    meridian = 'PM';
    hours -= 12;
  } else if (hours < 12) {
    meridian = 'AM';
    if (hours == 0) {
      hours = 12;
    }
  } else {
    meridian = 'PM';
  }
 
 
  document.getElementById('displayTime-1').innerHTML = (hours + ':' + minutes + ' ' + meridian);
}
function onTimeChange() {
  var timeSplit = timePicker.value.split(':'),
    hours,
    minutes,
    meridian;
  hours = timeSplit[0];
  minutes = timeSplit[1];
  if (hours > 12) {
    meridian = 'PM';
    hours -= 12;
  } else if (hours < 12) {
    meridian = 'AM';
    if (hours == 0) {
      hours = 12;
    }
  } else {
    meridian = 'PM';
  }
        document.getElementById('displayTime').innerHTML = (hours + ':' + minutes + ' ' + meridian);
}

function onTimeChange3() {
  var timeSplit = timePicker3.value.split(':'),
    hours,
    minutes,
    meridian;
  hours = timeSplit[0];
  minutes = timeSplit[1];
  if (hours > 12) {
    meridian = 'PM';
    hours -= 12;
  } else if (hours < 12) {
    meridian = 'AM';
    if (hours == 0) {
      hours = 12;
    }
  } else {
    meridian = 'PM';
  }
 
 
  document.getElementById('displayTime-3').innerHTML = (hours + ':' + minutes + ' ' + meridian);
}
function onTimeChange4() {
  var timeSplit = timePicker4.value.split(':'),
    hours,
    minutes,
    meridian;
  hours = timeSplit[0];
  minutes = timeSplit[1];
  if (hours > 12) {
    meridian = 'PM';
    hours -= 12;
  } else if (hours < 12) {
    meridian = 'AM';
    if (hours == 0) {
      hours = 12;
    }
  } else {
    meridian = 'PM';
  }
        document.getElementById('displayTime-4').innerHTML = (hours + ':' + minutes + ' ' + meridian);
}