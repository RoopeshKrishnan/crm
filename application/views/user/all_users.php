<section>
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="col-lg-12">
                    <table class="table  table-striped table-hover mt-5" id="table_id">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Designation</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">email</th>
                                <th scope="col">View Details</th>
                                <th scope="col">Deactivate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!count($all_users) > 0) {
                                echo 'Empty';
                            } else {
                                $i = 0;
                                foreach ($all_users as $row) {
                                    $i++;
                            ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td><?= $row->user_name ?></td>
                                        <td><?= $row->designation ?></td>
                                        <td><?= $row->user_phone ?></td>
                                        <td><?= $row->user_email ?></td>
                                        <td>
                                            <form action="<?= base_url() ?>selected-user" method="post">
                                                <input type="hidden" value="<?= $row->user_id ?>" name="selected_user_id">
                                                <button type="submit" class=""><i class="fa-sharp fa-regular fa-circle-check"></i></button>
                                            </form>
                                        </td>
                                        <td><a href="" id="deactivate_user" value="<?= $row->user_id ?>"><i class="fa-solid text-danger fa-ban"></i></a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>