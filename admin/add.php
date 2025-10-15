<button type="button"  id = "buadd" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add movie
</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modalEdit">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-muted" id="exampleModalLabel">Add Movie</h4>
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
                                    <div class="input-group-text">Title name</div>
                                    <input type="text" name="title" class="form-control bg-light" style="" placeholder="Title" required>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6">
                                <div class="input-group mt-4">
                                    <div class="input-group-text">hr</div>
                                    <input type="number" class="form-control bg-light" name = "hr" min = "1" max ="2" name="" required>
                                    <div class="input-group-text">mins</div>
                                    <input type="number" class="form-control bg-light" name = "mins" min = "1" max ="59" name="" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="input-group mt-4">
                                    <div class="input-group-text">Date</div>
                                    <input type="date" name="date" class="form-control bg-light" style="" placeholder="Title" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group mt-4">
                                    <div class="input-group-text">Time</div>
                                    <select name="time" id="" class = "form-control">
                                        <option selected value="10:00-13:00">10:00-13:00</option>
                                        <option value="16:00-19:00">16:00-19:00</option>
                                        <option value="19:00-22:00">19:00-22:00</option>
                                    </select>
                                </div>
                        </div>
                        <div class="row">
                            <div class="input-group mt-4">
                                    <input type="file" name="img" class="form-control bg-light" style="" placeholder="Title" >
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="eid" value="">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" name="add">Add movie</button>
                </div>
            </form>
        </div>
    </div>
</div>