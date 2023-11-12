const square = x =>  x * x;

const cube = x => square(x) * x;

const multipy = (x,y) =>  x *y;

const add = (a,b) =>  a+b;

const subtract= (a,b) => a-b;

const name = "Andrew";
const sayName = () => {
    const message = "My name is " + name ;
    console.log(message);
}
const sayBye = () => {
    console.log("Bye " + naem);
}
