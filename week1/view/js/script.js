async function exec(){
    data1 = document.getElementById("text1").value;
    data2 = document.getElementById("text2").value;
    url = "phpget.php?data1="+data1+"&data2="+data2;
    try{
        const response = await fetch(url,{
            method: "get",
            headers: {"Content-Type":"application/json"}
        },);
        if(!response.ok){
            const message = "Error with status code : "+ response.status;
            throw new Error(message);
        }
        const data = await response.json();
        document.getElementById('div1').innerHTML = "<strong>"+data+"</strong>";
        console.log(data);
    }catch(error){
        console.log("Error : "+error);
    }
}
async function exec_post(){
    url = "service.php";
    method = document.getElementById("opt").value;
    try{
        const response = await fetch(url,{
            method: method
        });
        const data = await response.json();
        document.getElementById('div1').innerHTML = "<strong>"+data+"</strong>";
        console.log(data);
    }catch(error){
        console.log("Error : "+ error);
    }
}