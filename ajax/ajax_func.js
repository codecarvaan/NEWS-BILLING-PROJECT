function showplan(str,id="txtHint",sno="") {//<select name="users" onchange="showUser(this.value)">
   console.log(str+id);
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(id).innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","/mamu/ajax/return.php?q="+str+"&id="+id+"&sno="+sno,true);
        xmlhttp.send();
       
    }
}
var count_field=0;
var rowids=[];
function add_field()
{
    count_field++;
    var row_len=document.getElementById("table_purchase").rows.length;
    var table = document.getElementById("table_purchase");
    var row = table.insertRow(row_len-1);
    console.log(row_len);
    var cell0 = row.insertCell(0);
    var cell1 = row.insertCell(1);
    var cell2= row.insertCell(2);                          // cell.colSpan = 2
    var cell3 = row.insertCell(3);
    var cell4 = row.insertCell(4);
    var temp=Math.random();
    rowids[count_field]=temp;
    row.id="row_"+(temp);
    cell0.innerHTML = row_len-3;
    cell1.innerHTML = date_today();
    cell3.innerHTML = showplan("new",row.id,row_len-3);
    cell4.innerHTML='';

}
function remove_field(id)
{
    
    var row = document.getElementById(id);
    row.parentNode.removeChild(row);

}


function date_today()
{

var today = new Date();
var dd = today.getDate();

var mm = today.getMonth()+1; 
var yyyy = today.getFullYear();
if(dd<10) 
{
    dd='0'+dd;
} 

if(mm<10) 
{
    mm='0'+mm;
} 
/*today = mm+'-'+dd+'-'+yyyy;
console.log(today);
today = mm+'/'+dd+'/'+yyyy;
console.log(today);
today = dd+'-'+mm+'-'+yyyy;
console.log(today);
today = dd+'/'+mm+'/'+yyyy;
console.log(today);
*/
return  dd+'/'+mm+'/'+yyyy;
}
function validateForm(){
var err=0;
console.log("working");
        var s=document.getElementsByName("item_code[]");
     var len = s.length;
     console.log(len);
     for(var i=0;i<len;i++)
     {
        console.log(s[i].value);
        if(s[i].value==-1)
            {
                
                s[i].style.backgroundColor = "#ef7a7a";
                err++;

            }
     }
         
           if(err==0)
           {
            return true;
           }  
           else{
            alert("Please Fill the form correctly! ");
            return false;
           }
}
function date_relative(id){
        var date_id1 = id.split("-");
        console.log(date_id1[0]);
        var date_id2=date_id1[0]+"-date2";
        var date1=document.getElementById(id);
        var date2=document.getElementById(date_id2);
         val_date1=date1.value;
          date2.min = val_date1;
  
}
function total_charge(){
        var qty=document.getElementById("qty").value;
        var net_charge=document.getElementById("net_charge");
        var add_on=document.getElementById("add_on");
        var extra_charge=document.getElementById("extra_charge").value;
        var add_charge=document.getElementById("add_charge").value;
        var sum=Number((Number(qty)*Number(add_charge))+Number(extra_charge));
        if(add_on.value=="rebate")
        {
            net_charge.value=-1*sum;
        }
        else{
            net_charge.value=sum;
        }
        if(add_on.value==-1)
        {
            add_on.style.backgroundColor = "#ef7a7a";
        }
        else{
             add_on.style.backgroundColor = "";
        }
        
        console.log(sum);
}
function change_dis(id,checkbox)
{
    
    if(checkbox.checked == true){
        document.getElementById("NAME_"+id).removeAttribute("disabled");
        document.getElementById("ITEMTYPE_"+id).removeAttribute("disabled");
        document.getElementById("EDITTYPE_"+id).removeAttribute("disabled");
        document.getElementById("EDITNAME_"+id).removeAttribute("disabled");
        document.getElementById("RATE_"+id).removeAttribute("disabled");
        document.getElementById("RATE1_"+id).removeAttribute("disabled");
        document.getElementById("RATE2_"+id).removeAttribute("disabled");
        document.getElementById("RATE3_"+id).removeAttribute("disabled");
        document.getElementById("RATE4_"+id).removeAttribute("disabled");
        document.getElementById("RATE5_"+id).removeAttribute("disabled");
        document.getElementById("RATE6_"+id).removeAttribute("disabled");
        document.getElementById("RATE7_"+id).removeAttribute("disabled");
        document.getElementById("PAGES_"+id).removeAttribute("disabled");
        document.getElementById("REMARK_"+id).removeAttribute("disabled");
        document.getElementById("MOBILE_"+id).removeAttribute("disabled");
        document.getElementById("EMAIL_"+id).removeAttribute("disabled");
         document.getElementById("hid_"+id).removeAttribute("disabled");
        document.getElementById("remove_"+id).removeAttribute("disabled");
        

    }else{
        document.getElementById("NAME_"+id).setAttribute("disabled", "disabled");
        document.getElementById("NAME_"+id).setAttribute("disabled", "disabled");
        document.getElementById("ITEMTYPE_"+id).setAttribute("disabled", "disabled");
        document.getElementById("EDITTYPE_"+id).setAttribute("disabled", "disabled");
        document.getElementById("EDITNAME_"+id).setAttribute("disabled", "disabled");
        document.getElementById("RATE_"+id).setAttribute("disabled", "disabled");
        document.getElementById("RATE1_"+id).setAttribute("disabled", "disabled");
        document.getElementById("RATE2_"+id).setAttribute("disabled", "disabled");
        document.getElementById("RATE3_"+id).setAttribute("disabled", "disabled");
        document.getElementById("RATE4_"+id).setAttribute("disabled", "disabled");
        document.getElementById("RATE5_"+id).setAttribute("disabled", "disabled");
        document.getElementById("RATE6_"+id).setAttribute("disabled", "disabled");
        document.getElementById("RATE7_"+id).setAttribute("disabled", "disabled");
        document.getElementById("PAGES_"+id).setAttribute("disabled", "disabled");
        document.getElementById("REMARK_"+id).setAttribute("disabled", "disabled");
        document.getElementById("MOBILE_"+id).setAttribute("disabled", "disabled");
        document.getElementById("EMAIL_"+id).setAttribute("disabled", "disabled");
        document.getElementById("hid_"+id).setAttribute("disabled", "disabled");
       document.getElementById("remove_"+id).setAttribute("disabled", "disabled");
   }
document.getElementById("update_but").removeAttribute("disabled");
    
}

/*    function printdiv(printdivname)
{
var headstr = "<html><head><link rel='stylesheet' href='assets/css/sample.css'><title>Booking Details</title></head><body>";
var footstr = "</body>";
var newstr = document.getElementById(printdivname).innerHTML;
var oldstr = document.body.innerHTML;
document.body.innerHTML = headstr+newstr+footstr;
window.print();
document.body.innerHTML = oldstr;
return false;
}
<link rel='stylesheet' href='assets/css/sample.css'><title>Booking Details</title></head><body>";
*/

