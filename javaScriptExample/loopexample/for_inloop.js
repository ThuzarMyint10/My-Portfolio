var person = {
    name: 'Sarah',
    country: 'US',
    age: 35,
    treehouseStudent: true,
    skills: ['JavScript', 'HTML', 'CSS']
}

for ( prop in person) {
    console.log(prop, ': ', person[prop]);
}