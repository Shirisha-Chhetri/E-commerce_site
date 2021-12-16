<!-- <div class="dropdown-content1">
                   <?php 
             $conn = new mysqli("localhost","root","","peachblossom");
             $sql = "SELECT * FROM category ORDER BY category_id ASC";
             $result = $conn->query($sql);

              if($result->num_rows>0){
              while($row=$result->fetch_assoc()){?>

              <a href="http://localhost/MIS%20site/product.php/?cat=<?php echo $row["CATEGORY_ID"]; ?>"><?php echo $row['CATEGORY_NAME'];?></a>
              <?php 
                  }
                } 
                ?>
                </div> -->