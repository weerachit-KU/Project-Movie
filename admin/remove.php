<button type="button"  id = "bremove" data-bs-toggle="modal" data-bs-target="#exampleModal2">
    Remove Movie
</button>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modalEdit">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-muted" id="exampleModalLabel">Remove Movie</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="text-center">
                        <input type="hidden" name="imgold" value="">
                    </div>
                    <div class="mt-3">
                        <div class="row mb-2">
                            <div class="col">
                                <div class="input-group mt-4">
                                    <div class="input-group-text">Chose Moive</div>
                                    <select name="movie_id" id="" class="form-control" required>
                                    <option value="">---Movie Name---</option>
                                    <?php
                                        $db2 = new db();
                                        $db2->select("movie","*");
                                        while($rm = $db2->query->fetch_object()){
                                    ?>
                                        <option value="<?= $rm->movie_id ?>"><?= $rm->movie_name ?></option>
                                    <?php } ?>
                                </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="eid" value="">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="remove" onclick = "return confirm('You want to remove this movie?')">Remove movie</button>
                </div>
            </form>
        </div>
    </div>
</div>