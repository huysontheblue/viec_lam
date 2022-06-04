<section id="content">
    <div class="container content">     
        <table id="dash-table" class="table table-hover">
            <thead>
                <th>Chức vụ</th>
                <th>Công ty</th>
                <th>Địa điểm</th>
                <th>Ngày đăng</th>
            </thead>
            <tbody>
            <?php
                if (isset($_GET['search'])) {
                    $COMPANYNAME = $_GET['search'];
                }   
                else {
                    $COMPANYNAME = '';
                }
                $sql = "SELECT * FROM `tblcompany` c,`tbljob` j WHERE c.`COMPANYID`=j.`COMPANYID` AND COMPANYNAME LIKE '%" . $COMPANYNAME ."%' ORDER BY DATEPOSTED DESC" ;
                $mydb->setQuery($sql);
                $cur = $mydb->loadResultList();
                foreach ($cur as $result) {
                    echo '<tr>';
                    echo '<td><a href="'.web_root.'index.php?q=viewjob&search='.$result->JOBID.'">'.$result->OCCUPATIONTITLE.'</a></td>';
                    echo '<td>'.$result->COMPANYNAME.'</td>';
                    echo '<td>'.$result->COMPANYADDRESS.'</td>';
                    echo '<td>'.date_format(date_create($result->DATEPOSTED),'d/m/Y').'</td>';
                    echo '</tr>';
                }
            ?> 
            </tbody>
        </table>
        <?php
        ?>  
    </div>
</section> 