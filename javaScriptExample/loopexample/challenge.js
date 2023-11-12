var students = [
    {
        name: 'Dave',
        track: 'Front End Development',
        achievement: 158,
        points: 14730
    },
    {
        name: 'Jody',
        track: 'iOS Development with Swift',
        achievement: 175,
        points: 16376

    },
    {
        name: 'Jordan',
        track: 'PHP Development',
        achievement: 55,
        points: 2025
    },
    {
        name: 'John',
        track: 'Learn WordPress',
        achievement: 66,
        points: 2030
    }
];
var message = '';
var student;

function print(measage) {
    var outputDiv = document.getElementById('output');
    outputDiv.innerHTML = message;
}
for (var i = 0; i < students.length; i += 1) {
    student = students[i];
    message += '<h2> Student: ' + student.name + '</h1>';
    message += '<p> Track: ' + student.track + '</p>';
    message += '<p> Points: ' + student.points + '</p>';
    message += '<p>Achievements: ' + student.achievement + '</P>';
}
print(message);