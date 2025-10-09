<button type="button"  id = "logout" class = "me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Ticket
</button>

<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modalEdit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-muted" id="exampleModalLabel">Ticket</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mt-3">
                        <div class="row mb-2">
                            <div class="col">
                                <table class = "table">
                                    <thead>
                                        <tr>
                                        <th scope="col">Number</th>
                                        <th scope="col">Movie Name</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">duration</th>
                                        <th scope="col">Pirce</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $db2 = new db();
                                    $userid = $_SESSION['userid'];
                                    $db2->select("payment,movie","*","user_id = '$userid' AND movie.movie_id = payment.movie_id");
                                    $i = 0;
                                    while($ticket = $db2->query->fetch_object()){
                                        $i++
                                    ?>
                                        <tbody>
                                            <tr>
                                            <th scope="row"><?= $i ?></th>
                                            <td><?= $ticket->movie_name ?></td>
                                            <td><?= $ticket->date ?></td>
                                            <td><?= $ticket->duration ?></td>
                                            <td><?= $ticket->price ?> ฿</td>
                                            </tr>
                                        </tbody>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="eid" value="">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>