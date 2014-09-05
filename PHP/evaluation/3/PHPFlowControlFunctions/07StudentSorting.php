<!DOCTYPE html>
<html>
<head>
    <title>StudentSorting</title>
    <style>
    body{
        margin:0;
        padding: 0;
    }
    
    #wrapper{
        width:100%;
    }
        .labelform{
            background-color: #D9D9D9;
            height:25px;
            width:100%;
            text-align:center;
            font-size: 18px;
       }
        form {
            width:80%;
            border:1px solid black;
            margin:0 auto;
        }
        form table{
            border:1px solid gray;
            width:96%;
            margin:10px auto;
            border-collapse: collapse;
            
        }
        table thead {
            margin:10px auto;
            height:20px;
           
        }
        tr#bb {
            border-bottom: 3px solid black;
            margin-bottom: 5px;
        }
        table thead tr th{
            text-align:left;
        }
        table tbody tr td{
            border:1px solid gray;
            margin-right: 5px;
            height:30px;
        }
        
        input[type='button']{
            width:30px;
            height:27px;
            background-color: #234465;
            color:white;
            margin-left: 20px;
            text-align:center;
        }
        input[type='submit']{
            width:150px;
            height:27px;
            background-color: #234465;
            color:white; 
        }
        input[type='text'],input[type='number']{
           width=20%;
            height:27px;
           border:1px solid gray;
           margin:10px;
           padding-left: 10px;
           
        }
        #wrapResult{
            width:100%;
            
        }
        #result{
            width:80%;
            border:1px solid black;
            margin:10px auto;
            
        }
        #restable{
            width:60%;
            border:1;
            margin:0 auto;
        }
        #restable thead{
            background-color:#1E90FF;
        }
        #restable th{
             text-align:center;
        }
        #restable td{
             text-align:left;
             padding-left: 5px;
        }
    </style>
    
  <script>

        var nextId=0;
        function addRrecord()  {
            var newInput=document.createElement("tr");
            newInput.setAttribute('id',"rec" + nextId);
            newInput.innerHTML='<td> <input type="text" name="firstNames[]"></td>' + 
                                 '<td> <input type="text" name="secondNames[]"></td>' + 
                                 '<td> <input type="text" name="emails[]"></td>' +
                                '<td> <input type="number" name="scores[]">' + 
                                '<input type="button" name="remrec" id="rem" value="-" onclick="removeRrecord('+nextId +')"/></td>';
            nextId++;
            document.getElementById('records').appendChild(newInput);
         
        }
        function removeRrecord(id){
             var curRec=document.getElementById("rec" + id);
             document.getElementById('records').removeChild(curRec);    
        }
</script>
 </head>
 <body>
     <div id=wrapper>
        <form action="" method="post">
            <div class="labelform">Form</div>
            <table>
                <thead>
                    <tr id="bb">
                        <th>First name:</th>
                        <th>Second name:</th>
                        <th>Email:</th>
                        <th>Exam score:</th>
                    </tr>
                </thead>
                <tbody id="records">
                               
                </tbody>
            </table>
     
            <input type="button" name="addrec" id="add" value="+" onclick="addRrecord()"/>
            <label for="sortby">Sort by:</label>
            <select name="sortby" id="sortby"  requared >
                <option value="fn" selected>First name</option>
                <option value="sn">Second name</option>
                <option value="em">Email</option>
                <option value="sc">Exam score</option>
           </select>
            <label for="order">Order:</label>
            <select name="order" id="order"  requared >
                <option value="asc" selected >Ascending</option>
                <option value="des">Descending</option>
            </select>
            
            <input type="submit" value="Submit" />
</form>
</div>
</body>
</html>
<?php

if(isset($_POST['firstNames']) && isset($_POST['secondNames']) && isset($_POST['emails']) &&
    isset($_POST['scores']) && isset($_POST['sortby']) && isset($_POST['order'])) {
       $fname=$_POST['firstNames'];
       $sname=$_POST['secondNames'];
       $emarr=$_POST['emails'];
       $scrarr=$_POST['scores'];
        function aasort (&$array, $key, $order) {
            $sorter=array();
            $ret=array();
            reset($array);
            
            foreach ($array as $ii => $va) {
                $sorter[$ii]=$va[$key];
            }
            if($order==='asc')
                 asort($sorter);
            else
                arsort($sorter);
            foreach ($sorter as $ii => $va) {
                $ret[$ii]=$array[$ii];
        }
        $array=$ret;
    }
    $students=[];
    for($i=0; $i < count($_POST['firstNames']); $i++)
    {
        $students[$i]['fn'] =$fname[$i];
        $students[$i]['sn'] =$sname[$i];  
        $students[$i]['em'] = $emarr[$i];
        $students[$i]['sc']=$scrarr[$i];
    }
    $key=$_POST['sortby'];
    $order=$_POST['order'];
    
     
   aasort($students,$key,$order);
    $result='<div id="wrapResult"><div id="result"><div class="labelform">Result</div><table id="restable"><thead >
                    <tr><th>First name</th><th>Second name</th><th>Email</th><th>Exam score</th>
                    </tr></thead><tbody>';
    foreach ($students as $student) {
        $result .= "<tr><td>". $student['fn'] ."</td>";
        $result .= "<td>". $student['sn'] ."</td>";
        $result .= "<td>". $student['em'] ."</td>";
        $result .= "<td>". $student['sc'] ."</td></tr>";
   
    }
   
    $average = number_format(array_sum($_POST['scores']) / count($_POST['scores']), 0);
    $result.= '<tr><td colspan="3" style="font-weight: bold">Average score:</td><td>' .
                    $average. '</td></tr>';
    $result .= '</tbody></table></div></div>';
    echo $result;
    }                          
   ?>