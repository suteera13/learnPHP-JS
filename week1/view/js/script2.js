async function insert(){
    var modal = document.getElementById("myModal");
    modal.style.display = "none";

    url = "http://localhost/php65/week1/api/rest.php";
    const postData = {
        cus_name : document.getElementById("cus_name").value,
        address : document.getElementById("address").value,
        tel_no : document.getElementById("tel_no").value,
        cus_type : document.getElementById("cus_type").value
    };
    console.log(postData);
    try{
        const response = await fetch(url,{
            method: "post",
            headers: {"Content-Type":"application/text"},
            body: JSON.stringify(postData)
        });
        if(!response.ok){
            const message = "Error with status code : "+ response.status;
            throw new Error(message);
        }
        const data = await response.text();
        document.getElementById('div1').innerHTML = "<strong>"+data+"</strong>";
        console.log(data);
        console.log("Insert Success");
    }catch(error){
        console.log("Error : "+ error);
    }
}
async function exec_getall(){
    url = "http://localhost/php65/week1/api/rest.php";
    try{
        const response = await fetch(url, {
            method: "get",
            headers: {"Content-Type":"application/json"},
        });
        if(!response.ok){
            const message = "Error with status code : "+ response.status;
            throw new Error(message);
        }
        const data = await response.json();
        temp = "<table border='1'>";
        temp += "<tr>" +
                "<th>รหัสลูกค้า</th>" + "<th>ชื่อ-สกุล</th>" +
                "<th>ที่อยู่</th>" + "<th>เบอร์โทรศัพท์</th>" +
                "<th>ประเภทลูกค้า</th>" +
                "</tr>";
        data.forEach(Element=> {
            temp += "<tr>" +
                    "<td>" +Element["cus_id"] + "</td>"+
                    "<td>" +Element["cus_name"] + "</td>"+
                    "<td>" +Element["address"] + "</td>"+
                    "<td>" +Element["tel_no"] + "</td>"+
                    "<td>" +Element["cus_type"] + "</td>"+
                    "</tr>";
        });
        temp += "</table>";
        document.getElementById('div1').innerHTML = "<strong>"+data+"</strong>";
        console.log(data);
    }catch(error){
        console.log("Error:"+error);
    }
}