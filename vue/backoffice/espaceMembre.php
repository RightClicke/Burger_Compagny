
<div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Orders</h2>
                        <a href="#" class="btn">View All</a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Nom</td>
                                <td>Prix</td>
                                <td>Description</td>
                                <td>Status</td>
                            </tr>
                        </thead>

                       <tbody>
                       <?php

                        include('../../traitement/fonction.php');

                         $bddArray=obtentionDonee($bdd);

                            if($bddArray != null){
                                    foreach($bddArray as $data){
                                        echo "<tr> 
                                            <td>$data[nom]</td>
                                            <td>$data[prix]</td>
                                            <td> $data[description]</td>
                                            <td><span class='status delivered'>$data[dispo]</span></td>
                                        </tr>";
                                    }
                            }

                            ?>

                        </tbody>
                    </table>
                </div>
            </div>