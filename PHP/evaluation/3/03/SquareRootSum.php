

<table style="border: solid">
    <thead>
    <tr>
        <th> 
        Number
        </th>
        <th>
        Square
        </th>
      </tr>
    </thead>
    <tbody>
       <?php
       $total=0;
       for($i=1;$i<=100;$i++){ $i++;
       $rounded=round(sqrt($i),2);
       $total= $total+$rounded;
       
       ?>
         <tr >
           <td style="border: solid;"><?=$i?></td>
           
            <td style="border: solid;"><?=$rounded?></td>
             </tr>
             <?php }?>
             <tr style="border: solid;">
               <td>
                Total
               </td>
               <td>
               <?=$total ?>
               </td>
             </tr>
    </tbody>
</table>
<?php 



?>