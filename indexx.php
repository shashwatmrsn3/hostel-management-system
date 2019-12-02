<table class="table">
        <th>
        <thead>
            <tr >
               <td scope = "col" ><b> Attributes</b></td>
                <td scope = "col"><b>Details</b></td>
            </tr>
        </thead></th>
        
        <tr>
            <td>First Name</td>
            <td><?php echo $row['fname'];?></td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td><?php echo $row['lname'];?></td>
        </tr>
        <tr>
            <td>Address Name</td>
            <td><?php echo $row['address'];?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo $row['gender'];?></td>
        </tr>
        <tr>
            <td> Email</td>
            <td><?php echo $row['email'];?></td>
        </tr>
        <tr>
            <td>Contact number</td>
            <td><?php echo $row['contact'];?></td>
        </tr>
        <tr>
            <td>Reason</td>
            <td><?php echo $row['reason'];?></td>
        </tr>
    </table>