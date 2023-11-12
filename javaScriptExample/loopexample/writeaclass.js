class Pet {
    constructor ( animal, age, breed, sound) {
        this.animal = animal;
        this.age = age;
        this.breed = breed;
        this.sound = sound;
    }
    get activity() {
        const today = new Data();
        const hour = today.getHours();

        if (hour > 8 && hour <= 20){
            return 'playing';
        } else {
            return 'sleeping';
        }
    }
    get owner() {
        return this._owner;
    }
    set owner(owner){
        this._owner = owner ;
        console.log('setter called: ${owner}');
    }

    speak(){
        console.log(this.sound);
    }
}
class Owner {
    constructor(name, address){
        this.name = name;
        this.address = address;
    }
    set phone(phone){
        const phoneNormalized = phone.replace(/^0-9]/g,'');
        this._phone = phoneNormalized;
    }
    get phone(){
        return this._phone;
    }
}
const arnie = new Pet('dog', 1, 'pug','yip yip');
const vera = new Pet('dog', 8, 'border collie', 'woof woof');
// console.log(arnie);
// console.log(arnie);
arnie.owner = new Owner('Ashley', '23 Main Street');
arnie.owner.phone = '555 555 5555';
console.log(arnie.owner.name);
console.log(arnie.owner.phone);
// console.log(arnie.owner);