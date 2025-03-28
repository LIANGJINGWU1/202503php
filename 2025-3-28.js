function tijiao(event){
    event.preventDefault();
        let form = event.target;
        let formData = new FormData(form);
        console.log(formData.entries());
        let data = {}; 
        for(let [key,value] of formData.entries()){
            data[key] = value;
        }
        document.getElementById("shuchu").innerHTML = JSON.stringify(data);
}
//移除表单提交
// const form = document.getElementById("submit-event");
// form.addEventListener("submit",tijiao);
// function remove(){
//     form.removeEventListener("submit",tijiao);
//     alert("移除成功");
// }
// setTimeout(remove,3000);
let parent = document.getElementById("parent");
let child = document.getElementById("child");
parent.addEventListener("click",function(event){
    console.log("parent被点击了")
});
child.addEventListener("click",function(event){
    console.log("child被点击了")
    event.stopPropagation(); //阻止事件冒泡到父元素
});
//创建对象
let humen = {
    name:'小明',
    age:18,
    hello:function(){
        console.log(`hellow,my name is ${this.name})`);
    }
}
humen.hello();
console.log(humen.name);
class people {
    constructor(name,age){
        this.name = name;
        this.age = age;
    }
    hello(){
        console.log(`hellow,my name is ${this.name})`);
    }
}
class npc extends people{
    constructor(name,age){
        super(name,age);
        this.name = name;
        this.age = age;
    }
} 
let ren = new npc("小红",20);
ren.hello();
console.log(ren.name);
console.log(ren.age);
//异步
// let promise new Promise((resolve, reject) => {
//     setTimeout(() => {
//         resolve("成功了！")
//     }, 1000);
// });

// //捕获错误
// try {
//     let a = 1;
//     a = a + b;
// } catch(error) {
//     setTimeout(() =>console.error(error.message),2000) ;
// } finally {
    
//     console.log('finally');
// }
// function divide(a,b){
//     if(b==0) {
//         throw new Error('除数不能为0');
//     }
//     return a/b;
// }
// try {
//     console.log(divide(1,0));
// } catch(error) {
//     console.error(error.message);
// }
//dom操作,获取元素
let count2 = document.getElementById("count");
console.log(count2.textContent);
let count3 = document.getElementsByClassName("count");
console.log(count3[0].textContent);
let list = document.getElementsByTagName("li");
let list2 = document.getElementsByTagName('li')[1]
//3秒后第二个标签背景变绿
console.log(list2.textContent);
setTimeout(() => {
    list2.style.backgroundColor = "red";
}, 3000);
//查找遍历
let listquery = document.querySelectorAll(".list")
listquery.forEach(function(item){
    console.log(item.textContent)
});
let listquery1 = document.querySelectorAll(".list")[0] //这个对象是数组
listquery1.style.backgroundColor = "yellow";
let getelem = document.getElementById('getuser');
getelem.addEventListener("click",function(){




let wo = {
    username:"liang",email:"qq.com"
    
}
let userf = document.getElementById("get");

for(let key in wo){
    let cc = document.createElement("li")
    cc.textContent = key+":"+wo[key];
    userf.appendChild(cc);
    console.log(key+wo[key]);

}
});