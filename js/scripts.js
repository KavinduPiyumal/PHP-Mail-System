//every 0.6s inbox view will update
setInterval(function(){  
          var ajax = new XMLHttpRequest();
          ajax.open("GET", "includes/index.php", true); //Send GET request to get data from includes/index.php  code.
          ajax.send();
    //The onreadystatechange function is called every time the readyState changes.
    //When readyState is 4 and status is 200, the response is ready
    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);//get json data and put data array
            console.log(data);
            
           
            var html = "";
            for(var a = 0; a <data.length; a++) {
                var fullname = data[a].j_mail_sender_fullname;
                var subject = data[a].j_mail_subject;
                var maildate = data[a].j_mail_date;
                var reciver = data[a].j_mail_id;
         
                //put data to table rows
                html += "<tr>";
                    html += "<td>" + fullname + "</td>";
                    html += "<td><a href='index.php?show=inbox&mailID=" + reciver +"'>" + subject + "</a></td>";
                    html += "<td>" + maildate + "</td>";
                html += "</tr>";
            }
           

                 document.getElementById("countinbox").innerHTML= "(" + data.length + ")"; //pass no of inbox messages to header by counting length of data array
                 document.getElementById("countinbox").style.visibility = "visible";;
                 document.getElementById("inboxdata").innerHTML= html;  //pas inbox messages to tbody of inbox.php file
          
           
        } 
};  },600);//every 0.6s inbox view will update