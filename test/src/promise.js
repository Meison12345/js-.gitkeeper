export function test(){
    return new Promise((resolve, rejects)=>{
       setTimeout(() => {
        resolve("Ура");
       }, 1);
    }).then(function(res) {
        console.log(res);
    })
};