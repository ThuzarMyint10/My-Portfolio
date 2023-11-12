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
var search;

function print(measage) {
    var outputDiv = document.getElementById('output');
    outputDiv.innerHTML = message;
}

function studentReport (student) {
        var report = '<h2> Student: ' + student.name + '</h1>';
        report += '<p> Track: ' + student.track + '</p>';
        report += '<p> Points: ' + student.points + '</p>';
        report += '<p>Achievements: ' + student.achievement + '</P>';
        return report;
}



while (true) {
    search = prompt('Search student records: type a name [Jody] (or type "quit" to end');
    if (search === null || search.toLowerCase() === 'quit'){
        break;
    }
    for (var i = 0; i < students.length; i += 1) {
        student = students[i];
        if (student.name === search){
            message = studentReport( student);
            print(message)
        } 
        }
    }
