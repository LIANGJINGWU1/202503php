// function a1(Arr){
//     // const container=document.getElementById('a1');
//    const container = document.getElementById("arrayContainer");
//     let htmlContent = "<ul>";

//     arr.forEach(item => {
//         htmlContent += `<li>${item}</li>`;
//     });

//     htmlContent += "</ul>";
//     container.innerHTML = htmlContent; 

// for(i=0;i<car.lengty;i++)
// {+
//     Document.write(car[i]+"<br>");
// }

// }
// var i = 0;
// var car=new Array();
// car[0] = '1';
// car[1] = '2';
// car[2] = '3';
// a1();
// 声明一个函数来展示数组
function displayArray(arr) {
    const container = document.getElementById("arrayContainer");
    let htmlContent = "<ul>";  

    for (let i = 0; i < arr.length; i++) {
        htmlContent += `<li>${arr[i]}</li>`;
    }

    htmlContent += "</ul>";
    container.innerHTML = htmlContent;
}

const fruits = ["🍎 苹果", "🍌 香蕉", "🍇 葡萄", "🍓 草莓", "🍑 桃子"];
displayArray(fruits);

var user = "John";
let age = 25;
var user2 = "中国人";
const pi =3.14;
let a = true;
let b = false;
let c= null;
let d = undefined;
let e = {name: "John", age: 25};
console.log(e)
let f = [1, 2, 3, 4, 5];
// console.log(f);
// console.log(typeof user);
// console.log(typeof age);
// console.log(typeof user2);
// console.log(typeof pi);
// console.log(typeof a);
// console.log(typeof b);
// console.log(typeof c);
// console.log(typeof d);
// console.log(typeof e);
// let g = 5;
// let h = 3;
// console.log(g+h);
// console.log(g-h);
// console.log(g*h);
// console.log(g/h);
// console.log(g%h);
// console.log(g**h);
// console.log(g++);
// console.log(g--);
// console.log(++g);
// console.log(--g);
let a1="80";
let a2=90;
let a3=80;
// console.log(a1==a2);
// console.log(a1>a3);
// console.log(a1<a2);
// console.log(a1!=a2);
// console.log(a1===a3);
// console.log(a1!=a3)//!= 是非严格不等运算符，它会自动进行类型转换后再比较值。
// console.log(a1!==a3);
let b1 = true;
let b2 = false;
console.log(b1 && b2);
console.log(b1 || b2);
console.log(!b1);
let sanyuan = true;
let result = sanyuan ? "姬你好美" : "姬你不美";
console.log(result);
let nedann = 1;
switch(nedann) {
    case 1:
        console.log("你好");
        break;
    case 2:
        console.log("你不好");
        break;
    default:
        console.log("好你嘛");
}


